# Sử dụng PHP 8.1 với Apache
FROM php:8.2-apache


# Cài đặt các extension cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Bật mod_rewrite của Apache để Laravel hoạt động
RUN a2enmod rewrite

# Cài Composer từ image chính thức
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo các thư mục Laravel yêu cầu (nếu chưa có)
RUN mkdir -p /var/www/html/storage/app \
    /var/www/html/storage/framework \
    /var/www/html/storage/logs \
    /var/www/html/bootstrap/cache

# Copy toàn bộ mã nguồn Laravel vào container
COPY . /var/www/html

# Copy file .env.production thành .env để Laravel đọc cấu hình
COPY .env.production /var/www/html/.env

# Chuyển thư mục làm việc sang thư mục Laravel
WORKDIR /var/www/html

# Cài đặt gói Laravel qua Composer
RUN composer install --optimize-autoloader --no-dev

# Cấp quyền ghi cho storage và cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Mở cổng 80 để web hoạt động
EXPOSE 80
