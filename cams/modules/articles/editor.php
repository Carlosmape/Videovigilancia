<?php
require "../../includes/connection.php";
require "../../includes/config.php";
require "../../includes/sqlfunctions.php";
	
	if (isset($_SESSION['connection']) && !$_SESSION['connection']->timeout()) { //if you are connected
		$_SESSION['connection']->keepalive(); //refresh connection timeout
		$database = new Sqlconnection;//connect to database in order to extract users info
		
		if (isset($database)){ 
			//NOW WE CHECK IF THERE IS A ID, IF IT IS, WE EDIT THAT ARTICLE
			$id="";
			$title="";
			$type="";
			$category="";
			$date=date("Y-m-d");
			$text="";
			$parentscategories = $database->getParentCategories();
			$childcategories = $database->getChildCategories();
			if(isset($_POST['ID'])){
				$id=$_POST['ID'];
				$result = $database->getArticle($id);
				$row =mysqli_fetch_array($result);	
				$title=$row['TITLE'];
				$type=$row['TYPE'];
				$category=$row['CATEGORIES'];
				$date=$row['DATE'];
				$text=$row['CONTENT'];
				$image=$row['IMAGEHEADER'];
			}
			
			?>
			<div class="row"></div>
			<form action="" id="article">
				<input type="text" name="articleID" value="<? echo $id;?>" hidden>
				<div class="form-group col-md-6">
					<label class="control-label col-md-2" for="articleTitle">Title</label>
					<input class="col-md-6"type="text" id="articleTitle" name="articleTitle" value="<?php echo $title?>" placeholder="A title for your article...">
					<div class="row"></div>
					<label class="control-label col-md-2" for="articleType">Type</label>
					<select class="col-md-6" type="number" id="articleType" name="articleType">
						<option value="0" <?
							if ($type==0)
								echo "selected";
						?>>Static page (Menu)</option>
						<option value="1" <?
							if ($type==1)
								echo "selected";
						?>>Blog article</option>
						<option value="1" <?
							if ($type==2)
								echo "selected";
						?>>Static page (Menu hidden)</option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="control-label col-md-2" for="articleCategory">Category</label>
					<select class="col-md-6" type="number" id="articleCategory" name="articleCategory" placeholder="A category...">
						<option value="0">-</option>
						<? 
						foreach ($parentscategories as $patcat){
							?>
								<option value='<?echo $patcat['ID']?>' <?
									if ($category==$patcat['ID'])
										echo "selected";
							?>><?echo $patcat['TITLE']?></option>
							<?
							foreach ($childcategories as $chicat){
								if($patcat['ID'] == $chicat['PARENTID']){
								?>
									<option value='<?echo $chicat['ID']?>' <?
										if ($category==$chicat['ID'])
											echo "selected";
								?>><?echo $chicat['TITLE']?></option> 
							<?
								}
							}
						}
						?>
					</select>
					<div class="row"></div>
					<label class="control-label col-md-2" for="articleDate">Date</label>
					<input class="col-md-6" type='date' id='datetimepicker4' name="articleDate" value="<? echo $date?>">
				</div>
				<div class="form-group col-md-12">
					<label class="control-label col-md-2" for="">Header image</label>
					<input id="articleImage" type="text" name="articleImage" placeholder="Path to a image..." value=<?echo $image?>>
				</div>
				<div class="form-group col-md-12">
					<textarea id="editor1"><?php echo $text?></textarea>

					<script>
						CKEDITOR.replace( 'editor1', {
							height: 600
						} );
					</script>
				</div>
				<div class="form-group">
					<input class="btn btn-info form-control" type="button" id="articleSave" name="articleSave" value="Save">
				</div>
			</form>
		<?php
		}
	}
?>
<script src="modules/articles/functionsArticles.js"></script>
