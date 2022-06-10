FROM php:8.1.6-apache

ENV TZ=America/Sao_Paulo

WORKDIR /var/www/html

# Install system dependencies
RUN apt-get clean && apt-get update -y && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip \
    wget \
    nano \
    libicu-dev \
    libxml2-dev \ 
    libonig-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql intl iconv opcache bcmath xml soap mbstring

# Install XDebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Configuration XDebug
RUN echo "zend_extension=xdebug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "[xdebug]" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.mode=develop,debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_port = 9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.log='/var/logs/xdebug/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.connect_timeout_ms=2000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Another xdebug configuration option
# ADD xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN chown -R www-data:www-data /var/www/html
RUN a2enmod rewrite

COPY ./ app

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --no-dev

EXPOSE 80