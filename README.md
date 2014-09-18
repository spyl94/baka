Baka
========================

[![Build Status](https://travis-ci.org/spyl94/baka.svg?branch=master)](https://travis-ci.org/spyl94/baka)

Upload your mangas and read them everywhere.

Baka is an open source platform available to every manga readers.


# Installation

    git clone https://github.com/spyl94/baka.git

## Automatic (Capifony)

Modify deploy.rb according to your needs.

    cap deploy

## Manual

    composer install
    npm install && npm install -g bower
    bower install
    gulp

## Configuring parameters

-  upload_dir : the folder which contains your mangas (must be in /web), default is "uploads"

## Configuring Apache

You can see an example of VirtualHost file with Apache 2.4+ and PHP-FPM, used by Travis-CI :
https://github.com/spyl94/baka/blob/master/app/config/travis-ci-apache

# Development & Contributing


You should use the provided environment with Vagrant.

# Tests

    ./test.sh






