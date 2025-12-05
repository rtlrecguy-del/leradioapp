#!/bin/bash
/usr/bin/ps -eo pid | grep rtl_fm | grep -v "grep" | while IFS= read -r line; do
new_string=$(echo "$line" | sed 's/-s 200000 -r 48000//g')
    echo "$new_string"
    echo "$new_string"
done
/usr/bin/ps -eo pid | grep nrsc5 | grep -v "grep" | while IFS= read -r line; do
    echo "$line"
    echo "$line"
done
