#!/bin/bash
cd hls
command="rtl_fm -f $1M -s 200000 -r 48000 -g 49.6 2> /dev/null | ffmpeg -re -f s16le -ar 48000 -i pipe:0 -c:v libx264 -preset veryfast -hls_time 10 -hls_list_size 5 -hls_flags delete_segments output.m3u8 > /dev/null 2>&1 &"
eval "$command"
