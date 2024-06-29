# Use the official PHP image as a base
FROM php:8.1-apache

# Copy the contents of the project to the container's web root
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

# Expose port 80 to the outside world
EXPOSE 80

# Grant write permissions to the web server for necessary directories
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html
