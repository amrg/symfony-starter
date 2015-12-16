#!/bin/bash

# Use ACLs to prevent permissions problems
# http://symfony.com/doc/current/book/installation.html#book-installation-permissions
# https://help.ubuntu.com/community/FilePermissionsACLs
# https://gist.github.com/frastel/6775604
folder="/var/www/sf"
rm -Rf $folder
mkdir -p $folder
setfacl -R -n -m u:www-user:rwX -m u:www-data:rwX -m u:vagrant:rwX $folder
setfacl -dR -n -m u:www-user:rwX -m u:www-data:rwX -m u:vagrant:rwX $folder