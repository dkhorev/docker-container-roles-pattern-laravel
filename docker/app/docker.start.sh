#!/usr/bin/env bash

set -e

role=${CONTAINER_ROLE:-app}
env=${APP_ENV:-production}

if [ "$env" != "local" ]; then
    echo "Caching configuration..."
    (cd /var/www/html && php artisan config:cache && php artisan route:cache)
fi

if [ "$role" = "app" ]; then
    exec php-fpm
elif [ "$role" = "migrations" ]; then
  (cd /var/www/html && php artisan migrate --force)
elif [ "$role" = "scheduler" ]; then
    while [ true ]
    do
      php /var/www/html/artisan schedule:run --verbose --no-interaction &
      sleep 60
    done
elif [ "$role" = "horizon" ]; then
    php /var/www/html/artisan horizon
else
    echo "Could not match the container role \"$role\""
    exit 1
fi
