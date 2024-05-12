# Usa un'immagine PHP Apache come base
FROM php:apache

# Installa le dipendenze necessarie per PostgreSQL
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copia i file del sito web nella directory di default di Apache
COPY . /var/www/html

# Esponi la porta 80 per il sito web
EXPOSE 80

# Avvia Apache in modalità daemon
CMD ["apache2-foreground"]