FROM php:8.2-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libzip-dev libpng-dev libonig-dev \
 && docker-php-ext-install intl pdo pdo_mysql zip gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
WORKDIR /var/www/html
COPY . .

# Instalar dependencias de Symfony
RUN composer install --no-dev --optimize-autoloader

# Dar permisos
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R 775 /var/www/html/var

EXPOSE 9000

CMD ["php-fpm"]
