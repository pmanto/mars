FROM php:7.2-apache
RUN docker-php-ext-install pdo pdo_mysql mysqli
# Enable apache rewrite
COPY ./docker/build/php/billie.conf /etc/apache2/sites-available/
RUN a2ensite billie.conf
RUN service apache2 restart

