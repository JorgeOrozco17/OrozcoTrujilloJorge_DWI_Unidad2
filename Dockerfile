# Imagen base: PHP con Apache
FROM php:8.2.12-apache

# Instalar extensiones necesarias (mysqli, pdo_mysql, etc.)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar el código del proyecto al contenedor
COPY . /var/www/html/

# Habilitar mod_rewrite de Apache (útil para MVC)
RUN a2enmod rewrite

# Configurar el directorio de trabajo
WORKDIR /var/www/html/

# Exponer el puerto 80
EXPOSE 80
