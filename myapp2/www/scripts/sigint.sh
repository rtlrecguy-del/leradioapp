#!/bin/bash
ffmpegpid=$(pidof ffmpeg)
if [[ -n "$ffmpegpid" ]]; then
if [[ "$1" == "$ffmpegid" ]]; then
kill -s SIGINT "$ffmpegpid"
fi
fi
  
