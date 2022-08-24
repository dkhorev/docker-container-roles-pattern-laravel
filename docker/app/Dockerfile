# syntax=docker/dockerfile:experimental
# https://docs.docker.com/develop/develop-images/build_enhancements/

# Stage 1
FROM php:8.1-fpm-alpine as builder

# Only build time deps
RUN apk --update add \
    curl \
    git \
    openssh-client

# Composer files
COPY composer.json /var/www/html/composer.json
COPY composer.lock /var/www/html/composer.lock
COPY database /var/www/html/database
COPY bootstrap /var/www/html/bootstrap

# PHP Dependencies
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
# composer install for app
RUN cd /var/www/html \
    && composer install --prefer-dist --no-scripts --no-dev --no-autoloader --ignore-platform-reqs \
    && rm -rf /root/.composer \
    && cd /var/www/html && composer dump-autoload --no-scripts --no-dev --optimize


# Stage 2
FROM php:8.1-fpm-alpine as final

# Only runtime deps | one-liner for lesser size
RUN apk --update add \
    bash \
    make \
    autoconf \
    libc6-compat \
    gcompat \
    g++ \
    && wget https://github.com/FriendsOfPHP/pickle/releases/latest/download/pickle.phar \
    && chmod +x pickle.phar \
    && mv pickle.phar pickle \
    && ./pickle install redis@5.3.7 \
    && docker-php-ext-enable redis \
    && docker-php-ext-install pdo_mysql mysqli opcache sockets bcmath pcntl \
  # Clean up deps
    && apk del make autoconf g++ \
    && rm -rf /var/cache/apk/* \
    && rm -rf /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && rm pickle

WORKDIR /var/www/html

# App
COPY docker/app/docker.start.sh /usr/local/bin/start
COPY docker/app/docker.php.ini $PHP_INI_DIR/php.ini
RUN chmod 755 /var/www && chmod u+x /usr/local/bin/start

# Vendor files
COPY --from=builder /var/www/html /var/www/html

# App files
COPY --chown=www-data:www-data . /var/www/html

CMD ["/usr/local/bin/start"]
