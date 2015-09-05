FROM ubuntu:14.04
MAINTAINER Ben Overmyer <manatrance@gmail.com>

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update -y
RUN apt-get install -y software-properties-common
RUN add-apt-repository ppa:nginx/development
RUN apt-get update -y
RUN apt-get upgrade -y
RUN apt-get install -y \
supervisor \
nginx \
php5-fpm \
php5-cli \
php5-curl \
php5-gd \
php5-mysql \
php5-memcached \
php5-mcrypt

# Clean up to reduce container size
RUN apt-get remove --purge -y software-properties-common
RUN apt-get autoremove -y
RUN apt-get clean
RUN apt-get autoclean
RUN echo -n > /var/lib/apt/extended_states
RUN rm -rf /var/lib/apt/lists/*
RUN rm -rf /usr/share/man/??
RUN rm -rf /usr/share/man/??_*

# Configure php-fpm
RUN sed -e 's/;daemonize = yes/daemonize = no/' -i /etc/php5/fpm/php-fpm.conf
RUN sed -e 's/;listen\.owner/listen.owner/' -i /etc/php5/fpm/pool.d/www.conf
RUN sed -e 's/;listen\.group/listen.group/' -i /etc/php5/fpm/pool.d/www.conf

# Configure nginx to not run in daemonized mode
RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# Configure nginx virtualhost
RUN rm -Rf /etc/nginx/conf.d/*
RUN rm -Rf /etc/nginx/sites-available/default
ADD ./nginx-vhost.conf /etc/nginx/sites-available/default.conf
RUN ln -s /etc/nginx/sites-available/default.conf /etc/nginx/sites-enabled/default.conf

# Add Monk
ADD . /srv/www

# Configure Supervisor
ADD ./supervisord.conf /etc/supervisor/conf.d/supervisor.conf

# Fix permissions
RUN chown -Rf www-data:www-data /srv/www/

WORKDIR /srv/www

# Expose Ports
EXPOSE 80

CMD ["/usr/bin/supervisord"]
