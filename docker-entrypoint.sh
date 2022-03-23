#!/bin/bash
php artisan vendor:publish --force --tag=public
php artisan vendor:publish --tag=setting
php artisan config:cache
php artisan view:cache
php artisan storage:link
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
