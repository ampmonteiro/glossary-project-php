FROM php:7.3-apache

# -m -> create home
# -s -> shell acess

RUN  a2enmod rewrite && service apache2 restart &&  docker-php-ext-install pdo_mysql && useradd -ms /bin/bash app && apt update && apt install git -y

WORKDIR /var/www/html

COPY --chown=app src/ .

USER app

EXPOSE 80

# docker run -v $(pwd)/src:/var/www/html -dp 80:80 apache-php:8.0

#docker run --name my-db -e MYSQL_ROOT_PASSWORD=secret -e MYSQL_DATABASE=suggestotron -e MYSQL_USER=dev  -e MYSQL_PASSWORD=secret -dp 3306:3306  mysql