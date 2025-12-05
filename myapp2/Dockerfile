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
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/delcron.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/fmcron.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/fmradio.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/fmrecord.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/hdcron.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/hdradio.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bash /var/www/html/scripts/hdrecord.sh*" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /bin/bin/pkill mpv" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /usr/bin/pkill rtl_fm" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /usr/bin/pkill ffmpeg" >> /etc/sudoers
RUN echo "www-data ALL=NOPASSWD: /usr/bin/pkill nrsc5" >> /etc/sudoers
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/America/New_York /etc/localtime
RUN a2enmod rewrite
RUN dpkg-reconfigure tzdata
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN usermod -aG sudo www-data
EXPOSE 80
EXPOSE 12345
RUN chmod -R +x /var/www/html/scripts/
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
WORKDIR /var/www/html/noisemod
RUN git clone https://github.com/GregorR/rnnoise-models.git
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html
RUN mkdir /app
WORKDIR /app
RUN chmod 777 /entrypoint.sh
RUN chmod u+s /usr/sbin/cron
RUN touch /var/log/cron.log
RUN usermod -s /bin/bash www-data
USER www-data
ENTRYPOINT ["/entrypoint.sh"]
 
