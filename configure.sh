#!/bin/bash
if(sudo service apache2 start)then
	sudo chown -R www-data *
elif(sudo service httpd start)then
	sudo chown -R httpd *
fi

