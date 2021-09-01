<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
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

				<h4 class="my-2">Admin Dashboard</h4>
				
				<div class="col-md-12 my-1">
					<div class="row">
						<div class="row">
								<div class="col-md-3 bg-primary mx-2" style="height: 130px">
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
								<div class="col-md-3 bg-success mx-2" style="height: 130px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-9">
										<?php
										$ad = mysqli_query($conn,"SELECT * FROM admin");

										$num = mysqli_num_rows($ad);


										?>
										<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
										<h5 class="text-white">Total</h5>
										<h5 class="text-white">Admin</h5>
									</div>
									<div class="col-md-3">
										<a href="admin.php"><i class="fas fa-user-lock fa-3x my-4" style="color: white;"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 bg-info mx-2" style="height: 130px;">
								<div class="col-md-12">
								<div class="row">
									<div class="col-md-9">

										<?php

										$doctor = mysqli_query($conn, "SELECT * FROM doctor WHERE status='Approved'");

										$num2 = mysqli_num_rows($doctor);

										?>

										<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2; ?></h5>
										<h5 class="text-white">Total</h5>
										<h5 class="text-white">Doctor</h5>
									</div>
									<div class="col-md-3">
										<a href="doctor.php"><i class="fas fa-user-md fa-3x my-4" style="color: white;"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-md-3 mx-2" style="height: 130px;"></div> -->
						<div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
								<div class="col-md-12">
								<div class="row">
									<div class="col-md-9">
										<?php

										$patient = mysqli_query($conn, "SELECT * FROM patient");

										$num3 = mysqli_num_rows($patient);

										?>

										<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num3; ?></h5>
										<h5 class="text-white">Total</h5>
										<h5 class="text-white">Patient</h5>
									</div>
									<div class="col-md-3">
										<a href="patient.php"><i class="fas fa-procedures fa-3x my-4" style="color: white;"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-9">

										<?php

										$job = mysqli_query($conn, "SELECT* FROM doctor WHERE status = 'pending'");
										$num1 = mysqli_num_rows($job);


										?>

										<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num1;  ?></h5>
										<h5 class="text-white">Total</h5>
										<h5 class="text-white">Job Application</h5>
									</div>
									<div class="col-md-3">
										<a href="job_application.php"><i class="fas fa-book-open fa-3x my-4" style="color: white;"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

</body>
</html>