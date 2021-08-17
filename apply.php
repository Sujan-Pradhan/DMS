<?php

include("include/connection.php");

if(isset($_POST['apply'])) {
	$firstname = $_POST['fname'];
	$surname = $_POST['sname'];
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$country = $_POST['country'];
	$password = $_POST['pass'];
	$confirm_password = $_POST['c_pass'];

	$error = array();

	if(empty($firstname)) {
		$error['apply'] = "Enter Firstname";
	} else if(empty($surname)) {
		$error['apply'] = "Enter Surname";
	} else if(empty($username)) {
		$error['apply'] = "Enter Username";
	} else if(empty($email)) {
		$error['apply'] = "Enter Email Address";
	} else if(empty($phone)) {
		$error['apply'] = "Enter Phone Number";
	} else if($gender == "") {
		$error['apply'] = "Select Gender";
	} else if($country == "") {
		$error['apply'] = "Select Country";
	} else if(empty($password)) {
		$error['apply'] = "Enter Password";
	} else if($confirm_password != $password) {
		$error['apply'] = "Password does not match";
	}



	if(count($error) == 0) {

		$query = "INSERT INTO doctor(firstname,surname, username,email,phone,gender, country,password, salary,data_reg,status, profile) VALUES('$firstname','$surname','$username','$email','$phone','$gender','$country','$password','0',NOW(),'pending','doctor.jpg')";

		$result = mysqli_query($conn, $query);

		if($result) {

			echo "<script>alert('You have successfully Applied')</script>";

			header("Location: doctorlogin.php");

		} else {

			echo "<script>alert('Failed to Apply')</script>";

		}

	}

}


if(isset($error['apply'])) {
	$s = $error['apply'];

	$show = "<h4 class='text-center alert alert-danger'>$s</h4>";
} else {
	$show = "";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Apply Now</title>
</head>
<body style="background-image: url(img/doc.jpg); background-size: cover;background-repeat: no-repeat;">

	<?php

	include("include/header.php");

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron my-2">
					<h4 class="text-center">Apply Now</h4>
					<div>
						<?php echo $show; ?>
					</div>

					<form method="post">
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
						</div>

						<div class="form-group">
							<label>SurName</label>
							<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
						</div>

						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
						</div>

						<div class="form-group">
							<label>Phone Number</label>
							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
						</div>

						<div class="form-group">
							<label>Select Gender</label>
							<select name="gender" class="form-control">
								<option value="">Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>

						<div class="form-group">
							<label>Select Country</label>
							<select name="country" class="form-control">
								<option value="">Select Country</option>
								<option value="Nepal">Nepal</option>
								<option value="America">America</option>
								<option value="India">India</option>
							</select>
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" placeholder="Enter Password" autocomplete="off">
						</div>

						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="c_pass" class="form-control" placeholder="Enter Confirm Password" autocomplete="off">
						</div>

						<input type="submit" name="apply" value="Apply Now" class="btn btn-success">
						<p>I already have an account <a href="doctorlogin.php">Click here</a></p>

					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

</body>
</html>