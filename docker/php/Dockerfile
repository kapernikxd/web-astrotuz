FROM php:8.2-fpm-bookworm

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev \
    libicu-dev \
    && docker-php-ext-install pdo pdo_mysql zip intl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www