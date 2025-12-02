# leradioapp
docker container to record and play radio over network with rtlsdr dongles.    HD SD
Explantion of program:
This is all experimental. So use accordingly as not production ready but hope it is someday. It was coded on an intel computer but has worked at different levels on raspberry pi clones with limited power. It requires an rtlsdr dongle. To use on raspberry Pi there might need to be a few changes to installing the programs such as rtlsdr and nrsc5.

First thing is to go into the Dockerfile and change the password setup with htpasswd command to something of your liking. You will need that to sign into webapp from android or from browser. Once a live stream is started from the app you also need a media player that the client listens to at udp://@0.0.0.0:1234. This is handled automatically on android if vlc is installed.

To Create the container I ran on a linux machine from within the myapp2 computer. I installed Docker straight from the docker website by script. docker build ---progress=plain -t myavr2

To run the docker container and setup networking run docker run -d -p 8080:80 -p 12345:12345/udp --device /dev/bus/usb:/dev/bus/usb myavr2

I recommend you take time to fully understand it as its a complicated setup. No warranty is provided. I am posting for coders who can maybe help with getting it to where it should be.

View Android APP at https://www.youtube.com/watch?v=p9i0KOLc6vE

It should show correctly on browser on a phone, tablet, laptop, computer and android.
