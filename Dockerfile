# Base image: PHP + Nginx
FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html

# Image config
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV REAL_IP_HEADER=1

# Laravel config
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

# Cho phép composer chạy với quyền root (nếu có cần dùng sau này)
ENV COMPOSER_ALLOW_SUPERUSER=1

# Script khởi động Laravel + Nginx + PHP-FPM
CMD ["/start.sh"]
