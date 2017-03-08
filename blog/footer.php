<?php 
	require_once "cams/includes/config.php";
?>
        <!-- Footer -->
        <footer>
					<div class="col-lg-10">
						<p>Copyright <?php echo date('Y')?> &copy; <?echo TITLE?></p>
					</div>
					<!-- /.col-lg-12 -->
					<div class="col-lg-2">
						<small>Made simple CAMS</small>
					</div>
        </footer>

    </div>
    <!-- /.container -->
    <!-- jQuery -->
		<script src="cams/includes/js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="cams/includes/js/bootstrap.js"></script>
		
		<script src="blog/js/functions.js"></script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', '<?php echo GANALYTICSID?>', 'auto');
			ga('send', 'pageview');

		</script>

</body>

</html>
