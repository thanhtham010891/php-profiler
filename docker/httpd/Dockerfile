FROM php:7.2-apache

RUN apt-get -y update && apt-get -y install git zip unzip
RUN pecl install xhprof
RUN docker-php-ext-enable xhprof

WORKDIR /var/www

RUN a2enmod ssl rewrite
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./build.sh /build.sh

EXPOSE 80 8080
ENTRYPOINT ["/build.sh"]
