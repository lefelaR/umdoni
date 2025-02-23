FROM ubuntu:22.04

# Set noninteractive mode to avoid prompts during package installation
ENV DEBIAN_FRONTEND=noninteractive

# Install base dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    software-properties-common \
    gnupg \
    curl \
    vim \
    unzip \
    zip \
    imagemagick \
    ssl-cert \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Add Ondrej's PHP PPA
RUN LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php

# Install Apache, PHP, and required extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    apache2 \
    php8.3 \
    libapache2-mod-php8.3 \
    php8.3-xdebug php8.3-cli php8.3-bz2 php8.3-curl php8.3-mbstring php8.3-intl php8.3-xml php8.3-mysqli \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache modules and default SSL site
RUN a2enmod rewrite ssl headers php8.3 && a2ensite default-ssl.conf

# Copy custom PHP and Xdebug configuration files
COPY docker/php.ini.development /etc/php/8.3/apache2/php.ini
COPY docker/xdebug.ini /etc/php/8.3/conf.d/20-xdebug.ini

# Install Mailpit
RUN curl -sL https://raw.githubusercontent.com/axllent/mailpit/develop/install.sh | bash

# Expose HTTP and HTTPS ports
EXPOSE 80 443

# Set the command to start Apache and Mailpit
CMD sh -c "sed -i \"s/xdebug.client_host=.*/xdebug.client_host=${PC_IP_ADDRESS}/\" /etc/php/8.3/apache2/conf.d/20-xdebug.ini; /usr/local/bin/mailpit & apache2ctl -D FOREGROUND"