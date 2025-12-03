#!/bin/bash

    cron -f &
exec apache2ctl -D FOREGROUND
    
