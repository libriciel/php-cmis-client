FROM php:8.4-cli-alpine

WORKDIR /app

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

RUN --mount=type=bind,from=ghcr.io/php/pie:bin,source=/pie,target=/usr/local/bin/pie \
    apk add --no-cache --virtual .dev-build-deps \
    $PHPIZE_DEPS \
    linux-headers \
 && pie install xdebug/xdebug \
 && docker-php-ext-enable xdebug \
 && apk del .dev-build-deps

COPY ./composer.json /app

RUN composer install --no-interaction --prefer-dist

COPY ./ /app
