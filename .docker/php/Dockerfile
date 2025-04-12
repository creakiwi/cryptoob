FROM php:8.4-fpm-alpine

RUN apk --no-cache add \
    bash \
    curl-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libxml2-dev \
    zlib-dev \
    libzip-dev \
    git \
    gmp-dev \
    icu-dev \
    mariadb-client
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-configure intl
RUN docker-php-ext-install bcmath curl gd gmp intl pdo pdo_mysql zip xml
RUN docker-php-ext-enable intl

RUN rm -rf /var/cache/apk/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sS https://get.symfony.com/cli/installer | bash && \
    mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

COPY ./php.ini /usr/local/etc/php/
WORKDIR /var/www/app
COPY . /var/www/app/

EXPOSE 9000

# Démarrer PHP-FPM
CMD ["php-fpm"]
