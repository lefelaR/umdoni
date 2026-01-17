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
    php8.3-xdebug php8.3-cli php8.3-bz2 php8.3-curl php8.3-mbstring php8.3-intl php8.3-xml php8.3-mysqli php8.3-pdo php8.3-pdo-mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*


RUN echo "<Directory /var/www/html>\n\tAllowOverride All\n</Directory>" >> /etc/apache2/apache2.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf


# Install mysql
RUN apt-get update && apt-get install -y mysql-server 

# Create a directory for the MySQL user and socket directory
RUN mkdir -p /nonexistent && chown mysql:mysql /nonexistent && \
    mkdir -p /var/run/mysqld && chown mysql:mysql /var/run/mysqld

# Configure MySQL to accept connections from other containers (before starting)
RUN sed -i 's/^bind-address.*/bind-address = 0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf 2>/dev/null || \
    echo -e "\n[mysqld]\nbind-address = 0.0.0.0\n" >> /etc/mysql/mysql.conf.d/mysqld.cnf

#Configure MySQL
RUN service mysql start && \
    mysql -e "CREATE DATABASE umdonigov_umdoni;" && \
    mysql -e "CREATE USER 'umdonigov_admin'@'%' IDENTIFIED BY '29019WtP98zj23';" && \
    mysql -e "GRANT ALL PRIVILEGES ON umdonigov_umdoni.* TO 'umdonigov_admin'@'%';" && \
    mysql -e "FLUSH PRIVILEGES;"

# Enable Apache modules and default SSL site
RUN a2enmod rewrite ssl headers php8.3 && a2ensite 000-default default-ssl.conf

# Copy custom PHP and Xdebug configuration files
COPY docker/php.ini.development /etc/php/8.3/apache2/php.ini

COPY docker/xdebug.ini /etc/php/8.3/conf.d/20-xdebug.ini

# Copy database initialization files
RUN mkdir -p /docker-entrypoint-initdb.d/migrations
COPY scripts/umdoni_data.sql /docker-entrypoint-initdb.d/umdoni_data.sql
COPY Migrations/*.sql /docker-entrypoint-initdb.d/migrations/
COPY scripts/init-db.sh /docker-entrypoint-initdb.d/init-db.sh
RUN chmod +x /docker-entrypoint-initdb.d/init-db.sh

# Install Mailpit
RUN curl -sL https://raw.githubusercontent.com/axllent/mailpit/develop/install.sh | bash

# Expose HTTP, HTTPS, and MySQL ports
EXPOSE 80 443 3306

# Set the command to start MySQL, Apache and Mailpit
CMD sh -c "sed -i \"s/xdebug.client_host=.*/xdebug.client_host=${PC_IP_ADDRESS}/\" /etc/php/8.3/apache2/conf.d/20-xdebug.ini; service mysql start && sleep 3 && chmod 755 /var/run/mysqld 2>/dev/null || true && /docker-entrypoint-initdb.d/init-db.sh && /usr/local/bin/mailpit & apache2ctl -D FOREGROUND"