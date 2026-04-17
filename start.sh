#!/bin/bash

# Install dependencies if needed
composer install --no-dev --optimize-autoloader

# Run migrations
php artisan migrate --force

# Clear and cache
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Build assets (if needed)
npm run build

# Start the server
php artisan serve --host=0.0.0.0 --port=$PORT
