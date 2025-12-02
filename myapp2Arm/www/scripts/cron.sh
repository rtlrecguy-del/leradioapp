#!/bin/bash
current_time=$(date "+%Y.%m.%d-%H.%M.%S")
crontab -l > /var/www/html/scripts/varcron/mycron
#echo new cron into cron file
echo -e "$5 $2 * * $3 /var/www/html/scripts/recordfm1.sh $1 $4 $5" >> /var/www/html/scripts/varcron/mycron
#install new cron file
crontab /var/www/html/scripts/varcron/mycron
rm /var/www/html/scripts/varcron/mycron
