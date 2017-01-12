<?php 
	/*
	 * Buttons functions are linked on /cams/includes/functions.js
	 * If you want to add one button must keep examples in here
	 * */
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
            <a class="navbar-brand" href="">cAms</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<? echo HOST.'/cams';?>"></a></li>
              <li><a id="settings" href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-user"></span><? echo " ".$_SESSION['connection']->user?></a></li>
              <li><a href="<? echo HOST.'/cams/modules/logout.php';?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li class="active"><a href="/cams/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Overview</a></li>
              <li><a id="users" href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users</a></li>
              <li><a id="articles" href="#"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Articles</a></li>
              <li><a id="categories" href="#"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Categories</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header">Overview</h1>

            <div class="row placeholders">
              <div class="col-xs-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="Generic placeholder thumbnail" width="200" height="200">
                <h4>Label</h4>
                <span class="text-muted">Something else</span>
              </div>
              <div class="col-xs-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="Generic placeholder thumbnail" width="200" height="200">
                <h4>Label</h4>
                <span class="text-muted">Something else</span>
              </div>
              <div class="col-xs-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="Generic placeholder thumbnail" width="200" height="200">
                <h4>Label</h4>
                <span class="text-muted">Something else</span>
              </div>
              <div class="col-xs-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="Generic placeholder thumbnail" width="200" height="200">
                <h4>Label</h4>
                <span class="text-muted">Something else</span>
              </div>
            </div>

            <h2 class="sub-header">Section title</h2>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1,001</td>
                    <td>Lorem</td>
                    <td>ipsum</td>
                    <td>dolor</td>
                    <td>sit</td>
                  </tr>
                  <tr>
                    <td>1,002</td>
                    <td>amet</td>
                    <td>consectetur</td>
                    <td>adipiscing</td>
                    <td>elit</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <script src="includes/js/functions.js"></script>
