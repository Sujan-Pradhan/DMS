<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Job Application</title>
	<style type="text/css">
		.back {
			position: relative;
			background: url("../img/hos.jpg");
			background-size: cover;
			width: 100%;
			min-height: 550px;
			overflow: hidden;
		}
	</style>
</head>
<body class="back">

	<?php

	include("../include/header.php");

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php
					include("sidenav.php");
					?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center">Job Application</h5>

					<div id="show"></div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			
			show();
			function show() {
				$.ajax({
					url:"ajax_job_application.php",
					method:"POST",
					success:function(data){
						$("#show").html(data);
					}
				});
			}

			$(document).on('click', '.approve',function() {
				
				var id = $(this).attr("id");



				$.ajax({
					url:"ajax_approve.php",
					method:"POST",
					data:{id:id},
					success:function(data){
						show();
					}
				})
			});

			$(document).on('click', '.reject',function() {
				
				var id = $(this).attr("id");



				$.ajax({
					url:"ajax_reject.php",
					method:"POST",
					data:{id:id},
					success:function(data){
						show();
					}
				})
			});
		});
	</script>

</body>
</html>