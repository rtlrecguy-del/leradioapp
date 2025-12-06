#!/bin/bash
/usr/bin/ps -eo pid,command | grep ffmpeg | grep "udp://" | -v "grep" | while IFS= read -r line; do
pid_awk=$(echo "$line" | awk '{print $1}')
if [[ -n "$pid_awk" ]]; then
kill -s SIGINT "$pid_awk"
fi
done
echo "$pid_awk"
pkill -9 nrsc5 > /dev/null 2>&1
