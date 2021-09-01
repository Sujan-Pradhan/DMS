<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Total Appointment</title>
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
					<h4 class="text-center my-2">Total Appointment</h4>
					<?php

					$query = "SELECT * FROM appointment WHERE status='pending'";
					$res = mysqli_query($conn, $query);

					$output= "";

					$output .="
	<table class ='table table-bordered'>
	<tr>
		<th>ID</th>
		<th>Firstname</th>
		<th>Surname</th>
		<th>Gender</th>
		<th>Phone</th>
		<th>Appointment Date</th>
		<th>Symtoms</th>
		<th>Booked Date</th>
		<th>Action</th>
	</tr>

";

if(mysqli_num_rows($res) < 1) {

	$output .= "

	<tr>
	<td colspan='9' class='text-center'>No Appointment</td>
	</tr>
	";
}
while ($row = mysqli_fetch_array($res)) {
	$output .= "
	<tr>
	<td>". $row['id']."</td>
	<td>". $row['firstname']."</td>
	<td>". $row['surname']."</td>
	<td>". $row['gender']."</td>
	<td>". $row['phone']."</td>
	<td>". $row['appointment_date']."</td>
	<td>". $row['symptoms']."</td>
	<td>". $row['booked_date']."</td>
	<td>
		<a href='discharge.php?id=".$row['id']."'>
			<button class='btn btn-info'>Check</button>
		</a>
	</td>
	</tr>
	";
}

$output .= "
	</tr>
	</table>

";

echo $output;

	 				 ?>
				</div>
			</div>
		</div>
	</div>

</body>
</html>