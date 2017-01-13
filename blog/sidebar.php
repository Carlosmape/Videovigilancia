<?php 
	require_once "cams/includes/config.php";
?>
 <!-- Blog Sidebar Widgets Column -->
			<div class="col-md-3 sidebar">

					<!-- Blog Categories Well -->
					<div class="well">
							<h4>Categories</h4>
							<div class="row">
									<div class="col-lg-6">
											<ul class="list-unstyled blogCategoryParent">
											<?
											$database = new Sqlconnection;//connect to database in order to extract users info
											if (isset($database)){
												$parentscategories = $database->getParentCategories();
												$childcategories = $database->getChildCategories();
												foreach ($parentscategories as $patcat){
													echo "<li><a href='/blog.php?category=".$patcat['TITLE']."'>".$patcat['TITLE']."</a></li>";
													echo "<ul class='list-unstyled blogCategoryChild'>";
													foreach ($childcategories as $chicat){
														if($patcat['ID'] == $chicat['PARENTID']){
															echo "<li><a href='/blog.php?category=".$chicat['TITLE']."'>".$chicat['TITLE']."</a></li>";
														}
													}
													echo "</ul>";
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
