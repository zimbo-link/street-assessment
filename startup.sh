#!/bin/sh

chown -R www-data:www-data /srv/storage/

composer dumpautoload

php  $APP_HOME/artisan config:cache
php  $APP_HOME/artisan config:clear
php  $APP_HOME/artisan view:clear
php  $APP_HOME/artisan route:clear
php  $APP_HOME/artisan db:seed

npm install
npm run build