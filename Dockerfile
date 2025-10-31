FROM alpine:latest

WORKDIR /var/www/html
COPY . /var/www/html

# Usefull utilities
RUN apk add fish vim

# Laravel stuff
RUN apk add php83 \
    php83-fpm \
    php83-pdo \
    php83-pdo_mysql \
    php83-mbstring \
    php83-xmlwriter \
    php83-xml \
    php83-curl \
    php83-tokenizer \
    php83-ctype \
    php83-json \
    php83-fileinfo \
    php83-session \
    php83-openssl \
    php83-dom \
    php83-phar \
    php83-zip \
    php83-bcmath \
    php83-gd

# Other web stuff
RUN apk add nginx \
    curl \
    git \
    nodejs \
    npm \
    supervisor

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php

# Building process
COPY . .
RUN composer install --no-dev
RUN chown -R nobody:nobody /var/www/html/storage

EXPOSE 80

COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./supervisord.conf /etc/supervisord.conf
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]

# FIX PERMISSION ISSUE KAJLSFHLJASHFKJLAF
RUN chmod -R gu+w storage
RUN chmod -R guo+w storage
