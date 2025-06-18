#!/bin/bash

# Tạo thư mục logs nếu chưa có
mkdir -p /var/www/html/storage/logs

# Laravel setup
echo ">>> Running composer..."
composer install --no-dev --prefer-dist --no-interaction --working-dir=/var/www/html || { echo "Composer install failed"; exit 1; }


echo ">>> Laravel optimize"
php artisan optimize:clear
php artisan config:clear
php artisan config:cache
php artisan route:cache

echo ">>> Publishing cloudinary config..."
php artisan vendor:publish --provider="CloudinaryLabs\CloudinaryLaravel\CloudinaryServiceProvider" --tag="cloudinary-laravel-config" || true

# Debug supervisor config
echo ">>> Supervisor config:"
cat /etc/supervisord.conf

# Cuối cùng, chạy Supervisor để quản lý Laravel queue worker
echo ">>> Starting supervisord..."
exec supervisord -n -c /etc/supervisord.conf
