#!bin/bash

# Update via svn
# echo "Updating Wordpress Install to Latest... "
# svn update
# echo "SVN Exporting Wordpress to Augusta Directory"
# svn export --force . ../../www/

echo "Exporting Latest Wordpress Truck via SVN"
echo "########################################"
export _WWW="../www/"
svn export --force http://core.svn.wordpress.org/trunk/ $_WWW

#echo "Downloading via wget latest Wordpress Install"
#wget "http://wordpress.org/latest.tar.gz" && tar -xvfz latest.tar.gz
