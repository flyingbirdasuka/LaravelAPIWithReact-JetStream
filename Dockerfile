
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    zlib1g-dev \
    libpq-dev \
    libicu-dev \
    libxml2-dev \
    zip unzip git curl \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip mbstring exif pcntl bcmath gd intl xml \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable mod_rewrite and set document root to /public
RUN a2enmod rewrite \
 && sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

# Copy app files
COPY --chown=www-data:www-data . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev --prefer-dist --no-progress --no-scripts --no-interaction

# Laravel app preparation
RUN chown -R www-data:www-data storage bootstrap/cache \
 && php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache \
 && php artisan key:generate

EXPOSE 80
CMD ["apache2-foreground"]
