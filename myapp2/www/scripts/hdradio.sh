#!/bin/bash
command="nrsc5 $1 $2 -o - 2> /dev/null | ffmpeg -re -t 3600 -f s16le -ar 92000 -i - -c:v libx264 -preset veryfast -hls_time 10 -hls_list_size 5 -hls_flags delete_segments output.m3u8 > /dev/null 2>&1 &"
eval "$command"

