# PHP CLI
FROM php:8.2-cli-alpine3.17 as cli

ARG USER='www-data'
ARG GROUP='www-data'

ENV COMPOSER_MEMORY_LIMIT -1

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions @composer-2 opcache pdo_mysql
RUN apk --no-cache add bash

COPY ./docker/php/cli/conf.d/* $PHP_INI_DIR/conf.d
COPY ./docker/php/php.ini-production $PHP_INI_DIR/php.ini

USER ${USER}

WORKDIR /app

COPY --chown=${USER}:${GROUP} ./ /app

RUN rm -rf /app/vendor \
    && composer --no-ansi --no-interaction install --no-progress

# PHP-FPM
FROM php:8.2-fpm-alpine3.17 as fpm

RUN apk --no-cache update \
    && docker-php-ext-install pdo_mysql \
    && rm -rf /var/cache/apk/*


ARG USER='www-data'
ARG GROUP='www-data'

COPY ./docker/php/fpm/conf.d/* $PHP_INI_DIR/conf.d
COPY ./docker/php/php.ini-production $PHP_INI_DIR/php.ini
COPY ./docker/common/wait-for ./docker/common/wait-for
RUN apk add --no-cache bash  \
    && chmod +x ./docker/common/wait-for

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

COPY --chown=${USER}:${GROUP} ./ /var/www/html
COPY --from=cli --chown=${USER}:${GROUP} /app /var/www/html

WORKDIR /var/www/html

USER ${USER}

CMD php-fpm
EXPOSE 9000

# NGINX
FROM nginx:1.24.0-alpine as nginx

COPY docker/nginx/conf.d/* /etc/nginx/conf.d

COPY --from=fpm /var/www/html/web /var/www/html/web

ARG PHP_UPSTREAM_CONTAINER=php-fpm
ARG PHP_UPSTREAM_PORT=9000

RUN echo "upstream php-upstream { server ${PHP_UPSTREAM_CONTAINER}:${PHP_UPSTREAM_PORT}; }" > /etc/nginx/conf.d/upstream.conf

EXPOSE 8181