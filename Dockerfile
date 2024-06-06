#immagine PHP Apache come base
FROM php:8.2-apache

# Installa le dipendenze necessarie per PostgreSQL

# Imposto la working directory nel container
WORKDIR /var/www/html

# copio l'applicazione php nel container
COPY /src/ .

# Installazione delle dipendenze php
RUN apt-get update && \
    apt-get install -y libpng-dev && \
    docker-php-ext-install pdo pdo_mysql gd

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Espongo la porta
EXPOSE 80

# Avvia apche quando il conteiner viene eseguito
CMD ["apache2-foreground"]