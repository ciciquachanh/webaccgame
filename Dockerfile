# Base image: PHP 8.2 + Apache
FROM php:8.2-apache

# Cài extension Laravel cần
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Bật mod_rewrite
RUN a2enmod rewrite

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục Laravel cần thiết và file log
RUN mkdir -p /var/www/html/storage/logs \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/framework/cache \
    /var/www/html/bootstrap/cache \
    && touch /var/www/html/storage/logs/laravel.log

# Copy toàn bộ mã nguồn vào container
COPY . /var/www/html

# Đặt thư mục làm việc
WORKDIR /var/www/html

# Copy file .env production nếu có
COPY .env.production /var/www/html/.env

# Trỏ Apache về thư mục public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Cài đặt Laravel packages
RUN composer install --no-dev --optimize-autoloader

# Generate APP_KEY trước khi cache
RUN php artisan key:generate --force

# Xóa cache cũ và tạo cache mới
RUN php artisan config:clear \
 && php artisan route:clear \
 && php artisan view:clear \
 && php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache

# Cấp quyền ghi
RUN chmod -R 777 storage bootstrap/cache

# Mở cổng 80
EXPOSE 80
