#!/bin/bash
# Khởi động PHP-FPM và Nginx cho web server
cd /var/www/html
php artisan config:cache
php artisan route:cache
php artisan view:cache
docker-php-entrypoint php-fpm &
nginx -g 'daemon off;'
