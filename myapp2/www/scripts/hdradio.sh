#!/bin/bash
command="nrsc5 $1 $2 -o - 2> /dev/null | ffmpeg -re -t 3600 -f s16le -ar 92000 -i - -af arnndn=m=/var/www/html/noisemod/rnnoise-models/marathon-prescription-2018-08-29/mp.rnnn -c:a libmp3lame -f mpegts udp://$3:12345 > /dev/null 2>&1 &"
eval "$command"
FFMPEG_PID=$!
wait $FFMPEG_PID
# When ffmpeg stops, kill all processes in the same group (including nrsc5)
kill -- -$(ps -o pgid= $FFMPEG_PID | grep -o '[0-9]*')
