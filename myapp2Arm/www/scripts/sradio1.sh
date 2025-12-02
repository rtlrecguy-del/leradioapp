#!/bin/bash
num=$(awk "BEGIN {print $1+125; exit}")
String98="rtl_fm -f $1M -s 200000 -r 48000 -g $3 | ffmpeg -f s16le -ar 48000 -i - -af arnndn=m=/var/www/html/noisemod/rnnoise-models/marathon-prescription-2018-08-29/mp.rnnn -c:v libx264 -c:a libmp3lame -f flv rtmp://$2:12345/mystream live=1"
eval "$String98"
