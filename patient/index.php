<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient Dashoard</title>
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
	include("../include/connection.php")

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
					
					<div class="container-fluid">
						<h5 class="my-2">Patient's Dashboard</h5>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3 my-2 bg-info mx-3" style="height: 130px">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-9">
											<h5 class="text-white my-4">My Profile</h5>	
											</div>
											<div class="col-md-3">
												<a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 my-2 bg-success mx-3" style="height: 130px">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-9">
												<?php
											$ad = mysqli_query($conn,"SELECT * FROM appointment");

											$num = mysqli_num_rows($ad);


											?>
											<h5 class="text-white my-2" style="font-size: 30px;"><?php echo $num;?></h5>
											<h5 class="text-white">Book</h5>
											<h5 class="text-white">Appointment</h5>	
											</div>
											<div class="col-md-3">
												<a href="appointment.php"><i class="far fa-calendar-check fa-3x my-4" style="color: white;"></i></a>
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="col-md-3 my-2 bg-warning mx-3" style="height: 130px">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-9">
											<h5 class="text-white my-2" style="font-size: 30px;">0</h5>	
											<h5 class="text-white">Total</h5>
											<h5 class="text-white">Invoice</h5>
											</div>
											<div class="col-md-3">
												<a href="#"><i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i></a>
											</div>
										</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
					<?php

					if(isset($_POST['send'])) {
						$title = $_POST['send'];
						$message = $_POST['send'];

						if(empty($title)) {

						}else if(empty($message)) {

						} else {
							$user = $_SESSION['patient'];
							$query = "INSERT INTO report(title,message,username,date_send)VALUES('$title','message','$user',NOW())";

							$res = mysqli_query($conn,$query);
							if($res) {
								echo "<script>alert('You have sent your report')</script>";
							}
						}
					}

					?>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6 jumbotron bg-info my-5">
								<h4 class="text-center my-2">Send A Report</h4>
								<form method="post">
									<label>Title</label>
									<input type="text" name="title" autocomplete="off" class="
									form-control" placeholder="Enter title of report">

									<label>Message</label>
									<input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message">

									<input type="submit" name="send" value="Send Report" class="btn btn-success my-2">
								</form>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</body>
</html>