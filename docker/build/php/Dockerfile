FROM php:7.2-apache
RUN docker-php-ext-install pdo pdo_mysql mysqli
# Enable apache rewrite
COPY ./docker/build/php/mars.conf /etc/apache2/sites-available/
RUN a2ensite mars.conf
RUN service apache2 restart