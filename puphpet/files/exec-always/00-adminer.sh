#!/bin/bash

rm -f /var/www/html/*
wget https://www.adminer.org/static/download/4.2.2/adminer-4.2.2-mysql-en.php -O /var/www/html/index.php
wget https://raw.githubusercontent.com/vrana/adminer/master/designs/pappu687/adminer.css -O /var/www/html/adminer.css
