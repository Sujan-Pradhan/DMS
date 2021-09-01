<?php 

session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Doctor</title>
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
	 				<h4 class="text-center">Edit Doctor</h4>

	 				<?php

	 				if(isset($_GET['id'])) {
	 					$id = $_GET['id'];

	 					$query = "SELECT * FROM doctor WHERE id='$id'";
	 					$res = mysqli_query($conn, $query);

	 					$row = mysqli_fetch_array($res);
	 				}

	 				?>

	 				<div class="row">
	 					<div class="col-md-8">
	 						<h4 class="text-center my-3
	 						">Doctor Details</h4>
	 						<h4 class="my-3">ID: <?php echo $row['id']; ?></h4>
	 						<h4 class="my-3">Firstname: <?php echo $row['firstname']; ?></h4>
	 						<h4 class="my-3">Surname: <?php echo $row['surname']; ?></h4>
	 						<h4 class="my-3">Username: <?php echo $row['username']; ?></h4>
	 						<h4 class="my-3">Email: <?php echo $row['email']; ?></h4>
	 						<h4 class="my-3">Phone: <?php echo $row['phone']; ?></h4>
	 						<h4 class="my-3">Gender: <?php echo $row['gender']; ?></h4>
	 						<h4 class="my-3">Country: <?php echo $row['country']; ?></h4>
	 						<h4 class="my-3">Date Register: <?php echo $row['data_reg']; ?></h4>
	 						<h4 class="my-3">Salary: Rs <?php echo $row['salary']; ?></h4>
	 					</div>
	 					<div class="col-md-4">
	 						<h4 class="text-center my-3">Update Salary</h4>

	 						<?php

	 						if(isset($_POST['update'])) {
	 							$salary = $_POST['salary'];

	 							$q = "UPDATE doctor SET salary='$salary' WHERE id='$id'";

	 							mysqli_query($conn, $q);
	 						}

	 						?>

	 						<form method="post">
	 							<label>Enter Doctor's Salary</label>
	 							<input type="number" name="salary" class="
	 							form-control" autocomplete="off" placeholder="Enter Doctor's Salary" value="<?php echo $row['salary'] ?>">
	 							<input type="submit" name="update" class="btn btn-info my-3" value="Update Salary">
	 						</form>
	 					</div>
	 				</div>

	 			</div>
	 		</div>
	 	</div>
	 </div>

</body>
</html>