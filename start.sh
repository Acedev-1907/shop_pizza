#!/usr/bin/env bash

echo "Running composer"
composer install --no-dev --working-dir=/var/www/html
php artisan o:c

echo "Caching config ..."
php artisan config:clear
php artisan config:cache

echo "Caching routes ..."
php artisan route:cache

echo "Publishing cloudinary provider ..."
php artisan vendor:publish --provider="CloudinaryLabs\CloudinaryLaravel\CloudinaryServiceProvider" --tag="cloudinary-laravel-config" || true

echo "Starting supervisord for queue..."
exec supervisord -c /etc/supervisord.conf
