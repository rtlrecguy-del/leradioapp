#!/bin/bash
/usr/bin/ps -eo pid | grep ffmpeg | grep -v "grep" | grep -v "udp://" | while IFS= read -r line; do
if [[ -n "$line" ]]; then
kill -s SIGINT "$fline"
fi
done
