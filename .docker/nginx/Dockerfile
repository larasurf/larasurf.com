FROM nginx:1.21-alpine

ENV UPSTREAM_HOST localhost
ENV UPSTREAM_PORT 9000

RUN apk add --update --no-cache apk-tools && \
    apk add --update --no-cache curl && \
    apk add --update --no-cache libcrypto1.1 && \
    apk add --update --no-cache libcurl && \
    apk add --update --no-cache libgcrypt && \
    apk add --update --no-cache libgd && \
    apk add --update --no-cache libxml2

COPY .docker/nginx/laravel.conf.template /etc/nginx/templates/default.conf.template

COPY public /var/www/public

WORKDIR /var/www/public
