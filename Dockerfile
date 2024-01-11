FROM php:8.1

RUN apt-get update
RUN apt-get install -y vim
RUN docker-php-ext-install pdo_mysql
