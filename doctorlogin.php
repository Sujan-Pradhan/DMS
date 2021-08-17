<?php

include("include/connection.php");

if(isset($_POST['login'])) {

	$uname = $_POST['uname'];
	$password = $_POST['pass'];

	$error = array();

	$q = "SELECT * FROM doctor WHERE username = '$uname' AND password = '$password'";

	$qq = mysqli_query($conn, $q);

	$row = mysqli_fetch_array($qq);

	if(empty($uname)) {
		$error['login'] = "Enter Username";
	} else if(empty($password)) {
		$error['login'] = "Enter Password";
	} else if($row['status'] == "pending") {
		$error['login'] = "Please wait till validate by Admin";
	} else if($row['status'] == "rejected") {
		$$error['login'] = "Try again later";
	}

	if(count($error)==0) {

		$query = "SELECT * FROM doctor WHERE username='$uname' AND password='$password'";
		$res = mysqli_query($conn, $query);

		if(mysqli_num_rows($res)) {
			echo "<script>alert('Valid')</script>";
			$_SESSION['doctor'] = $uname;
			//header("Location:")

		} else {
			echo "<script>alert('Not valid')</script>";
		}
	}
}

if(isset($error['login'])) {
	$l = $error['login'];

	$show = "<h4 class='text-center alert alert-danger'>$l</h4>";
} else {
	$show = "";
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor Login Page</title>
</head>
<body style="background-image: url(img/doc.jpg); background-size: cover; background-repeat: no-repeat;">

	<?php

	include("include/header.php");

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron my-5">
					<h4 class="text-center ">Doctor Login</h4>
					<div>
						<?php echo $show; ?>
					</div>

					<form method="post" style="ba">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off">
						</div>

						<input type="submit" name="login" class="btn btn-success" value="Login" >
						<p>I do not have an account <a href="apply.php">Apply Now</a></p>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

</body>
</html>