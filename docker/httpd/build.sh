#!/bin/bash

if [[ ! -d "/var/www/vendor" ]]
then
php composer update
fi

/usr/sbin/apache2ctl -D FOREGROUND
