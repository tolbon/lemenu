FROM php:8.0-apache

RUN apt update && apt install -y zip unzip libzip-dev zlib1g-dev libsodium-dev libonig-dev
RUN docker-php-ext-install -j$(nproc) mbstring bcmath zip sodium json opcache mysqli pdo pdo_mysql

ADD sites-available /etc/apache2/sites-available

WORKDIR /var/www/html

ENV TZ=UTC
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN a2ensite 999-gryapi
RUN a2dissite 000-default
RUN a2dissite default-ssl
#RUN /usr/sbin/apache2ctl -D FOREGROUND
RUN a2enmod rewrite
RUN service apache2 restart

RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/20-xdebug.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/20-xdebug.ini

EXPOSE 80