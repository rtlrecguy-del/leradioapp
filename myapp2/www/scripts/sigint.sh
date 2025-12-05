 #!/bin/bash
USER=www-data
ffmpegpid=$(/bin/ps -fu $USER| grep "ffmpeg" | grep -v "grep" | awk '{print $2}'`)
nrsc5id=$(/bin/ps -fu $USER| grep "nrsc5" | grep -v "grep" | awk '{print $2}'`)
rtl_smid=$(/bin/ps -fu $USER| grep "rtl_fm" | grep -v "grep" | awk '{print $2}'`)
 
kill -SIGINT "$ffmpegpid"
kill -SIGINT "$rtl_fmpid"
kill -SIGINT "$nrsc5pid"
  
