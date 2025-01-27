FROM php:8.1-fpm-alpine

RUN apk add --no-cache \
    libzip-dev \
    zip \
    unzip

RUN docker-php-ext-configure zip && \
    docker-php-ext-install \
        zip \
        pdo \
        pdo_mysql \
        mysqli \
    && docker-php-ext-enable mysqli

COPY ./conf.d /usr/local/etc/php/conf.d

WORKDIR /app
