<?php

include("include/connection.php");

if(isset($_POST['create'])) {
	$firstname = $_POST['fname'];
	$surname = $_POST['sname'];
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$country = $_POST['country'];
	$password = $_POST['pass'];
	$confirm_password = $_POST['con_pass'];

	$error = array();

	if(empty($firstname)) {
		$error['create'] = "Enter Firstname";
	} else if(empty($surname)) {
		$error['create'] = "Enter Surname";
	} else if(empty($username)) {
		$error['create'] = "Enter Username";
	} else if(empty($email)) {
		$error['create'] = "Enter Email Address";
	} else if(empty($phone)) {
		$error['create'] = "Enter Phone Number";
	} else if($gender == "") {
		$error['create'] = "Select Gender";
	} else if($country == "") {
		$error['create'] = "Select Country";
	} else if(empty($password)) {
		$error['create'] = "Enter Password";
	} else if($confirm_password != $password) {
		$error['create'] = "Password does not match";
	}

	if(count($error) == 0) {

		$query = "INSERT INTO patient(firstname,surname, username,email,phone,gender, country,password,date_reg, profile) VALUES('$firstname','$surname','$username','$email','$phone','$gender','$country','$password',NOW(),'patient.jpg')";

		$result = mysqli_query($conn, $query);

		if($result) {

			echo "<script>alert('You have successfully Created an Account')</script>";

			header("Location: patientlogin.php");

		} else {

			echo "<script>alert('Failed to Create Account')</script>";

		}

	}

}


if(isset($error['create'])) {
	$s = $error['create'];

	$show = "<h4 class='text-center alert alert-danger'>$s</h4>";
} else {
	$show = "";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
</head>
<body style="background-image: url(img/bg.png);background-size: cover; background-repeat: no-repeat;">

	<?php
	include("include/header.php");
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron my-3">
					<h4 class="text-center text-info my-2">Create Account</h4>
					<div>
						<?php echo $show; ?>
					</div>
					<form method="post">
						<div class="form-group">
							<label>FirstName</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
						</div>
						<div class="form-group">
							<label>SurName</label>
							<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname">
						</div>
						<div class="form-group">
							<label>UserName</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email">
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number">
						</div>
						<div class="form-group">
							<label>Gender</label>
							<select name="gender" class="form-control">
								<option value="">Select Your Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label>Country</label>
							<select name="country" class="form-control">
								<option value="">Select Your Country</option>
								<option value="Nepal">Nepal</option>
								<option value="India">India</option>
								<option value="China">China</option>
							</select>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" placeholder="Enter Password">
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control" placeholder="Enter Confirm Password">
						</div>
						<input type="submit" name="create" value="Create Account" class="btn btn-info my-3" >
						<p>I already have an account <a href="patientlogin.php">Click Here</a></p>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

</body>
</html>