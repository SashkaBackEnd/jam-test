#!/bin/sh

echo $pwd
/bin/composer install
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
