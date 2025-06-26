FROM php:8.2-apache

# Cài extension Laravel cần
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Bật mod_rewrite
RUN a2enmod rewrite

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo các thư mục cần thiết
RUN mkdir -p /var/www/html/storage/app \
    /var/www/html/storage/framework \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache

# Copy Laravel project vào container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Copy file .env production
COPY .env.production /var/www/html/.env

# Cài composer dependencies
RUN composer install --optimize-autoloader --no-dev

# Cấp quyền ghi
RUN chown -R www-data:www-data storage bootstrap/cache

# Cấu hình Apache trỏ về public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Mở port 80
EXPOSE 80
