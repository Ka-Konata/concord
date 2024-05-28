# Use a imagem oficial do PHP com a versão 8.3 e com Apache
FROM php:8.3-apache

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd xml zip

# Instalar Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Habilitar o mod_rewrite do Apache
RUN a2enmod rewrite

# Ajustar o DocumentRoot do Apache
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copiar arquivos do projeto para o diretório de trabalho no container
COPY . /var/www/html

# Definir o diretório de trabalho
WORKDIR /var/www/html


# Definir permissões apropriadas
RUN chown -R www-data:www-data storage public

# Expor a porta do servidor web
EXPOSE 80

