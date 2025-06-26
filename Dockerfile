FROM php:8.2-apache

# Cài extension Laravel cần
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Bật mod_rewrite
RUN a2enmod rewrite

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục cần thiết
RUN mkdir -p /var/www/html/storage/app \
    /var/www/html/storage/framework \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache

# Copy mã nguồn Laravel
COPY . /var/www/html

# Set thư mục làm việc
WORKDIR /var/www/html

# Copy file .env production
COPY .env.production /var/www/html/.env

# Cài đặt Laravel dependencies (bỏ các dev package)
RUN composer install --optimize-autoloader --no-dev

# Xóa cache cũ và tạo cache mới để áp dụng đúng .env
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Cấp quyền ghi
RUN chown -R www-data:www-data storage bootstrap/cache

# Trỏ Apache về thư mục public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Mở port 80
EXPOSE 80
