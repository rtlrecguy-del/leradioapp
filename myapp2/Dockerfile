FROM debian:latest
ENV DEBIAN_FRONTEND=noninteractive
RUN apt update -y && apt install -y at p7zip-full unzip curl apache2-utils librtlsdr-dev git cmake && apt install -y apache2 libapache2-mod-php php && apt install -y build-essential cmake autoconf libtool libao-dev libfftw3-dev && apt install -y ffmpeg openssl libmp3lame-dev git cmake pkg-config libusb-1.0-0-dev sox udev usbutils
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
RUN chmod 777 /var/www/html/recordings
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/America/New_York /etc/localtime
RUN chmod g+s /var/www/html/recordings
RUN a2enmod rewrite
RUN dpkg-reconfigure tzdata
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar create-project cronkeep/cronkeep --keep-vcs -s dev /var/www/html/cronkeep
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
EXPOSE 80
EXPOSE 12345
RUN chown -R www-data:www-data /var/www/html
RUN chsh -s /bin/bash www-data
RUN chmod -R a+x /var/www/html/scripts/
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
ENTRYPOINT ["/entrypoint.sh"]
 
