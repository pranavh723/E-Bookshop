# Use an official PHP runtime with Apache
FROM php:8.2-apache

# Install necessary PHP extensions for CodeIgniter
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql pgsql

# Enable Apache mod_rewrite for CodeIgniter's clean URLs
RUN a2enmod rewrite

# Update Apache configuration to listen on the port provided by Render
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Set ServerName to suppress the warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy project files to the Apache document root
COPY . /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

# The default entrypoint for php:apache is already configured to run Apache
CMD ["apache2-foreground"]
