#!/bin/bash
current_time=$(date "+%Y.%m.%d-%H.%M.%S")
crontab -l > /var/www/html/scripts/varcron/mycron
#echo new cron into cron file
echo -e "$3 $2 * * $4 sudo /bin/bash /var/www/html/scripts/fmrecord.sh $1 $5" >> /var/www/html/scripts/varcron/mycron
#install new cron file
crontab /var/www/html/scripts/varcron/mycron
rm /var/www/html/scripts/varcron/mycron
