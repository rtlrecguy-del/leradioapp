Streams live local radio from RTLSDR Dongle to local devices.  Works with both FM HD FM SD radio and schedules recordings for later listening.

It utilizes CRON formatting to schedule recordings such as:

* Hour=starting hour
* minute=starting minute
* Day(1=monday,2=tuesday,3=wedneday,4=thursday,5=friday,6=saturday,7=sunday,1-7=Record daily)

One issue that may happen on install is the dongle is not being recognized.
To correct use the lsusb command to make sure that the dongle is being recognized on the Host as well as the Docker Container.
It might be required that An udev .rules file will be needed on Host computer to grant access to dongle.

A good place to find local stations to you is to look up your FM stations on wikipdedia by state and look up your HD Radio stations at:

https://hdradio.com/
  
All recordings are setup as repeating.  Remove from CRON in app if not wanting recordings.
 
Program filters out static using noise models for reception problems such as hiss.

Device records or listens to one station at a time. 

I will be trying to improve this but multiple tuners are less needed for radio.

When A recording is scheduled it is generally set to run for an hour if not asked for duration.

I have had success running the Docker container on older intel hardware and devices like La Frite by Libre computer.

Docker runs on server and client connects from phone, android tv, browser.

The server where docker runs can be put anywhere on your network to get the best reception. You can listen to recordings and play radio live on the client device.

No warranty is provided. Posting so people can review code and I can try to make this better.

It requires:

* Linux Intel/AMD computer that can run Docker.
* I am working on ARM Dockerfile version that I have posted and will update.  Has not been tested yet.
* rtlsdr dongle
* Client android device or web browser
* Media player that can play udp stream.
* Local Network unless played on Docker host device.
* Most computers including sbc's built in last 20 years have enough processing power.
* Storage device such as hard drive on server computer.
* This application is made to be used behind firewall on local intranet.

Things you may want to do:

* Change htaccess password by changing the htpasswd command to something of your liking in the docker file.
* You will need that to sign into webapp from android or from browser.
* If using a browser as a client you need to setup a media player listening to udp://@0.0.0.0:12345.
* This is handled automatically on android if vlc is installed and you are using android application.
* Set the timezone in the Dockerfile for you location. It is set to use New York time in Dockerfile currently.
* Access the webapp in a browser at http://ip-address-of-docker-host:8080/

The default username and password for the browser page is:

* Username:myavr2
* password:myavr2radio

Please change this to something of your liking in the Dockerfile beforw creating container.

To setup Android app:

1) Enter the password in the top textbox default myavr2radio
2) Enter http://ip-address-of-docker-host:8080 in second textbox the click save and click back to refresh.

To create the container I ran this command from the myapp2 directory(myapp2arm directory for ARM device like A raspberry pi clone):

docker build ---progress=plain -t myavr2

To run the docker container and setup networking and storage run changing command to your liking:

docker run -d -p 8080:80 -p 12345:12345/udp --device /dev/bus/usb:/dev/bus/usb -v /your/recordingFolder/onyourcomputer:/var/www/html/recordings myavr2

Recordings can be removed from the shared folder but not from application.

To prevent all usb devices to be accessible between docker and host.  You can edit to allow only specific USBs.  You can find this info using command lsusb.

docker run -d -p 8080:80 -p 12345:12345/udp --device /dev/bus/usb/001/022:/dev/bus/usb/001/022 myavr2 

where /001/022 is the specific usb where the dongle is located.

This is A project I am working on and would like to share for other people to test and help me improve. I am not resposible for anything not getting recorded. All the code for the Server is here to review on github.

View Android APP in action at: https://www.youtube.com/watch?v=p9i0KOLc6vE

The dongle I used for this program is:

[NoElec Dongle](https://www.nooelec.com/store/?srsltid=AfmBOopSf4UXkTtCjnEATcpNCeB3GxvSgWppPW0E9qMfOFou75puBHyx)

Not sure if this works well with sdcards as storage. Audio is a lot less write intensive than video but I haven't tested it

Any comments or sugestions please send me a message.  This is an expiremental program in development.
