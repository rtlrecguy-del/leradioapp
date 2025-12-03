#!/bin/bash

    cron -f &
su - www-data -c "exec apache2ctl -D FOREGROUND"
    
