# leradioapp
Plays records FM HD FM SD over network and schedules recordings.
It also filters out static using noise models for reception problems.
Docker runs on server and client connects from phone, android tv, browser.

Explantion of program: This is all experimental. So use accordingly as not production ready but hope it is someday. It was coded on an intel computer but has worked at different levels on raspberry pi clones with limited power. It requires an rtlsdr dongle. To use on raspberry Pi there might need to be a few changes to installing the programs such as rtlsdr and nrsc5.

First thing is to go into the Dockerfile and change the password setup with htpasswd command to something of your liking. You will need that to sign into webapp from android or from browser. Once a live stream is started from the app you also need a media player that the client listens to at udp://@0.0.0.0:12345. This is handled automatically on android if vlc is installed.

To Create the container I ran docker build on A linux machine from within the myapp2 computer. I installed Docker straight from the docker website by script. docker 

I have not tried the docker server on Windows and it would need changes to work.

docker build ---progress=plain -t myavr2

To run the docker container and setup networking run docker run -d -p 8080:80 -p 12345:12345/udp --device /dev/bus/usb:/dev/bus/usb myavr2 This command give full access to device usb on host system so adjust accordingly for your own security if needed such as docker run -d -p 8080:80 -p 12345:12345/udp --device /dev/bus/usb/001/022:/dev/bus/usb/001/022 myavr2 I just kept it the original command because usb device numbers can change with disconnects and would cause problems.

I recommend you take time to fully understand it as its a complicated setup. No warranty is provided. I am posting for coders who can maybe help with getting it to where it should be.

The app webpage is only protected by htaccess which you set a password in the Dockerfile on the htpasswd command. The username is myavr2 and you will need the password you created to put into android app password box or to access the webpage from a browser. Android requires that vlc is installed.

To access the webpage you will have to use the address of the docker host and either browser on webbrowser to http://ipaddress:8080/. On android app you place this address in application textbox and click save and then refresh with back button. You only do this once.

View Android APP at https://www.youtube.com/watch?v=p9i0KOLc6vE
