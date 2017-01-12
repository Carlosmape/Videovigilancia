<?php
	require "blog/header.php";
	if (isset($_GET['post'])){
		require "blog/post.php";
	}else{
		require "blog/blog.php";
	}
	
	require "blog/sidebar.php";
	require "blog/footer.php";
?>
