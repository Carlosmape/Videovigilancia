<?php 
	/*
	 * Buttons functions are linked on /cams/includes/functions.js
	 * If you want to add one button must keep examples in here
	 * */
	 require_once "includes/connection.php";
	 require_once "includes/sqlfunctions.php";
	 
if (isset($_SESSION['connection']) && !$_SESSION['connection']->timeout()) { //you are connected
	$_SESSION['connection']->keepalive();
?>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">CAMS panel</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo HOST.'/cams';?>"></a></li>
              <?php if ($_SESSION['connection']->isAdmin()) { ?> 
								<li><a id="settings" href="#settings"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
							<?php } ?>
              <li><a id="profile" href="#profile"><span class="glyphicon glyphicon-user"></span><?php echo " ".$_SESSION['connection']->user; if($_SESSION['connection']->isAdmin()) echo " (Admin)";?></a></li>
              <li><a href="<?php echo HOST.'/cams/modules/logout.php';?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li class="active"><a href="/cams/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Overview</a></li>
              <?php if ($_SESSION['connection']->isAdmin()) { ?> 
								<li><a id="users" href="#users"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users</a></li>
							<?php } ?>
              <li><a id="articles" href="#articles"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Articles</a></li>
              <li><a id="categories" href="#categories"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Categories</a></li>
              <li><a id="files" href="#files"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Files</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header">Live 
							<a href="" id="liveControlOn" class="btn btn-lg btn-info" data-src="<?php echo HOST;?>"> <span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span></a>
							<a href="" id="liveControlOff" class="btn btn-lg btn-danger" data-src="<?php echo HOST;?>"> <span class="glyphicon glyphicon-stop" aria-hidden="true"></span></a>
						</h1>
            <div class="row liveview">
							<div class="col-md-6">
								<div class="thumbnail col-md-12">
									<img class="col-md-8" src="<?php echo HOST;?>:8081" onerror="if (this.src != '../../blog/uploads/motion_not_running.png') this.src = '../../blog/uploads/motion_not_running.png';"></img>
									<iframe class="col-md-4" src="<?php echo HOST;?>:8080/1/detection/status"></iframe>
								</div>
							</div>
							<div class="col-md-6">
								<div class="thumbnail col-md-12">
									<img class="col-md-8" src="<?php echo HOST;?>:8082" onerror="if (this.src != '../../blog/uploads/motion_not_running.png') this.src = '../../blog/uploads/motion_not_running.png';"></img>
									<iframe class="col-md-4" src="<?php echo HOST;?>:8080/2/detection/status"></iframe>
								</div>
							</div>
            </div>
            <h1 class="page-header">Blog</h1>
            <?php
							$database = new Sqlconnection();
							if (isset($database))
							{
								?>
								<div class="row placeholders">
									<div class="col-xs-3 col-sm-3 placeholder">
										<h4> <span class="glyphicon glyphicon-user"></span> Users - <span class="text-muted"><?php echo mysqli_fetch_array($database->countUsers())['COUNT(*)']?></span></h4>
									</div>
									<div class="col-xs-3 col-sm-3 placeholder">
										<h4> <span class="glyphicon glyphicon-list-alt"></span> Articles - <span class="text-muted"><?php echo mysqli_fetch_array($database->countArticles())['COUNT(*)']?></span></h4>
									</div>
									<div class="col-xs-3 col-sm-3 placeholder">
											<h4> <span class="glyphicon glyphicon-list"></span> Categories - <span class="text-muted"><?php echo mysqli_fetch_array($database->countCategories())['COUNT(*)']?></span></h4>
									</div>
									<div class="col-xs-3 col-sm-3 placeholder">
											<h4> <span class="glyphicon glyphicon-hdd"></span> Disk space - <span class="text-muted"><?php 
												$bytes = disk_free_space("../../");
												$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
												$base = 1024;
												$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
												echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
											?></span></h4>
									</div>
								</div>
								
								<div class="col-md-6 col-xs-12">
									<h1>Blog menu</h1>
									<div class="btn-group" role="group" aria-label="...">
										
										<?php 
										$menu = $database->getMenuPages();
										foreach($menu as $pages){
											echo "<a target='_blank' href='/blog.php?post=".$pages['TITLE']."' type='button' class='btn btn-default'>".$pages['TITLE']."</a>";
										}
										?>
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									<h1>Hidden pages</h1>
									<div class="btn-group" role="group" aria-label="...">
										
										<?php 
										$menu = $database->getHiddenPages();
										foreach($menu as $pages){
											echo "<a target='_blank' href='/blog.php?post=".$pages['TITLE']."' type='button' class='btn btn-default'>".$pages['TITLE']."</a>";
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					 <?php
							}else{
								echo "Error CAMS could not connect to your DATABASE";
							}
					?>
<?php
	}
?>
						
