<?php 
//CAMS BY Camape
//INSTALLATION SCRIPT.
//FIRST OF ALL SAVE CONFIG.PHP TO SAVE YOUR SITE CONFIG
if (isset($_POST)){
	$filename="../cams/includes/config.php";;
	$file = fopen($filename, "r+");
	if (!$file) {
		echo('Cant open cams/includes/config.php to read');
	}
	else {
		$settings = "";
		while(! feof($file))
		{
			$settings .= fgets($file);
		}
		//Output a line of the file until the end is reached
		$searchF  = array( //WILL SEARCH THAT PATTERNS IN CONFIG.PHP IN ORDER TO EDIT
			"/TITLE','.*'/",
			"/HOST','.*'/",
			"/DBHOST','.*'/",
			"/DBUSER','.*'/",
			"/DBNAME','.*'/",
			"/DBPASS','.*'/",
			"/FACEBOOK','.*'/",
			"/LANGUAGE','.*'/",
			"/GANALYTICSID','.*'/",
			"/DESCRIPTION','.*'/"
		);
		$replaceW = array(
		"TITLE','".$_POST['Title']."'",
		"HOST','".$_POST['Domain']."'",
		"DBHOST','".$_POST['Host']."'",
		"DBUSER','".$_POST['User']."'",
		"DBNAME','".$_POST['Databasename']."'", 
		"DBPASS','".$_POST['Password']."'",
		"FACEBOOK','".$_POST['Facebook']."'",
		"LANGUAGE','".$_POST['Language']."'",
		"GANALYTICSID','".$_POST['Ganalyticsid']."'",
		"DESCRIPTION','".$_POST['Description']."'");
		
		$settings = preg_replace($searchF, $replaceW, $settings);

		//ftruncate($file ,0); //truncate the file to size 0 before saving anything
		
		//var_dump(file_put_contents($filename,$settings));
		//var_dump($settings);
		fclose($file);
		$file = fopen($filename, "w");
		if (!$file) {
			echo('Cant open cams/includes/config.php to save it');
		}else{
			if(fwrite($file, $settings))
				echo 'Config saved on cams/includes/config.php';
		}
		fclose($file);
		//now you will redirect to /cams/
	}
}
//
//SECOND PIT 
//CREATE TABLES TO ADMINISTRATE CAMS
//

require_once "cams/includes/sqlfunctions.php";
$database = new Sqlconnection;//connect to database in order to create some tables and users
if (isset($database)){
	if($database->connection->mysqli_query(
		"CREATE TABLE `USERS`(
		`ID` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`USER` VARCHAR(32),
		`MAIL` VARCHAR(32),
		`PASSWORD` VARCHAR(64),
		`TYPE` INT(11),
		UNIQUE (`USER`,`MAIL`),
		CHECK (TYPE BETWEEN 0 AND 1));") 
	&& $database->connection->mysqli_query(
		"CREATE TABLE `CATEGORIES`(
		`ID` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`PARENTID` INT(11),
		`TITLE` VARCHAR(32) UNIQUE);") 
	&& $database->connection->mysqli_query(
		"CREATE TABLE `ARTICLES`(
		`ID` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`TITLE` VARCHAR(96) UNIQUE,
		`TYPE` INT(11),
		`CATEGORIES` INT(11),
		`DATE` DATE,
		`CONTENT`	TEXT,
		`IMAGEHEADER` TEXT,
		CHECK (TYPE BETWEEN 0 AND 2));"))
	{
		echo "Tables created.";
		if ($database->connection->mysqli_query(
			"INSERT INTO `USERS` (`ID`,`USER`,`MAIL`,`PASSWORD`, `TYPE`)
			VALUES ('','Admin','example@mail.com','e3afed0047b08059d0fada10f400c1e5','0');"))
		{
			echo "Good! your site has been setting up";
		}

	}else{
		throw new Exception("Error CAMS: Could not create necesary tables",1);
	}

	
}else{
}

?>
