#!/bin/sh

pids=$(pidof /usr/bin/Xvfb)
if ! [ -n "$pids" ]; then
    xvfb-run :99 -ac -screen 0 1024x768x24 &
    export DISPLAY=:99
fi

gulp
php bin/phpspec run
php bin/behat
protractor cucumberConf.js
