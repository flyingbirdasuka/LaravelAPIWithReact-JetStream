# Use official PHP 8.2 image with Apache
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    zlib1g-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite for Laravel routes
RUN a2enmod rewrite

# Set working directory inside the container
WORKDIR /var/www/html

# Copy project files with proper permissions for www-data user
COPY --chown=www-data:www-data . /var/www/html

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies without dev packages and optimize autoloader
RUN composer install --optimize-autoloader --no-dev --prefer-dist --no-progress --no-scripts --no-interaction

# Fix permissions for storage and cache directories
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 80 to be used by the container
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]