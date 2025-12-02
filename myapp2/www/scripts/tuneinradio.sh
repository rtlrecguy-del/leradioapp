#!/bin/bash
cd /home/ted
current_time=$(date "+%d-%H.%M") > /dev/null 2>&1
if [ $1 = "1" ]; then
String98="timeout 1h mpv --quiet --vo=null -ao=null --stream-record=/var/www/html/recordings/tunein$current_time.mp3 http://opml.radiotime.com/Tune.ashx?id=s20431&formats=aac,mp3 > /dev/null 2>&1 &"
eval "$String98"
fi
if [ $1 = "2" ]; then
String98="timeout 1h mpv --quiet --vo=null -ao=null --stream-record=/var/www/html/recordings/tunein$current_time.mp3 http://opml.radiotime.com/Tune.ashx?id=s297990&formats=aac,mp3 > /dev/null 2>&1 &"
eval "$String98"
fi
if [ $1 = "3" ]; then
String98="timeout 1h mpv --quiet --vo=null -ao=null --stream-record=/var/www/html/recordings/tunein$current_time.mp3 http://opml.radiotime.com/Tune.ashx?id=s20407&formats=aac,mp3 > /dev/null 2>&1 &"
eval "$String98"
fi
if [ $1 = "4" ]; then
String98="timeout 1h mpv --quiet --vo=null -ao=null --stream-record=/var/www/html/recordings/tunein$current_time.mp3 http://opml.radiotime.com/Tune.ashx?id=${1}&formats=aac,mp3 > /dev/nul>eval "$String98"
fi
