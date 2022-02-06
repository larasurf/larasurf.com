FROM nginx:1.21-alpine

ENV UPSTREAM_HOST localhost
ENV UPSTREAM_PORT 9000

RUN mkdir -p /var/run/nginx-cache

ARG NGINX_CONFIG_TEMPLATE=.docker/nginx/laravel.conf.template

COPY $NGINX_CONFIG_TEMPLATE /etc/nginx/templates/default.conf.template

COPY public /var/www/public

WORKDIR /var/www/public
