/usr/bin/ps -eo pid,command | grep ffmpeg | grep "udp://" | while IFS= read -r line; do
pid_awk=$(echo "$line" | awk '{print $1}')
if [[ -n "$pid_awk" ]]; then
kill -s SIGINT "$pid_awk"
fi
done
echo "$pid_awk"
