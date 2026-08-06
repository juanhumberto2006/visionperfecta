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

# Storage link
php artisan storage:link --force --no-interaction || true

# Run migrations (with retries in case the DB is not ready yet)
echo "Running migrations..."
for i in 1 2 3 4 5; do
    if php artisan migrate --force --no-interaction; then
        break
    fi
    echo "Migration failed, retrying in 10s (attempt $i/5)..."
    sleep 10
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
