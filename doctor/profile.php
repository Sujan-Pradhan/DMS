<?php
session_start();

// error_reporting(0);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Profile</title>
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

	include("../include/connection.php");
	$doc = $_SESSION['doctor'];

	$query = "SELECT * FROM doctor WHERE username='$doc' ";

	$res = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($res)) {
		$username = $row['username'];
		$profile = $row['profile'];
	}


	?>

	<div class="conrainer-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px">
					<?php

					include("sidenav.php");
					?>
				</div>
				<div class="col-md-10">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<h4><?php echo $username; ?> profile</h4>
								<?php
								$doc = $_SESSION['doctor'];
								$query = "select *from doctor where username='$doc'";

								$res= mysqli_query($conn,$query);
								$row = mysqli_fetch_array($res);
								
								if(isset($_POST['upload'])) {
									$img = $_FILES['img']['name'];

									if(empty($img)) {

									}else {
										$query = "update doctor set profile='$img' where username='$doc'";

										$res = mysqli_query($conn, $query);
										if($res) {
											move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
										}
									}
								}
								?>

								<form method="post" enctype="multipart/form-data">
									<?php
									echo "<img src='img/".$row['profile']."' style='height: 
									250px;' class='col-md-12 my-3'>"
									?>
									<input type="file" name="img" class="form-control">
									<input type="submit" name="upload" value="Update Profile" class="btn btn-success">
								</form>
								<div class="my-3">
									<table class="table table-bordered">
										<tr>
											<th colspan="2" class="text-center">Details</th>
										</tr>
										<tr>
											<td>Firstname</td>
											<td><?php echo $row['firstname']; ?></td>
										</tr>
										<tr>
											<td>Surname</td>
											<td><?php echo $row['surname']; ?></td>
										</tr>
										<tr>
											<td>Username</td>
											<td><?php echo $row['username']; ?></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><?php echo $row['email']; ?></td>
										</tr>
										<tr>
											<td>Phone</td>
											<td><?php echo $row['phone']; ?></td>
										</tr>
										<tr>
											<td>Gender</td>
											<td><?php echo $row['gender']; ?></td>
										</tr>
										<tr>
											<td>Country</td>
											<td><?php echo $row['country']; ?></td>
										</tr>
										<tr>
											<td>Salary</td>
											<td><?php echo "Rs". $row['salary'].""; ?></td>
										</tr>

									</table>
								</div>
							</div>
							<div class="col-md-6">
								<h5 class="text-center"> Update Username</h5>
								<?php
								if(isset($_POST['change'])) {
									$uname = $_POST['uname'];
									if(empty($uname)) {

									} else {
										$query = "update doctor set username='$uname' where username='$doc'";

										$res = mysqli_query($conn,$query);
										if($res) {
											$_SESSION['doctor'] = $uname;
										}
									}
								}

								?>
								<form method="post">
									<label>Change Username</label>
									<input type="text" name="uname" class="form-control" autocomplete="off"><br>
									<input type="submit" name="change" class="btn btn-success" value="Change">
								</form>
								<br><br>

								<h5 class="text-center my-2">Change Password</h5>
								<!-- <?php
								if(isset($_POST['update_pass'])) {
									$old = $_POST['old_pass'];
									$new = $_POST['new_pass'];
									$con = $_POST['con_pass'];

									$ol = "select * from doctor where username='$doc'";
									$ols = mysqli_query($conn, $ol);
									$row = mysqli_fetch_array($ols);
									if($old!=$row['password']) {

									} else if(empty($new)) {

									} else if($con!=$new) {

									}
									 else {
										$query = "update doctor set password='$new' where username='$doc'";

										mysqli_query($conn,$query);
									}
								}

								?> -->
								<?php

								if(isset($_POST['update_pass'])) {

									$old = $_POST['old_pass'];
									$new = $_POST['new_pass'];
									$con = $_POST['con_pass'];

									$error = array();

									$ol = mysqli_query($conn, "SELECT * FROM doctor WHERE username='$doc'");

									$row = mysqli_fetch_array($ol);
									$pass = $row['password'];

									if(empty($old)) {
										$error['p'] = "Error old password";
									} else if(empty($new)) {
										$error['p'] = "Enter new password";
									} else if(empty($con)) {
										$error['p'] = "Enter confirm password";
									} else if($old != $pass) {
										$error['p'] = "Invalid Old Password";
									} else if($new != $con) {
										$error['p'] = "Password not matched";
									}
									


										if(count($error)==0) {
											$query = "UPDATE doctor SET password='$new' WHERE username='$doc'";

											mysqli_query($conn, $query);
										}

									}


								if(isset($error['p'])) {
											$e = $error['p'];

											 $show = "<h4 class='text-center alert alert-danger'>$e</h4>";
										} else {
											$show = " ";
										}

								?>
								<form method="post">
									<div>
										
										<?php

										echo $show;

										?>
									</div>
									<div class="form-group">
										<label>Old Password</label>
										<input type="password" name="old_pass" class="form-control">
									</div>

									<div class="form-group">
										<label>New Password</label>
										<input type="password" name="new_pass" class="form-control">
									</div>

									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="con_pass" class="form-control">
									</div>

									<input type="submit" name="update_pass" value="Update Password" class="btn btn-info">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>