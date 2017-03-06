#!/bin/bash
#Installing motion support
echo "##Installing motion for videovigilance"
sudo apt-get install motion
if (sudo cp motion.conf /etc/motion && sudo cp thread1.conf /etc/motion && sudo cp thread2.conf /etc/motion) then
	echo "##MOTION INSTALLED AND CONFIGURED"
fi

#Installing CAMS dependencies
echo "##Installing CAMS for the interface"
sudo apt-get install mysql-server*
sudo apt-get install lighttpd

#Copying CAMS to /var/www/html
sudo cp -r * /var/www/html

#adding php support
sudo lighty-enable-mod fastcgi 
sudo lighty-enable-mod fastcgi-php

#Check all
if(sudo service lighttpd force-reload)then
	sudo chown -R www-data *
	echo "##¡CAMS has been configured!. Go to http://yoursite.com/install to do final step"
fi

