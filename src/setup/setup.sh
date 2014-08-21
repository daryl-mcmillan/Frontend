#!/bin/bash

set -e

SETUP_DIR="$( dirname "${BASH_SOURCE[0]}" )"
APACHE_CONF="$SETUP_DIR/apache.conf"
PROJECT_DIR="$( cd "$SETUP_DIR/.." && pwd )"

#apt-get update
#DEBIAN_FRONTEND=noninteractive apt-get install -yq libapache2-mod-php5 php5-json
sed "s|{RootPath}|$PROJECT_DIR|g" < $APACHE_CONF > /etc/apache2/sites-available/frontend.conf
a2dissite 000-default
a2ensite frontend
service apache2 reload
