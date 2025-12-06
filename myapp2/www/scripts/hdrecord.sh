#!/bin/bash
current_time=$(date "+%d-%H.%M") > /dev/null 2>&1
command="nrsc5 $1 $2 -o - 2> /dev/null | ffmpeg -t 3600 -f s16le -ar 92000 -i pipe:0 -af arnndn=m=/var/www/html/noisemod/rnnoise-models/marathon-prescription-2018-08-29/mp.rnnn /var/www/html/recordings/$1showat$current_time.mp3 > /dev/null 2>&1 &"
eval "$command"
FFMPEG_PID=$!
wait $FFMPEG_PID
# When ffmpeg stops, kill all processes in the same group (including nrsc5)
kill -- -$(ps -o pgid= $FFMPEG_PID | grep -o '[0-9]*')
