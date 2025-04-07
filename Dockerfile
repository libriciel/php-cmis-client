FROM php:7.4-cli

WORKDIR /app

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    libzip-dev \
    unzip \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

RUN pecl install xdebug-3.1.6 && docker-php-ext-enable xdebug

COPY ./composer.json /app

RUN composer install

COPY ./ /app
