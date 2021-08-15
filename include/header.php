<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel= "stylesheet" type= "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
     

    <nav class="navbar navbar-expand-lg navbar-info bg-info">
    	<h5 class="text-white">Doctor Management System</h5>

    	<div class="mr-auto"></div>


    	<ul class="navbar-nav">
    		<?php
    		if(isset($_SESSION['admin'])) {

    			$user = $_SESSION['admin'];
    			echo '
    			<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
    		<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
    		';

    		} else {
    			echo '
    			<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
    		<li class="nav-item"><a href="#" class="nav-link text-white">Doctor</a></li>
    		<li class="nav-item"><a href="#" class="nav-link text-white">Patient</a></li>
    		';
    		}

    		?>
    	</ul>
    </nav>
</body>
</html>