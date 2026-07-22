# ==========================
# Stage 1 - Composer
# ==========================
FROM composer:2 AS composer

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader

COPY . .

RUN composer dump-autoload --optimize

# ==========================
# Stage 2 - PHP 8.4 Apache
# ==========================
FROM php:8.4-apache

WORKDIR /var/www/html

# Install extension Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libicu-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        bcmath \
        intl \
        zip \
        gd

# Enable Apache Rewrite
RUN a2enmod rewrite

# Copy project
COPY --from=composer /app /var/www/html

# Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Apache DocumentRoot -> public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf

EXPOSE 80

CMD ["apache2-foreground"]
