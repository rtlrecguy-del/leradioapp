#!/bin/bash
current_time=$(date "+%Y.%m.%d-%H.%M.%S")
crontab -l > /var/www/html/scripts/varcron/mycron
#echo new cron into cron file
echo "$4 $3 * * $5 sudo /bin/bash /var/www/html/scripts/hdrecord.sh $1 $2" >> /var/www/html/scripts/varcron/mycron
#install new cron file
crontab /var/www/html/scripts/varcron/mycron
rm /var/www/html/scripts/varcron/mycron
