FROM php:8.2-fpm
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN apt-get update -y && apt-get install -y curl unzip

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions xdebug pgsql pdo_pgsql amqp

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && mv composer.phar /usr/bin/composer

ADD php.ini /usr/local/etc/php/php.ini