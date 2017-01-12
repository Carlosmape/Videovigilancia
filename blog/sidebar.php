<?php 
	require_once "cams/includes/config.php";
?>
 <!-- Blog Sidebar Widgets Column -->
			<div class="col-md-4 sidebar">

					<!-- Blog Search Well -->
					<div class="well">
						<h4>Search</h4>
						<form action="" method="get">
							<div class="input-group">
									<input type="text" name="search" class="form-control">
									<span class="input-group-btn">
											<button class="btn btn-default" type="submit">
													<span class="glyphicon glyphicon-search"></span>
									</button>
									</span>
							</div>
						</form>
						<!-- /.input-group -->
					</div>

					<!-- Blog Categories Well -->
					<div class="well">
							<h4>Categories</h4>
							<div class="row">
									<div class="col-lg-6">
											<ul class="list-unstyled">
											<?
											$database = new Sqlconnection;//connect to database in order to extract users info
											if (isset($database)){
												$categories = $database->getAllCategories();
												foreach ($categories as $cat){
													echo "
													<li><a href='#".$cat['ID']."'>".$cat['TITLE']."</a>
													</li>";
												}
											}?>
											</ul>
									</div>
							</div>
							<!-- /.row -->
					</div>

					<!-- Side Widget Well -->
					<div class="well">
							<div class="fb-page" data-href="<?echo FACEBOOK?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
								<blockquote cite="<?echo FACEBOOK?>" class="fb-xfbml-parse-ignore"><a href="<?echo FACEBOOK?>"></a></blockquote>
								</div>
					</div>

			</div>

	</div>
	<!-- /.row -->

	<hr>
