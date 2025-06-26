# Base image PHP 8.2 với Apache
FROM php:8.2-apache

# Cài extension Laravel cần
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Bật mod_rewrite
RUN a2enmod rewrite

# Cài Composer từ image composer chính thức
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục Laravel cần thiết (và file log)
RUN mkdir -p /var/www/html/storage/app \
    /var/www/html/storage/framework \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache && \
    touch /var/www/html/storage/logs/laravel.log

# Copy toàn bộ mã nguồn Laravel vào container
COPY . /var/www/html

# Set thư mục làm việc
WORKDIR /var/www/html

# Copy file môi trường sản xuất
COPY .env.production /var/www/html/.env

# Cài đặt Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Tạo key và cache config Laravel
RUN php artisan key:generate --force && \
    php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan
