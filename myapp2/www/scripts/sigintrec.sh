#!/bin/bash
/usr/bin/ps -eo pid | grep ffmpeg | grep -v "grep" | grep -v "/var/www/html/scripts/recordings" | while IFS= read -r line; do
if [[ -n "$line" ]]; then
kill -s SIGINT "$fline"
fi
done
