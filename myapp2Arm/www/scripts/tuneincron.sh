#!/bin/bash
current_time=$(date "+%Y.%m.%d-%H.%M.%S")
crontab -l > /var/www/html/scripts/varcron/mycron5
#echo new cron into cron file
echo "$5 $2 * * $3 /var/www/html/scripts/tuneinradio.sh $1 $4" >> /var/www/html/scripts/varcron/mycron5
#install new cron file
crontab /var/www/html/scripts/varcron/mycron5
rm /var/www/html/scripts/varcron/mycron5
