FROM php:7.0-fpm

    RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql

    # Вказуємо робочу папку
    #WORKDIR /var/www/html

    # Копіюємо контент в неї

    CMD ["php-fpm"]
    COPY . /var/www/app/
    
    EXPOSE 9000