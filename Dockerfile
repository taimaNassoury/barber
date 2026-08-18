# ---- Base PHP image with common extensions for Laravel ----
FROM php:8.3-fpm-alpine AS base

# Install system dependencies
RUN apk add --no-cache \
    bash \
    curl \
    git \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    postgresql-dev \
    nginx \
    supervisor

# Install PHP extensions Laravel typically needs
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        pdo_pgsql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        opcache

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application code
COPY . .

# Install PHP dependencies (production, no dev packages)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set permissions for Laravel storage & cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# ---- Nginx config ----
COPY docker/nginx.conf /etc/nginx/http.d/default.conf

# ---- Supervisor config (runs php-fpm + nginx together) ----
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Entry point script (runs migrations, caches config, then starts services)
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 8080

ENTRYPOINT ["/entrypoint.sh"]
