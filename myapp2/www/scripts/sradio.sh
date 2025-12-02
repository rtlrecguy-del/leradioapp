#!/bin/bash
command="rtl_fm -f $1M -s 200000 -r 48000 -g 49.6 2> /dev/null | ffmpeg -re -f s16le -ar 48000 -i - -af arnndn=m=/var/www/html/noisemod/rnnoise-models/marathon-prescription-2018-08-29/mp.rnnn -c:a libmp3lame -f mpegts udp://${2}:12345 > /dev/null 2>&1 &"
eval "$command"
