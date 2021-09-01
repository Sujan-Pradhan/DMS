 <?php

session_start();
include("include/connection.php");

if(isset($_POST['login'])) {

	$uname = $_POST['uname'];
	$password = $_POST['pass'];

	if(empty($uname)) {
		echo "<script>alert('Enter Username')</script>";
	} else if(empty($password)) {
		echo "<script>alert('Enter Password')</script>";
	} else {
		$q = "SELECT * FROM patient WHERE username = '$uname' AND password = '$password'";

	$qq = mysqli_query($conn, $q);
	if(mysqli_num_rows($qq)==1) {
		header("Location: patient/index.php");
		$_SESSION['patient'] = $uname;
	} else {
		echo "<script>alert('Invalid Account')</scipt>";
	}
	}
}
?>
	


<!DOCTYPE html>
<html>
<head>
	<title>Patient Login</title>
</head>
<body style="background-image: url(img/bg.png); background-repeat: no-repeat; background-size: cover;" >

	<?php
	include("include/header.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron my-4">
					<h4 class="text-center my-3">Patient Login</h4>
					<form method="post">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control">
						</div>
						<input type="submit" name="login" class="btn btn-info my-3" value="Login">
						<p>I donot have an account <a href="account.php">Click Here</a></p>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</body>
</html>
