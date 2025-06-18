FROM richarvey/nginx-php-fpm:3.1.6

# Copy toàn bộ source
COPY . /var/www/html

# Cài đặt Composer
RUN composer install --no-dev --optimize-autoloader --working-dir=/var/www/html

# Phân quyền
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Cache Laravel config
RUN cd /var/www/html && \
    php artisan config:clear && \
    php artisan cache:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Copy cấu hình supervisor và shell khởi động
COPY ./infra/supervisord.conf /etc/supervisor/conf.d/laravel-worker.conf
COPY ./infra/start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80
CMD ["/start.sh"]
