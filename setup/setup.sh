#!bin/bash

svn() {
# Update via svn
echo "Updating Wordpress Install to Latest... "
svn update
echo "SVN Exporting Wordpress to Augusta Directory"
svn export --force . ../../www/

echo "Exporting Latest Wordpress Truck via SVN"
echo "########################################"
export _WWW="../www/"
svn export --force http://core.svn.wordpress.org/trunk/ $_WWW
}
dl() {
  if [ -f temp ]; then 
      echo "Attempting to remove temporary files in 'temp' folder"
      sudo rm -rf temp
	  sudo mkdir temp
  else
    sudo mkdir temp
  fi
  echo "Downloading via wget latest Wordpress Install"
   wget "http://wordpress.org/latest.tar.gz"
  tar -xvf latest.tar.gz -C temp
  echo "Copying Wordpress Files"
  cp -rfv temp/wordpress/* ../www/
}
 
main() {
read -p "Update wordpress by:
[1] wget  
[2] svn export
? " op
if [ $op == "1" ]; then dl
elif [ $op == "2" ]; then svn
else
  echo "#############################
  Try again
  #############################"
  main
fi 
}

main

unset main
unset dl
unset svn

exit 0