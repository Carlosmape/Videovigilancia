#!/bin/bash
sudo apt-get install mysql-server*
sudo apt-get install lighttpd
if(sudo service lighttpd start)then
	sudo chown -R www-data *
	echo "¡CAMS has been configured!. Go to http://yoursite.com/install to do final step"
fi

