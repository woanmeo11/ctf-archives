FROM php:7.4-apache

RUN apt update -y && apt install -y curl

COPY ./web02-daemon-final /var/www/html

RUN chmod 1777 -R /var/www/html/ && \
    chown root:root -R /var/www/html/ && \
    chmod 775 -R /var/www/html/images/

RUN cd /var/www/html/ && \
    chmod 774 /var/www/html/*.php

RUN chmod -R 777 /var/www/html/images/upload/

ADD ./web02-daemon-final/000-default.conf /etc/apache2/sites-available/000-default.conf

CMD ["apachectl", "-D", "FOREGROUND"]