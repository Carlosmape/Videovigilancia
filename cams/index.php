<?php
require_once "includes/connection.php";
require_once "includes/config.php";
require_once "includes/header.php";
require_once "includes/sqlfunctions.php"; 

if (isset($_SESSION['connection']) && !$_SESSION['connection']->timeout()) { //you are connected
	$_SESSION['connection']->keepalive();
  require "modules/dashboard.php";
}
else {  //you are trying to connect
  if (isset($_POST['inputUser']) && isset($_POST['inputPassword'])) {
		$database = new Sqlconnection;
    if ($database->checkLogin(strip_tags($_POST['inputUser']), md5(strip_tags($_POST['inputPassword'])))) {
      $_SESSION['connection'] = new Connection($_POST['inputUser'],1);
      require "modules/dashboard.php";
      //echo "logged in";
    }
    else {
			echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Wrong user or password.
</div>';
      require "modules/login.html";
    }
  }
  else { //show login page
    require "modules/login.html";
  }
}

require ("includes/footer.php");
?>
