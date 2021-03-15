FROM php:7-apache as php

COPY ./docker/PHP/php.ini /usr/local/etc/php

RUN apt-get update && \
    apt-get install -y \
        libpng-dev \
        zip \
        libxml2-dev \
        libzip-dev

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install gd
RUN docker-php-ext-install zip
RUN docker-php-ext-install xml
RUN a2enmod rewrite

#move files over to docker container/image
COPY ./src /var/www/html
COPY ./docker/PHP/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN service apache2 restart

WORKDIR /var/www/html


RUN chown -R www-data:www-data /var/www/html
EXPOSE 80