# Use official PHP 8.2 image with Apache
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    zlib1g-dev \
    libpq-dev \
    libicu-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    bash \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip mbstring exif pcntl bcmath gd intl xml \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite for Laravel routes
RUN a2enmod rewrite

# Update Apache site config to use Laravel public/ directory
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Set working directory inside the container
WORKDIR /var/www/html

# Copy project files with proper permissions
COPY --chown=www-data:www-data . /var/www/html

# Fix permissions before composer install
RUN chown -R www-data:www-data /var/www/html

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Fix permissions for storage and cache directories
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 80 to be used by the container
EXPOSE 80

# Run setup commands and start Apache
CMD bash -c "\
    git config --global --add safe.directory /var/www/html && \
    composer install --optimize-autoloader --no-dev --prefer-dist --no-progress && \
    php artisan migrate --force && \
    apache2-foreground"
