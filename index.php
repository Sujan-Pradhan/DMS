<!DOCTYPE html>
<html>
<head>
	<title>DMS Home Page</title>
	<style type="text/css">
		.back {
			position: relative;
			background: url("img/hos.jpg");
			background-size: cover;
			width: 100%;
			min-height: 550px;
			overflow: hidden;
			opacity: 100%;
			background-color: #ddd;
		}
	</style>
</head>
<body class="back">
	<?php
include ("include/header.php");



  ?>

<div style="margin-top: 50px"></div>

<div class="container">
	<div class="col-md-12">
		<div class="row">
		<div class="col-md-3 mx-2 shadow">
			<img src="img/infom.jpg" class="img-thumbnail" style="width: 100%; height: 315px;">

			<h5 class="text-center">Click here for getting more information</h5>

			<a href="#">
				<button class="btn btn-success my-3" style="margin-left: 30%">More Info</button>
			</a>

		</div>
		<div class="col-md-4 mx-2 shadow">
			<img src="img/patient.jpg" class="img-thumbnail" style="width: 100%; height: 315px">

			<h5 class="text-center">Create Account so that we can take good care of you.</h5>

			<a href="account.php">
				<button class="btn btn-success my-3" style="margin-left: 30%">Create Account</button>
			</a>
			
		</div>
		<div class="col-md-4 mx-2 shadow">
			<img src="img/doctor.jpg" class="img-thumbnail" style="width: 100%; height: 315px">

			<h5 class="text-center">We are employing for doctor. Apply Now</h5>

			<a href="apply.php">
				<button class="btn btn-success my-3" style="margin-left: 30%">Apply Now</button>
			</a>
			
			</div>
		</div>
	</div>
</div>

</body>
</html>