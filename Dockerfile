# WordPress with custom configurations
FROM wordpress:php8.2-apache

# Install additional PHP extensions
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libzip-dev \
    libicu-dev \
    libmagickwand-dev \
    && rm -rf /var/lib/apt/lists/*

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) \
        gd \
        mysqli \
        pdo_mysql \
        zip \
        intl \
        bcmath \
        exif

# Install ImageMagick (skip if already installed)
RUN pecl install imagick || true && docker-php-ext-enable imagick || true

# Enable Apache modules
RUN a2enmod rewrite headers expires

# Set recommended PHP settings
RUN { \
    echo 'upload_max_filesize = 64M'; \
    echo 'post_max_size = 64M'; \
    echo 'memory_limit = 256M'; \
    echo 'max_execution_time = 300'; \
    echo 'max_input_time = 300'; \
    echo 'max_input_vars = 3000'; \
} > /usr/local/etc/php/conf.d/wordpress-recommended.ini

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# Copy custom Apache config (if exists)
COPY docker/apache.conf /etc/apache2/conf-available/custom.conf
RUN a2enconf custom 2>/dev/null || true

EXPOSE 80

CMD ["apache2-foreground"]
