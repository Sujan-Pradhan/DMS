<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctors Dashboard</title>
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
					
					<div class="container-fluid">
						<h5 class="my-2">Doctor's Dashboard</h5>
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

										$patient = mysqli_query($conn, "SELECT * FROM patient");

										$num2 = mysqli_num_rows($patient);

										?>
											<h5 class="text-white my-2" style="font-size: 30px;"><?php echo $num2; ?></h5>
											<h5 class="text-white">Total</h5>
											<h5 class="text-white">Patient</h5>	
											</div>
											<div class="col-md-3">
												<a href="patient.php"><i class="fas fa-user-injured fa-3x my-4" style="color: white;"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 my-2 bg-warning mx-3" style="height: 130px">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-9">
												<?php
												$app = mysqli_query($conn, 'SELECT * FROM appointment');
												$appoint = mysqli_num_rows($app);
												?>
											<h5 class="text-white my-2" style="font-size: 30px;"><?php echo $appoint; ?></h5>	
											<h5 class="text-white">Total</h5>
											<h5 class="text-white">Appointment</h5>
											</div>
											<div class="col-md-3">
												<a href="appointment.php"><i class="far fa-calendar-check fa-3x my-4" style="color: white;"></i></a>
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