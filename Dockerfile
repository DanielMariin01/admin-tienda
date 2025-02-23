# Dockerfile para el Backend (Laravel)
FROM php:8.1-fpm-alpine

# Instalar dependencias
RUN apk add --no-cache libpng-dev libjpeg-dev libfreetype6-dev git unzip libpq-dev

# Habilitar extensiones necesarias para Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_pgsql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar el archivo composer.json y composer.lock
COPY composer.json composer.lock /var/www/

# Instalar las dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Copiar el código fuente de la aplicación
COPY . /var/www

# Establecer permisos para los directorios necesarios
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public

# Exponer el puerto 9000 para PHP-FPM
EXPOSE 9000

# Comando por defecto
CMD ["php-fpm", "-D"]
