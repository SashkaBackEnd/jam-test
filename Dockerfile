FROM  bitnami/php-fpm:8.0.21
#FROM registry.gitlab.com/rhinodevelop/docker-images/php-fpm:7.4.10
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

WORKDIR /var/www/html

RUN apt update && apt install libzip-dev zip nginx supervisor -y

# Configure nginx
COPY ./docker/cnf/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/cnf/nginx/api.conf /sites/api.conf

# Configure supervisord
COPY ./docker/cnf/supervisor/supervisord.conf /etc/supervisor/conf.d/
COPY ./docker/cnf/supervisor/init.d/* /autostart/

ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/bin --filename=composer --quiet

#COPY composer.* /
COPY . /var/www/html/

RUN php init --env=Development --overwrite=All

RUN composer install --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist \
    --no-dev \
    --no-progress

RUN composer update

RUN chown -R www-data:www-data /var/www/ 

RUN cp .env.example .env

COPY ./entrypoint.sh /entrypoint.sh 
RUN chmod +x /entrypoint.sh


EXPOSE 9000 80
CMD ["/bin/sh", "-c", "/entrypoint.sh"]
