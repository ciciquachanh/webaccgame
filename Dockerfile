# PHP + Apache
FROM php:8.2-apache

# Cài extension Laravel
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Bật mod_rewrite
RUN a2enmod rewrite

# Cài Composer từ image chính thức
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục & file log
RUN mkdir -p /var/www/html/storage/app \
    /var/www/html/storage/framework \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache && \
    touch /var/www/html/storage/logs/laravel.log

# Copy toàn bộ source
COPY . /var/www/html

# Set working dir
WORKDIR /var/www/html

# Copy file env
COPY .env.production /var/www/html/.env

# Cài gói Laravel
RUN composer install --no-dev --optimize-autoloader

# Laravel cache & key
RUN php artisan key:generate --force && \
    php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Phân quyền
RUN chown -R www-data:www-data storage bootstrap/cache

# Apache trỏ về public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
