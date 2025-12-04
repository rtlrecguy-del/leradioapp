#!/bin/bash
[[ -z "$1" ]] && { echo "Parameter 1 is empty" ; exit 1; }
crontab -l | sed "$1d" > /var/www/html/scripts/varcron/mycron
#echo new cron into cron file
crontab /var/www/html/scripts/varcron/mycron
rm /var/www/html/scripts/varcron/mycron

