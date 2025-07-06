# Use official PHP 7 image
FROM php:7.4-apache

# Install required PHP extensions (example: mysqli, pdo, etc.)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy application files to the container (adjust the path as needed)
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Set appropriate permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80