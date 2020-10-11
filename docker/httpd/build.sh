#!/bin/bash

if [[ ! -f "/var/www/log/xhprof.jsonl" ]]
then
touch /var/www/log/xhprof.jsonl
fi

chmod 777 -R /var/www/log

if [[ ! -d "/var/www/vendor" ]]
then
php composer update
fi

/usr/sbin/apache2ctl -D FOREGROUND
