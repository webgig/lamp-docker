# Use the latest Ubuntu base image
FROM ubuntu:latest
MAINTAINER Sagar Bhandari <webgig.sagar@gmail.com>

# Silence debconf's endless prattle
ENV DEBIAN_FRONTEND noninteractive


RUN apt-get install -y software-properties-common
RUN add-apt-repository ppa:ondrej/php-7.0
RUN apt-get update && apt-get purge php5-fpm && apt-get --purge autoremove 
RUN apt-get install --force-yes -y nginx php7.0-fpm php7.0-mysql

ADD ./conf/www.conf      /etc/php/7.0/fpm/pool.d/www.conf 
ADD ./conf/php-fpm.conf  /etc/php/7.0/fpm/php-fpm.conf
ADD ./conf/default.conf  /etc/nginx/sites-available/default

# sites volume
RUN mkdir /var/www/
RUN echo "<?php phpinfo() ?>" > /var/www/index.php

# Append "daemon off;" to the configuration file
RUN echo "daemon off;" >> /etc/nginx/nginx.conf
# RUN echo "\ndaemonize = no" >> /etc/php/7.0/fpm/php-fpm.conf

# Expose the ports
EXPOSE 80
EXPOSE 443

# Start the services

# This helps to allow the container to run on background
CMD service php7.0-fpm start && service nginx start 
