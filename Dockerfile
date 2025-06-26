# Sử dụng PHP 8.1 với Apache
FROM php:8.1-apache

# Cài đặt các extension cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Bật mod_rewrite của Apache
RUN a2enmod rewrite

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy toàn bộ source Laravel vào container
COPY . /var/www/html

# Set thư mục làm việc
WORKDIR /var/www/html

# Cài đặt Laravel packages từ composer
RUN composer install --optimize-autoloader --no-dev

# Cấp quyền cho storage và cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Mở cổng 80 để chạy app
EXPOSE 80
