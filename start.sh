#!/bin/bash

if [ ! -f .env ]; then
    cp .env.example .env
fi

export DB_CONNECTION=sqlite
export DB_DATABASE=/var/www/html/database/database.sqlite
export CACHE_STORE=file
export SESSION_DRIVER=file
export SESSION_SAME_SITE=none
export SESSION_SECURE_COOKIE=true

touch /var/www/html/database/database.sqlite
chmod -R 777 /var/www/html/storage /var/www/html/database

php artisan key:generate --force
php artisan migrate --force || true
php artisan config:clear || true
php artisan cache:clear || true

chmod -R 777 /var/www/html/storage /var/www/html/database

exec apache2-foreground
