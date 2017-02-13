<?php
require "../../includes/connection.php";
require "../../includes/config.php";
require "../../includes/sqlfunctions.php";
 
	if (isset($_SESSION['connection']) && !$_SESSION['connection']->timeout()) { //if you are connected
		$_SESSION['connection']->keepalive(); //refresh connection timeout
		$directorio = '../../../blog/uploads';
			echo '<h1 class="page-header">Categories</h1>';?>
				<form id="form" class="row" action="modules/files/uploadFile.php" method="post" enctype="multipart/form-data">
					<div class="form-group col-md-2">
						<input class="form-control btn btn-info" type="submit" id="Upload" name="Upload" value="Upload">
					</div>
					<div class="form-group col-md-4">
						<input type="file" id="File" name="File" placeholder="A file ...">
					</div>
				</form>
				<script src="modules/files/functions.js"></script>

			<?php
			//will show users info
			//first open table head and body putting as columns as you need
			echo '
			<div class="table-responsive">
				<table class="table table-striped table-hover">	
					<thead>
						<tr>
							<th>Name</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					';
					$arrayFiles  = scandir($directorio);
							foreach ($arrayFiles as $row){
								if (is_dir($directorio.'/'.$row) && $row!='.' && $row!='..'){
									$subfiles = scandir($directorio.'/'.$row);
									$subdirectorio = $row;
									foreach($subfiles as $row){
										if ($row!='.' && $row!='..'){ ?>
											<tr>
												<td class="fileName"><?php echo $subdirectorio."/".$row?></td>
												<td><a href="<?echo HOST.'/blog/uploads/'.$subdirectorio.'/'.$row;?>" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a></td>
												<td><a href="#" class="delete deleteFile" id="<?php echo $subdirectorio.'/'.$row?>"><span class="glyphicon glyphicon-trash"></span></a>
												</td>
											</tr> <?
										}
									}
								}
								else if ($row!='.' && $row!='..'){ ?>
									<tr>
										<td class="fileName"><?php echo $row?></td>
										<td><a href="<?echo HOST.'/blog/uploads/'.$row;?>" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a></td>
										<td><a href="#" class="delete deleteFile" id="<?php echo $row?>"><span class="glyphicon glyphicon-trash"></span></a>
										</td>
									</tr> <?
								}
							}
						echo '
					</tbody>
				</table>
			</div>';
	}
?>
<!--MODAL WINDOW FOR DELETE FILES -->
  <!-- Modal -->
<div class="modal fade" id="deleteFileModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<h3>¿Are you sure?</h3>
			</div>
			<div	class="modal-footer">
				<form>
					<button type="button" class="col-sm-offset-2 col-sm-4 btn btn-default" data-dismiss="modal">Cancel</button>
					<button class="btn btn-danger col-sm-4" type="button" id="Delete" name="Delete" data-dismiss="modal" value="Delete">Delete</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
