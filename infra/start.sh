#!/bin/bash

# Gọi script khởi động gốc
/source/docker-startup.sh

echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

# Chạy lệnh clear cache Laravel
cd /var/www/html

echo "🔧 Clearing Laravel caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

echo "🚀 Rebuilding Laravel caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Done. Starting supervisord..."
exec supervisord -n
