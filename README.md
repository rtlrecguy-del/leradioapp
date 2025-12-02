Plays records FM HD FM SD over network and schedules recordings. It also filters out static using noise models for reception problems. Docker runs on server and client connects from phone, android tv, browser.

The server where docker runs can be put anywhere on your network to get the best reception. You can listen to recordings and play radio live on the client device.

No warranty is provided. Posting so people can review code and I can try to make this better.

It requires:

* Linux Intel/AMD computer that can run Docker. ARM version will be coming soon.
* rtlsdr dongle
* Client android device or web browser
* Media player that can play udp stream.
* Local Network unless played on Docker host device.
* Most computers including sbc's built in last 20 years have enough processing power.
* Storage device such as hard drive on server computer.

Things you may want to do:

* Change htaccess password by changing the htpasswd command to something of your liking in the docker file.
* You will need that to sign into webapp from android or from browser.
* If using a browser as a client you need to setup a media player listening to udp://@0.0.0.0:12345.
* This is handled automatically on android if vlc is installed and you are using android application.
* Set the timezone in the Dockerfile for you location. It is set to use New York time in Dockerfile currently.
* Write down the password you set for htaccess as this will be needed in android app in the textbox.
* Write down the user to access the app is myavr2 default password is myavr2radio
* Access the webapp in a browser at http://ip-address-of-docker-host:8080/

To setup Android app:

1) Enter the password in the top textbox default myavr2radio
2) Enter http://ip-address-of-docker-host:8080 in second textbox the click save and click back to refresh.

To create the container I ran the command from the myapp2 directory:

docker build ---progress=plain -t myavr2

To run the docker container and setup networking and storage run changing command to your liking:

docker run -d -p 8080:80 -p 12345:12345/udp --device /dev/bus/usb:/dev/bus/usb -v /your/recordingFolder/onyourcomputer:/var/www/html/recordings myavr2
Recordings can be removed from the shared folder but not from application.

If you want to limit access to only the rtlsdr dongle usb on host modify command similar to below.  You can find this info using command lsusb.
docker run -d -p 8080:80 -p 12345:12345/udp --device /dev/bus/usb/001/022:/dev/bus/usb/001/022 myavr2 
where /001/022 is the specific usb where the dongle is located.

No warranty is provided. This is just a project I am working on and would like to share for other people to test and help me improve. I am not resposible for anything not getting recorded. All the code for the Server is here to review on github.

View Android APP in action at: https://www.youtube.com/watch?v=p9i0KOLc6vE

The dongle I used for this program is:

[No Elec Dongle](https://www.nooelec.com/store/?srsltid=AfmBOopSf4UXkTtCjnEATcpNCeB3GxvSgWppPW0E9qMfOFou75puBHyx)

Not sure if this works well with sdcards holding storage. Audio is a log less write intensive than video but I haven't tested it
