#!/bin/bash
set -e

echo "=========================================="
echo "VisionPerfecta - Starting Application"
echo "=========================================="

cd /var/www

# Create .env from example if it does not exist
if [ ! -f .env ]; then
    echo "Creating .env from example..."
    cp .env.example .env
fi

# Generate application key if missing
if [ -z "$APP_KEY" ] && ! grep -q "^APP_KEY=base64:" .env; then
    echo "Generating application key..."
    php artisan key:generate --force --no-interaction
fi

# Wait for the database and create it if it does not exist
echo "Checking database connection..."
DB_CREATED=0
for i in 1 2 3 4 5; do
    if php <<'PHP'
<?php
$opts = [];
if ($ca = getenv('MYSQL_ATTR_SSL_CA')) {
    $opts[PDO::MYSQL_ATTR_SSL_CA] = $ca;
}
$pdo = new PDO(
    'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT'),
    getenv('DB_USERNAME'),
    getenv('DB_PASSWORD'),
    $opts
);
$pdo->exec('CREATE DATABASE IF NOT EXISTS `' . getenv('DB_DATABASE') . '` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
echo "Database ready.\n";
PHP
    then
        DB_CREATED=1
        break
    fi
    echo "Database not ready yet, retrying in 10s (attempt $i/5)..."
    sleep 10
done

if [ "$DB_CREATED" != "1" ]; then
    echo "ERROR: Could not connect to the database. Check DB_HOST, DB_PORT, DB_USERNAME and DB_PASSWORD."
    exit 1
fi

# Storage link
php artisan storage:link --force --no-interaction || true

# Run migrations (fail if they cannot run after retries)
echo "Running migrations..."
for i in 1 2 3 4 5; do
    if php artisan migrate --force --no-interaction; then
        break
    fi
    if [ "$i" -lt 5 ]; then
        echo "Migration failed, retrying in 10s (attempt $i/5)..."
        sleep 10
    else
        echo "ERROR: Migrations failed after 5 attempts."
        exit 1
    fi
done

# Clear and cache
echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan optimize

# Set permissions
chmod -R 775 storage bootstrap/cache

# Start the server
PORT="${PORT:-8000}"
echo "Starting server on port $PORT..."
exec php artisan serve --host=0.0.0.0 --port="$PORT"
