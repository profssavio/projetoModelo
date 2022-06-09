# DEV CONTAINER

## Comandos Docker

  * docker-compose build --no-cache 
  * docker-compose up -d   
  * docker-compose down
  * docker-compose start
  * docker-compose stop

## Comandos para exercutar composer pelo container

Sintaxe:  ```docker exec -it container-name command``` exemplo ```docker exec -it php-apache-8.1.6 composer require twig/twig```

## docker-compose.yml

```
version: "3.9"

services:
  php:
    container_name: php-apache-8.1.6
    build: ./      
    volumes:
      - ./:/var/www/html
    ports:
      - 3000:80    
    depends_on:
      - db
      - phpmyadmin   
    networks:
      - php-net         

  db:
    image: mysql:8
    container_name: mysql
    ports:
      - 3306:3306
    command: --default-authentication-plugin=mysql_native_password
    restart: "no"
    volumes:
      - mysql-volume:/var/lib/mysql
    environment:
      MYSQL_ROOT_PASSWORD: 123456
      MYSQL_DATABASE: dbmodelo
    networks:
      - php-net        
 
  phpmyadmin:
    image: phpmyadmin:5
    container_name: phpmyadmin
    ports:
      - 8081:80
    restart: "no"
    environment:
      PMA_HOST: db
    depends_on:
      - db
    networks:
      - php-net      

volumes:
  mysql-volume:

networks:
  php-net:  
```

## Dockerfile

```
FROM php:8.1.6-apache

WORKDIR /var/www/html

# Install system dependencies
RUN apt-get clean && apt-get update -y && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip \
    wget \
    nano

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql 

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
```

## VSCode Debug

```
{
    // Use IntelliSense to learn about possible attributes.
    // Hover to view descriptions of existing attributes.
    // For more information, visit: https://go.microsoft.com/fwlink/?linkid=830387
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "pathMappings": {
                "/var/www/html": "${workspaceRoot}"
            }
        },
        {
            "name": "Launch currently open script",
            "type": "php",
            "request": "launch",
            "program": "${file}",
            "cwd": "${fileDirname}",
            "port": 9003,
        }
    ]
}
```