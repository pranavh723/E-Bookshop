# Use an official PHP runtime with Apache
FROM php:8.2-apache

# Install necessary PHP extensions for CodeIgniter
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql pgsql

# Enable Apache mod_rewrite for CodeIgniter's clean URLs
RUN a2enmod rewrite

# Copy project files to the Apache document root
COPY . /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (Apache default)
EXPOSE 80

# The default entrypoint for php:apache is already configured to run Apache
