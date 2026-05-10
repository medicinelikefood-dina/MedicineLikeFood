FROM php:8.2-apache

# Install mysqli extension and required packages
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get update \
    && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libzip-dev libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip intl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite for WordPress permalinks
RUN a2enmod rewrite

# Set document root
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Allow .htaccess overrides for WordPress
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copy WordPress files
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 10000 (Render uses PORT env var)
EXPOSE 10000

# Update Apache to listen on PORT from env
RUN sed -i 's/Listen 80/Listen ${PORT:-10000}/g' /etc/apache2/ports.conf
RUN sed -i 's/<VirtualHost *:80>/<VirtualHost *:${PORT:-10000}>/g' /etc/apache2/sites-available/000-default.conf

# Create startup script that handles dynamic PORT
RUN echo '#!/bin/bash\nexport PORT=${PORT:-10000}\n# Update Apache ports based on PORT env var\nsed -i "s/Listen [0-9]*/Listen $PORT/g" /etc/apache2/ports.conf\nsed -i "s/<VirtualHost \*:[0-9]*/<VirtualHost *:$PORT/g" /etc/apache2/sites-available/000-default.conf\necho "Starting Apache on port $PORT"\napache2-foreground' > /start.sh && chmod +x /start.sh

CMD ["/start.sh"]
