# Sử dụng PHP 8.2 với FPM và Alpine Linux để giảm dung lượng
FROM php:8.2-fpm-alpine

# Thiết lập biến môi trường cho user và UID từ docker-compose.yml
ARG user
ARG uid

# Cài đặt các package cần thiết
RUN apk add --no-cache \
    nodejs \
    npm \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    zip \
    unzip \
    oniguruma-dev \
    postgresql-dev \
    mysql-client \
    icu-dev \
    bash \
    shadow \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring pdo pdo_mysql pdo_pgsql intl

# Cài đặt Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Tạo user không phải root để chạy ứng dụng
RUN adduser -D -u ${uid} ${user}

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Sao chép mã nguồn
COPY . .

# Cài đặt Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Cài đặt NodeJS dependencies và build frontend
RUN npm install && npm run build

# Gán quyền cho thư mục storage và bootstrap/cache
RUN chown -R ${user}:${user} /var/www/storage /var/www/bootstrap/cache

# Chạy PHP-FPM dưới user không phải root
USER ${user}

# Chạy PHP-FPM
CMD ["php-fpm"]
