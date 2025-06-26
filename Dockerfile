# Base image PHP 8.2 với Apache
FROM php:8.2-apache

# Cài các extension Laravel cần
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Bật mod_rewrite của Apache để Laravel hoạt động
RUN a2enmod rewrite

# Cài Composer từ image composer chính thức
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo các thư mục Laravel cần và file log để tránh lỗi ghi log
RUN mkdir -p /var/www/html/storage/app \
    /var/www/html/storage/framework \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache && \
    touch /var/www/html/storage/logs/laravel.log

# Set quyền ghi cho Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copy toàn bộ mã nguồn vào container
COPY . /var/www/html

# Đặt thư mục làm việc
WORKDIR /var/www/html

# Copy file môi trường production
COPY .env.production /var/www/html/.env

# Cài đặt các gói composer (không cài dev)
RUN composer install --no-dev --optimize-autoloader

# Tạo key và cache lại Laravel
RUN php artisan key:generate --force && \
    php artisan config:clear && \
    php artisan config:cache && \
    php artisan route:clear && \
    php artisan route:cache && \
    php artisan view:clear && \
    php artisan view:cache

# Cấu hình Apache trỏ vào thư mục public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Mở cổng 80
EXPOSE 80
