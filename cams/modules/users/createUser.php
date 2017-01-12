<?php
	require "../../includes/connection.php";
	require "../../includes/config.php";
	require "../../includes/sqlfunctions.php";
	if (isset($_SESSION['connection']) && !$_SESSION['connection']->timeout()) { //if you are connected
		$_SESSION['connection']->keepalive(); //refresh connection timeout
		$database = new Sqlconnection;//connect to database in order to extract users info
		if (isset($database)){
			if($database->addUser(strip_tags($_POST['Name']), md5(strip_tags($_POST['Password'])))){
				echo "User added!";
			}
			else{
				echo "Cant create user";
			}
		}else{
		  echo "Error CAMS could not connect to your DATABASE";
		}
		
	}
 ?>
