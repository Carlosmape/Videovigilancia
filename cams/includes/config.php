<?php
//this stuff is for configurate your site. ONLY WRITE ON WHITESPACES BELOW
define('TITLE','CAMS');
define('HOST','http://127.0.0.1');//
define('DBHOST','127.0.0.1');
define('DBUSER','root');
define('DBNAME','cams');
define('DBPASS','root');
define('FACEBOOK','');
define('LANGUAGE','EN');
define('DESCRIPTION','');
define('GANALYTICSID','');
//DONT EDIT THIS ONLY WRITE ON WHITESPACES ABOVE

date_default_timezone_set ("Europe/London");


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

session_start();//u can use $_SESSION
?>
  
