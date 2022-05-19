FROM composer:latest AS composer
FROM bitnami/php-fpm:latest
COPY --from=composer /usr/bin/composer /usr/bin/composer