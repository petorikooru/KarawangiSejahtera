# Dockerfile
FROM alpine:latest

# Install system dependencies
RUN apk add --no-cache \
    php83 \
    php83-fpm \
    php83-pdo \
    php83-pdo_mysql \
    php83-mbstring \
    php83-xmlwriter\
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
    php83-gd \
    nginx \
    curl \
    git \
    nodejs \
    npm \
    supervisor

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel source (if exists)
COPY src/ /var/www/html

# Install PHP dependencies
RUN composer install --no-scripts --no-autoloader || true

# Copy default nginx config
COPY ./nginx.conf /etc/nginx/nginx.conf

# Expose port
EXPOSE 80

# Start Supervisor to manage PHP-FPM and Nginx
COPY ./supervisord.conf /etc/supervisord.conf

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel source (if exists)
COPY src/ /var/www/html

# Install PHP dependencies
RUN composer install --no-scripts --no-autoloader || true

# Copy default nginx config
COPY ./nginx.conf /etc/nginx/nginx.conf

# Expose port
EXPOSE 80

# Start Supervisor to manage PHP-FPM and Nginx
COPY ./supervisord.conf /etc/supervisord.conf

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]

ARG UID=1000
ARG GID=1000
RUN addgroup -g $GID laravel && adduser -u $UID -G laravel -D laravel
