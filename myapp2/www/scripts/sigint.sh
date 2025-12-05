#!/bin/bash
ffmpegpid=$(pidof ffmpeg)
if [[ -n "$ffmpegpid" ]]; then
kill -s SIGINT "$ffmpegpid"
fi
  
