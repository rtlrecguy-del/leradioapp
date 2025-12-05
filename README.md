No Internet is needed for this Container.   Just intranet.  

I suggest for security that in your router you block the Single Board Computer(for example) Docker Server from the internet. 

It doesn't require updates for a guide because guide data isn't relatively available for FM Radio.

Perfect for people with Data Plans or limited internet.


Example Video:

https://www.youtube.com/playlist?list=PL7Sqq_-LtHrpUMhH990X8fflRT2970h6X

Streams live local radio from RTLSDR Dongle to local devices.  Works with both FM HD FM SD radio and schedules recordings for later listening.

It utilizes CRON formatting to schedule recordings such as:

* Hour=starting hour
* minute=starting minute
* Day(1=monday,2=tuesday,3=wedneday,4=thursday,5=friday,6=saturday,7=sunday,1-7=Record daily)

One issue that may happen on install is the dongle is not being recognized.
To correct use the lsusb command to make sure that the dongle is being recognized on the Host as well as the Docker Container.
It might be required that An udev .rules file will be needed on Host computer to grant access to dongle.

A good place to find local stations to you is to look up your FM stations on Wikipedia by state and look up your HD Radio stations at:

https://hdradio.com

The recordings are not accessible from the app.   The shared directory on Host should be setup to share over the network to a media player like VLC.
All recordings are setup as repeating.  Remove from CRON in app if you want to cancel a scheduled recording.
 
Program filters out static using noise models for reception problems such as hiss.

Device records or listens to one station at a time. 

I will be trying to improve this but multiple tuners are less needed for radio.

When A recording is scheduled it is generally set to run for an hour if not asked for duration.

I have had success running the Docker container on older intel hardware and devices like La Frite by Libre computer.

Docker runs on server and client connects from phone, android tv, browser.

The server where docker runs can be put anywhere on your network to get the best reception. You can listen to recordings and play radio live on the client device.

No warranty is provided. Posting so people can review code and I can try to make this better.

It requires:

* Debian or Ubuntu computer for Docker Host(May work on others with changes to configuration)
* rtlsdr dongle
* Client android device or web browser
* Media player that can play udp stream.
* Local Network unless played on Docker host device.
* Most computers including SBC's built in last 20 years have enough processing power.
* Storage device such as hard drive on server computer.
* This application is made to be used behind firewall on local intranet.
* Some configuration may be required as this has been in development for very short time.

Things you may want to do:

* Change htaccess password by changing the htpasswd command to something of your liking in the docker file.
* You will need that to sign into webapp from android or from browser.
* If using a browser as a client you need to setup a media player listening to udp://@0.0.0.0:12345.
* This is handled automatically on android if vlc is installed and you are using android application.
* Set the timezone in the Dockerfile for you location. It is set to use New York time in Dockerfile currently.
* Access the webapp in a browser at http://ip-address-of-docker-host:8080/
* The apache2.conf file limits access to server to LAN subnet.   Before installing you want to modify to appropriate setting for your netowrk.

The default username and password for the browser page is:

* Username:myavr2
* password:myavr2radio

Please change this to something of your liking in the Dockerfile before creating container.

To setup Android app:

1) Enter the password in the top textbox default myavr2radio
2) Enter http://ip-address-of-docker-host:8080 in second textbox the click save and click back to refresh.

To create the container I ran this command from the myapp2 directory:

docker build -t myavr2 .

To run the docker container and setup networking and storage run changing command to your liking:

docker run -d -p 8080:80 -p 12345:12345/udp --device /dev/bus/usb:/dev/bus/usb -v /your/recordingFolder/onyourcomputer:/var/www/html/recordings myavr2

The volume on your computer should match the same UID or GID as the www-data user in the dockerfile is set.

To prevent all usb devices to be accessible between docker and host.  You can edit to allow only specific USBs.  You can find this info using command lsusb.

docker run -d -p 8080:80 -p 12345:12345/udp --device /dev/bus/usb/001/022:/dev/bus/usb/001/022 myavr2 

where /001/022 is the specific usb where the dongle is located.


The dongle I used as the tuner is listed below:

[NoElec Dongle](https://www.nooelec.com/store/?srsltid=AfmBOopSf4UXkTtCjnEATcpNCeB3GxvSgWppPW0E9qMfOFou75puBHyx)

Not sure if this works well with sdcards as storage. Audio is a lot less write intensive than video but I haven't tested it

Any comments or suggestions please send me a message.  This is an experimental program in development.
