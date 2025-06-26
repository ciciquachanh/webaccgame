FROM php:8.2-apache

# Cài đặt extension Laravel cần
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Bật mod_rewrite
RUN a2enmod rewrite

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục Laravel cần thiết
RUN mkdir -p /var/www/html/storage/logs \
    /var/www/html/storage/framework \
    /var/www/html/bootstrap/cache \
    && touch /var/www/html/storage/logs/laravel.log

# Copy mã nguồn
COPY . /var/www/html

# Đặt thư mục làm việc
WORKDIR /var/www/html

# Trỏ Apache về thư mục public của Laravel
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Copy file .env production nếu có
COPY .env.production /var/www/html/.env

# Cài Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Clear & Cache Laravel
RUN php artisan key:generate --force && \
    php artisan config:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Cấp quyền
RUN chmod -R 777 storage bootstrap/cache

# Mở cổng 80
EXPOSE 80
