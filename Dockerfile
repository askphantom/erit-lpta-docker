# Use PHP 5.6 with Apache (compatible with CodeIgniter 3)
FROM php:5.6-apache

# Install necessary PHP extensions
# RUN sed -i s/deb.debian.org/archive.debian.org/g /etc/apt/sources.list
# RUN sed -i s/security.debian.org/archive.debian.org/g /etc/apt/sources.list
# RUN sed -i s/stretch-updates/stretch/g /etc/apt/sources.list
# RUN apt-get install php-xdebug
# RUN apt-get update && apt-get install -y \
#     libpng-dev libjpeg-dev libfreetype6-dev zip unzip libonig-dev \
#     && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
#     docker-php-ext-install gd mysqli mbstring

RUN sed -i -e 's/deb.debian.org/archive.debian.org/g' \
           -e 's|security.debian.org|archive.debian.org/|g' \
           -e '/stretch-updates/d' /etc/apt/sources.list

RUN apt-get update
RUN apt-get install --yes --force-yes cron g++ gettext libicu-dev openssl libc-client-dev libkrb5-dev  libxml2-dev libfreetype6-dev libgd-dev libmcrypt-dev bzip2 libbz2-dev libtidy-dev libcurl4-openssl-dev libz-dev libmemcached-dev libxslt-dev

RUN a2enmod rewrite

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

RUN docker-php-ext-configure gd --with-freetype-dir=/usr --with-jpeg-dir=/usr --with-png-dir=/usr
RUN docker-php-ext-install gd

# Enable Apache mod_rewrite
# RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy application code to the container
COPY ./app /var/www/html

# Set permissions
# RUN chown -R www-data:www-data /var/www/html

# Expose the default HTTP port
EXPOSE 80
