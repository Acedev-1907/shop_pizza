# Stage 2: Laravel + Nginx + PHP-FPM
FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader
RUN rm -f /etc/nginx/sites-enabled/default /etc/nginx/sites-enabled/default.conf
COPY conf/nginx/nginx-site.conf /etc/nginx/sites-enabled/default
COPY start-web.sh /start-web.sh
RUN chmod +x /start-web.sh
# Fix permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Clear Laravel cache, views, and compiled views after build
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan optimize:clear && \
    rm -rf storage/framework/views/*

# Image config
ENV SKIP_COMPOSER=1
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV REAL_IP_HEADER=1

# Laravel config
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER=1

COPY supervisord.conf /etc/supervisord.conf

EXPOSE 80

CMD ["supervisord", "-c", "/etc/supervisord.conf"]
