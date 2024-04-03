FROM php:8.2-fpm-alpine

RUN apk update && apk add php82-pdo_pgsql php82-pgsql bash curl

RUN curl -sSL https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions -o - | sh -s \
      pdo_pgsql pgsql

COPY . /usr/src/idt-be
WORKDIR /usr/src/idt-be

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

RUN composer install --no-dev --no-interaction -o

EXPOSE 9090
CMD php -S localhost:9090 -t public/