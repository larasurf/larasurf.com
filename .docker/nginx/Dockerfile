FROM nginx:1.21-alpine

ENV UPSTREAM_HOST localhost
ENV UPSTREAM_PORT 9000

#RUN apk add --update --no-cache 'libcurl>=7.79.0-r0' && \
#    apk add --update --no-cache 'curl>=7.79.0-r0'

ARG NGINX_CONFIG_TEMPLATE=.docker/nginx/laravel.conf.template

COPY $NGINX_CONFIG_TEMPLATE /etc/nginx/templates/default.conf.template

COPY public /var/www/public

WORKDIR /var/www/public
