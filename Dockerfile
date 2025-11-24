# Usa CLI, no FPM
FROM php:8.2-cli

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libpq-dev \
 && docker-php-ext-install intl pdo pdo_mysql pdo_pgsql zip gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /var/www/html

# Copiar todo el proyecto
COPY . .

# Instalar dependencias SIN ejecutar scripts (evita error de DATABASE_URL)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# El servidor escuchará en $PORT (definido por Render)
EXPOSE 8000

# Iniciar: primero clear cache (ya con DATABASE_URL disponible), luego servidor
CMD ["sh", "-c", "php bin/console cache:clear --env=prod && php -S 0.0.0.0:$PORT -t public/"]