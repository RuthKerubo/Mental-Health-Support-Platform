# Use PHP 8.3 Apache base image
FROM php:8.3-apache

# Arguments for user creation
ARG USER=laravel
ARG UID=1000

# Prevent interactive prompts during build
ENV DEBIAN_FRONTEND=noninteractive

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    zip \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache

# Configure PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get update && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Configure Apache
RUN a2enmod rewrite
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Create non-root user
RUN useradd -G www-data,root -u $UID -d /home/$USER $USER
RUN mkdir -p /home/$USER/.composer && chown -R $USER:$USER /home/$USER

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY --chown=$USER:www-data . .

# Set permissions
RUN find /var/www/html -type f -exec chmod 664 {} \; \
    && find /var/www/html -type d -exec chmod 775 {} \; \
    && chown -R $USER:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache \
    && chgrp -R www-data storage bootstrap/cache \
    && chmod -R ug+rwx storage bootstrap/cache

# Install dependencies and run commands
USER $USER
RUN composer install --no-interaction --no-plugins --no-scripts \
    && php artisan storage:link \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache || true  # Ignore errors for cache commands

# Switch to www-data for Apache
USER www-data

# Start Apache in foreground
CMD ["apache2-foreground"]

# Health check
HEALTHCHECK --interval=30s --timeout=30s --start-period=1m --retries=3 CMD curl -f http://localhost/ || exit 1