#!/bin/bash

# Tạo folder logs nếu chưa có
mkdir -p /var/www/html/storage/logs

# Khởi chạy Supervisor để chạy queue
supervisord -c /etc/supervisord.conf

# Cuối cùng, chạy Laravel web app (nginx + php-fpm)
exec /start.sh
