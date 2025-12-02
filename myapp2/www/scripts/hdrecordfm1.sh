#!/bin/bash
num=$(awk "BEGIN {print $1+125; exit}")
current_time=$(date "+%d-%H.%M") > /dev/null 2>&1
String98="nrsc5 $1 $2 -o - 2> /dev/null | ffmpeg -t 3600 -f s16le -ar 92000 -i pipe:0 -af arnndn=m=/var/www/html/noisemod/rnnoise-models/marathon-prescription-2018-08-29/mp.rnnn /var/www/html/recordings/$1showat$current_time.mp3 > /dev/null 2>&1 &"
eval "$String98"
