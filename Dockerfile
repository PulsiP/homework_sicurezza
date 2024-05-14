# Usa un'immagine PHP Apache come base
FROM php:8.2-apache

# Installa le dipendenze necessarie per PostgreSQL

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your PHP application code into the container
COPY /src/ .

# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Expose the port Apache listens on
EXPOSE 80

# Start Apache when the container runs
CMD ["apache2-foreground"]