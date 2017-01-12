<?php
require_once "cams/includes/config.php";
require_once "cams/includes/sqlfunctions.php";

$database = new Sqlconnection;//connect to database in order to extract users info
if (isset($database)){
	$searching = false;
	if (isset($_GET['search'])){
		$articles = $database->getAllArticlesLike(strip_tags($_GET['search']));
		$searching = true;
	}else if(isset($_GET['p'])){//if looking for next page
		$articles = $database->getAllArticlesIndex(strip_tags($_GET['p']-1));
	}	else if (isset($_GET['category'])){
		$articles = $database->getArticlesByCategory(strip_tags($_GET['category']));
	}
	else{
		$articles = $database->getAllArticlesIndex();
	}
?>
	<!-- Page Content -->
	<div class="container">
	
		<!-- Blog Entries Column -->
		<div class="col-md-9">
			<?if ($searching){?>
				<div class="row">
					<h1 class="col-md-8"><span class="glyphicon glyphicon-search"></span> <?echo $_GET['search'];?></h1>
					<h1 class="col-md-4"><small><?echo " ".$articles->num_rows;?> results</small></h1>
				</div>
			<?} ?>
			<?//show all posts
			if ($articles)
			foreach ($articles as $row){?>
				<h2 class="articleTitle"><?php echo $row['TITLE']?></h2>
				<p class="articleDate"><span class="glyphicon glyphicon-time"></span><?php echo $row['DATE']?></p>
				<img  class="img-responsive articleImage" src="<?echo $row['IMAGEHEADER']?>" alt="">
				<p></p>
				<form action="/blog.php" method="get">
					<input type="hidden" name="post" value="<? echo $row['TITLE']?>">
					<button class="btn btn-primary articleReadMore rowID" id="rowID<?php echo $row['ID']?>" type="submit">
						Read<span class="glyphicon glyphicon-chevron-right"></span>
					</button>
				</form>
				<hr>
			<?php }?>
			<?if (!$searching){?>
				<!-- Pager -->
				<ul class="pager">
					
					<?if (isset($_GET['p'])){?>
						<li class="previous">
							<a href="/blog.php<?
								if ($_GET['p']>2)
								echo "?p=".($_GET['p']-1);?>"><span class="glyphicon glyphicon-chevron-left"></span>
							</a>
						</li>
					<?}?>
					<?if ($articles->num_rows==10){?>
						<li class="next">
							<a href="/blog.php?p=<?
								if (isset($_GET['p']))
									echo $_GET['p']+1;
								else
									echo 2;
							?>"><span class="glyphicon glyphicon-chevron-right"></span></a>
						</li>
					<?}?>
				</ul>
			<?}?>
		</div>
<?}?> 
