<?php 

session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Check Patient Appointment</title>
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
	 				<h4 class="text-center">Total Appointment</h4>

	 				<?php

	 				if(isset($_GET['id'])) {
	 					$id = $_GET['id'];

	 					$query = "SELECT * FROM appointment WHERE id='$id'";
	 					$res = mysqli_query($conn, $query);

	 					$row = mysqli_fetch_array($res);
	 				}

	 				?>

	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-6">
	 							<table class="table table-bordered" align="center">
										<tr>
											<th colspan="2" class="text-center">Appointment Details</th>
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
											<td>Gender</td>
											<td><?php echo $row['gender']; ?></td>
										</tr>
										<tr>
											<td>Phone</td>
											<td><?php echo $row['phone']; ?></td>
										</tr>
										
										
										<tr>
											<td>Appointment Date</td>
											<td><?php echo $row['appointment_date']; ?></td>
										</tr>
										<tr>
											<td>Symptoms</td>
											<td><?php echo $row['symptoms']; ?></td>
										</tr>

									</table>
	 						</div>
	 						<div class="col-md-6"></div>
	 					</div>
	 				</div>
	 					<div class="col-md-4">
	 						
	 					</div>
	 				</div>

	 			</div>
	 		</div>
	 	</div>
	 </div>

</body>
</html>