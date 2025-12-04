FROM debian:latest
ENV DEBIAN_FRONTEND=noninteractive
RUN apt update -y && apt install -y at apache2-utils librtlsdr-dev git cmake && apt install -y apache2 sudo libapache2-mod-php php && apt install -y build-essential cmake autoconf libtool libao-dev libfftw3-dev && apt install -y ffmpeg openssl libmp3lame-dev git cmake pkg-config libusb-1.0-0-dev sox udev usbutils
RUN apt install -y cron rtl-sdr mpv
RUN echo -e "\nblacklist dvb_usb_rtl28xxu\nblacklist rtl2832\nblacklist rtl2830" >> /etc/modprobe.d/blacklist.conf
COPY ./www /var/www/html
RUN htpasswd -cb /etc/apache2/.htpasswd myavr2 myavr2radio
RUN git clone https://github.com/theori-io/nrsc5.git && cd nrsc5 && mkdir build && cd build && cmake .. && make && make install && ldconfig
RUN rm /var/www/html/index.html
RUN echo "www-data" > /etc/at.allow 
COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./envars /etc/apache2/envars
COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/cronp.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/cron.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/hdcron.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/hdradio.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/hdrecordfm1.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/hdradio1.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/sradio.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/srecordfm1.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/tuneincron.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/tuneincradio.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /usr/bin/pkill rtl_fm" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /usr/bin/pkill ffmpeg*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /usr/bin/pkill nrsc5" >> /etc/sudoers
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/America/New_York /etc/localtime
RUN a2enmod rewrite
RUN dpkg-reconfigure tzdata
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN usermod -aG sudo www-data
EXPOSE 80
EXPOSE 12345
RUN chmod -R a+x /var/www/html/scripts/
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
WORKDIR /var/www/html/noisemod
RUN git clone https://github.com/GregorR/rnnoise-models.git
RUN chown -R www-data:www-data /var/www/html
WORKDIR /
ENTRYPOINT ["/entrypoint.sh"]
 
