<?php
	require_once "cams/includes/sqlfunctions.php";
	if (isset($_GET['post'])){
		$database = new Sqlconnection;//connect to database in order to extract users info
		if (isset($database)){
			$article = $database->getArticleByTITLE($_GET['post']);
			if (!$article){
				echo "PAGE NOT FOUND";
			}else{
				while($row = mysqli_fetch_array($article)){
?>
            <!-- Blog Post Content Column -->
          <div class="container">
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1 class="articleTitle"><? echo $row['TITLE'];?></h1>
								<p class="articleDate"><span class="glyphicon glyphicon-time"></span><?php echo $row['DATE']?></p>

                <!-- Preview Image -->
                <img class="img-responsive articleImage" src="<?php echo $row['IMAGEHEADER']?>" alt="">

                <hr>

                <!-- Post Content -->
                <p><?php echo $row['CONTENT']?></p>
                <hr>

                <!-- Blog Comments -->
                <!-- Comments Form -->
                <div class="well">
									<div class="fb-comments" data-width="100%" data-href="<?echo FACEBOOK?>" data-numposts="5"></div>
                </div>

                <hr>
            </div>
<?			}//end while
			}
		}else{
			echo "Error CAMS could not connect to your DATABASE";
		}
		
	}else{
		echo "Ups!";
	}
?>
