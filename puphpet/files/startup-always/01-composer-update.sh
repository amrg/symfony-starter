#!/bin/bash
php -n -d xdebug.remote_autostart=0 -d xdebug.remote_enable=0 -d xdebug.profiler_enable=0 /usr/local/bin/composer self-update