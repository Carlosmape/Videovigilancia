#!/bin/bash
#Installing motion support
echo "##Installing motion for videovigilance"
sudo apt-get install motion
if (sudo cp motion.conf /etc/motion && sudo cp thread1.conf /etc/motion && sudo cp thread2.conf /etc/motion && sudo cp motion /etc/default) then
	motion_log="Passed"
else
	motion_log="Error"
fi

#Installing CAMS dependencies
echo "##Installing CAMS for the interface"
sudo apt-get install mysql-server*
sudo apt-get install lighttpd

#adding php support
sudo lighty-enable-mod fastcgi 
sudo lighty-enable-mod fastcgi-php
<<<<<<< HEAD

#Check all
if(sudo service lighttpd force-reload)then
	sudo chown -R www-data *
	lighttpd_log="Passed"
else
	lighttpd_log="Error"

=======
clear
>>>>>>> 0016cb76b6e0226ee1b3b9483ac37d63ca21e948
if(sudo cp -r * /var/www/html/)then
	echo "#CAMS copied to /var/www/html/"
fi
if(sudo service lighttpd force-reload)then
<<<<<<< HEAD
	sudo chown -R www-data *
=======
	sudo chown -R www-data /var/www/html/*
	echo "#CAMS has been configured!. Go to http://yoursite.com/install to do final step"
>>>>>>> 0016cb76b6e0226ee1b3b9483ac37d63ca21e948
fi
clear
echo "#Motion...${motion_log}"
echo "#Lighttpd...${lighttpd_log}"
echo "#CAMS...Passed.Reboot and got to http://localhost/install to do final step"
