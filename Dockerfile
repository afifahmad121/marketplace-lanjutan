FROM dunglas/frankenphp:php8.4

WORKDIR /app

RUN install-php-extensions \
    pdo_mysql \
    mbstring \
    intl \
    zip \
    bcmath \
    pcntl \
    exif \
    gd

COPY . .

RUN composer install \
    --no-dev \
    --optimize-autoloader

RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 8080

CMD ["php", "artisan", "octane:frankenphp", "--host=0.0.0.0", "--port=8080"]
