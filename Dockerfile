FROM php:8.2-apache

# Instalar extensiones necesarias para Symfony
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install intl pdo pdo_mysql zip

# Activar mod_rewrite
RUN a2enmod rewrite

# Copiar archivos del proyecto
COPY . /var/www/html/

# Establecer carpeta public como raíz del servidor web
WORKDIR /var/www/html/

# Mover la carpeta public/ al DocumentRoot
RUN rm -rf /var/www/html/html && \
    ln -s /var/www/html/public /var/www/html/html

# Dar permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
