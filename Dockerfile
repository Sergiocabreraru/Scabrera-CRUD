FROM php:8.0-apache

RUN apt-get update
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

COPY /crud /var/www/html

RUN chgrp -R www-data /var/www