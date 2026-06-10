# Stage 1: Build Dependencies
FROM php:8.3-cli-alpine AS builder

WORKDIR /var/www

# Install system dependencies
RUN apk add --no-cache \
    git \
    unzip \
    libzip-dev

# Install PHP Extensions
RUN docker-php-ext-install zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy files
COPY composer.json ./

# Install Composer packages
RUN composer install --no-dev --no-interaction --no-scripts --no-autoloader --prefer-dist

# Stage 2: Production Build
FROM php:8.3-fpm-alpine

WORKDIR /var/www

# Install system dependencies
RUN apk add --no-cache \
    shadow \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    libzip-dev \
    zip \
    unzip \
    supervisor \
    nginx

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql gd zip opcache

# Configure OPcache
RUN { \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=10000'; \
    echo 'opcache.revalidate_freq=0'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'opcache.enable_cli=1'; \
} > /usr/local/etc/php/conf.d/opcache-recommended.ini

# Copy dependencies and application code
COPY --from=builder /var/www/vendor ./vendor
COPY . .

# Run Composer Autoload Optimizations
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer dump-autoload --optimize --no-dev --classmap-authoritative

# Setup permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
