#!/bin/bash
[[ -z "$1" ]] && { echo "Parameter 1 is empty" ; exit 1; }
crontab -l | grep -v $1 > /var/www/html/scripts/mycron
#echo new cron into cron file
crontab /var/www/html/scripts/mycron
rm /var/www/html/scripts/mycron
