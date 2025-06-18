FROM richarvey/nginx-php-fpm:3.1.6

# Copy toàn bộ mã nguồn vào container
COPY . /var/www/html

# Laravel config
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV COMPOSER_ALLOW_SUPERUSER=1

# Web root (Laravel public folder)
ENV WEBROOT=/var/www/html/public

# Optional: bỏ composer nếu bạn đã build sẵn vendor
ENV SKIP_COMPOSER=1
ENV RUN_SCRIPTS=1
ENV PHP_ERRORS_STDERR=1
ENV REAL_IP_HEADER=1

# Cài đặt supervisor
RUN apt-get update && apt-get install -y supervisor

# Supervisor config
COPY supervisord.conf /etc/supervisord.conf
COPY docker-startup.sh /docker-startup.sh
RUN chmod +x /docker-startup.sh

# Chạy Laravel + Queue bằng supervisor
CMD ["/docker-startup.sh"]
