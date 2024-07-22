# Dockerfile
FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql mysqli mbstring exif pcntl bcmath gd

WORKDIR /var/www

COPY . /var/www

CMD ["php-fpm"]
