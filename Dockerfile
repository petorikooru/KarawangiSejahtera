FROM php:8.3-fpm

WORKDIR /var/www/html

# Dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libzip-dev zip unzip git curl \
    supervisor nginx default-mysql-client \
    && docker-php-ext-install pdo_mysql mysqli gd zip bcmath

# NodeJS
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

# Copy composer first
COPY composer.json composer.lock ./

# Install backend deps
RUN composer install --no-dev --optimize-autoloader

# Install frontend deps + build
COPY package.json package-lock.json ./
RUN npm install && npm run build

# Copy app
COPY . .

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Configs
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./supervisord.conf /etc/supervisord.conf
COPY ./supervisord.conf /etc/supervisor/supervisord.conf

EXPOSE 80
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
