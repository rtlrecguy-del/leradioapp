#!/bin/bash
cd /home/ted
current_time=$(date "+%d-%H.%M") > /dev/null 2>&1
command="rtl_fm -f $1M -s 200000 -r 48000 -g $3 2> /dev/null | ffmpeg -t 3600 -f s16le -ar 48000 -i pipe:0 -af arnndn=m=/var/www/html/noisemod/rnnoise-models/marathon-prescription-2018-08-29/mp.rnnn /home/dvr/recordings/$2$current_time.mp3 > /dev/null 2>&1 &"
eval "$command"
