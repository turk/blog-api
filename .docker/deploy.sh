#!/bin/bash

cd /var/www/html

rm .env
cp .env.example .env
php artisan key:generate
chmod 777 storage -R
echo -e "Running artisan cleaning jobs...\n"
php artisan config:clear || echo 'Failed config:clear'
php artisan route:clear || echo 'Failed route:clear'
php artisan clear-compiled || echo 'Failed clear-compiled'

echo -e "\nInstalling composer dependencies...\n"
composer install --ignore-platform-reqs
echo -e "Dump the composer class map...\n"
composer dump-autoload

echo -e "Run migrations...\n"
php artisan migrate
