#!/bin/bash
command="nrsc5 $1 $2 -o - 2> /dev/null | ffmpeg -re t 3600 -f s16le -ar 92000 -i - -c:a libmp3lame -f mpegts udp://$3:12345"
eval "$command"
