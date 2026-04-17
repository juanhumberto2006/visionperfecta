#!/bin/bash

echo "=========================================="
echo "VisionPerfecta - Starting Application"
echo "=========================================="

# Install dependencies if needed
echo "Installing composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Run migrations
echo "Running migrations..."
php artisan migrate --force --no-interaction

# Clear and cache
echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan optimize

# Set permissions
chmod -R 755 storage bootstrap/cache

# Start the server
echo "Starting server on port $PORT..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
