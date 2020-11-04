FROM php:7.2-apache

WORKDIR /project/tyrellsys-assignment/tyrellsys-api

COPY . /var/www/html/

EXPOSE 82

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]