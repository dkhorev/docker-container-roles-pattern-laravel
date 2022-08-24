# syntax=docker/dockerfile:experimental
# https://docs.docker.com/develop/develop-images/build_enhancements/

FROM nginx:alpine

COPY public /var/www/html/public
COPY docker/nginx/web.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html
