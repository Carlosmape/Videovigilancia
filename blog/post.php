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
					<!-- Open Graph metadata -->
          <meta property="og:title" content="<?echo TITLE?>|<?$row['TITLE']?>" />
          <meta property="og:site_name" content="<?echo TITLE?>" />
					<meta property="og:type" content="article" />
					<meta property="article:published_time" content="<?echo $row['DATE']?>" />
					<meta property="og:url" content="<?echo DOMAIN?>/blog.php?post=<?echo urlencode($row['TITLE'])?>" />
					<meta property="og:image" content="<?$row['IMAGEHEADER']?>" />
					<meta property="og:locale" content="<?echo LANGUAGE?>" />
					<!-- Blog Post Content Column -->
          <div class="container">
            <div class="col-md-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1 class="articleTitle"><? echo $row['TITLE'];?></h1>
                <?php
								if ($row['TYPE']!=0){?>
									<p class="articleDate"><span class="glyphicon glyphicon-time"></span><?echo $row['DATE']?></p>
								<?}?>
                <!-- Preview Image -->
                <img class="img-responsive articleImage" src="<?php echo $row['IMAGEHEADER']?>" alt="">

                <hr>

                <!-- Post Content -->
                <div class="articleContent"><?php echo $row['CONTENT']?></div>
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
