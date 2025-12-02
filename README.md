# leradioapp
Plays records FM HD FM SD over network and schedules recordings. It also filters out static using noise models for reception problems. Docker runs on server and client connects from phone, android tv, browser.

The server where docker runs can be put anywhere on your network to get the best reception. You can listen to recordings and play radio live on the client device.

No warranty is provided. Posting so people can review code and I can try to make this better.  

It requires:
  1. Linux Intel/AMD computer that can run Docker.  ARM version will be coming soon.
  2. rtlsdr dongle
  3. Client android device or web browser
  4. Media player that can play udp stream.
  5. Local Network unless played on Docker host device.
  6. Most computers including sbc's build in last 20 years have enough processing power.
  7. Storage device such as hard drive on server computer.


Things you may want to do:
  1) Change htaccess password by changing the htpasswd command to something of your liking in the docker file.  
  2) You will need that to sign into webapp from android or from browser.
  3) If using a browser as a client you need to setup a media player listening to udp://@0.0.0.0:12345.
  4) This is handled automatically on android if vlc is installed and you are using android application.
  5) Set the timezone in the Dockerfile for you location.  It is set to use New York time in Dockerfile currently.
  6) Write down the password you set for htaccess as this will be needed in android app in the textbox.
  7) Write down the user to access the app is myavr2 default password is myavr2radio
  8) Access the webapp in a browser at http://IP-address-of-docker-host:8080
  9) To setup android app enter the password in the top textbox and the server to connect to http://IP-address-of-docker-host:8080 in second textbox.  Then click save and click back to refresh.

To create the container I ran the command from the webapp director:
  1) docker build ---progress=plain -t myavr2 

To run the docker container and setup networking and storage run changing command to your liking: 
  1) docker run -d -p 8080:80 -p 12345:12345/udp --device /dev/bus/usb:/dev/bus/usb -v /your/recordingFolder/onyourcomputer:/var/www/html/recordings myavr2

Recordings can be removed from the shared folder but not from application.

The command to share the usb dongle with the host will give full access to device usb <a href="https://www.youtube.com/watch?v=p9i0KOLc6vE">https://www.youtube.com/watch?v=p9i0KOLc6vE</a>on host system unless modified so adjust accordingly for your own security 
An example of a command to limit access to just a specific usb would be:
docker run -d -p 8080:80 -p 12345:12345/udp --device /dev/bus/usb/001/022:/dev/bus/usb/001/022 myavr2
where /001/022 is the specific usb where the dongle is located.

No warranty is provided. This is just a project I am working on and would like to share for other people to test and help me improve.  I am not resposible for anything not getting recorded. All the code for the Server is here to review on github.

View Android APP in action at:
<a href="https://www.youtube.com/watch?v=p9i0KOLc6vE">https://www.youtube.com/watch?v=p9i0KOLc6vE</a>



The dongle I used for this program is:

<a href="https://www.nooelec.com/store/?srsltid=AfmBOopSf4UXkTtCjnEATcpNCeB3GxvSgWppPW0E9qMfOFou75puBHyx">No Elec Dongle</a>

Not sure if this works well with sdcards holding storage.   Audio is a log less write intensive than video but I haven't tested it  
