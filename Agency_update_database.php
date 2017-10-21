<! DOCTYPE html>
<html>
	<head>
	  <link rel="icon" type="image/jpg" href="logo.jpg" sizes="30x30">
	  <title>UPDATE Agency | Tour Map</title>
	</head>
</html>
	<?php
		define('DB_HOST', 'localhost');
		define('DB_NAME', 'project');
		define('DB_USER','root');
		define('DB_PASSWORD','');
		$conn = mysqli_connect("localhost", "root", "","project");
		$username = $_POST['firstname'];
		$data = $_POST['dob'];
		$licence=$_POST['licence'];
		$phone= $_POST['phone'];
		$email = $_POST['email'];
		$password =$_POST['password'];
		$query = "UPDATE agency SET username='$username',date='$data',licence='$licence',phone='$phone',email='$email', password='$password' WHERE licence='$licence'";
		$data = mysqli_query ($conn,$query)or die(mysqli_error($conn));
		if($data)
		{
		header('location:logout.php');
		}

	?>