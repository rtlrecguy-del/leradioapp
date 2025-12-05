#!/bin/bash
count=0
/usr/bin/ps -eo command | grep rtl_fm | grep -v "grep" | while IFS= read -r line; do
new_string=$(echo "$line" | sed 's/-s 200000 -r 48000//g')
    echo "status tuner $count: $new_string"
  ((count++))
done
count=0
/usr/bin/ps -eo command | grep nrsc5 | grep -v "grep" | while IFS= read -r line; do
    echo "status tuner $count: $line"
  ((count++))
done
