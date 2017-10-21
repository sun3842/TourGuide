<! DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/jpg" href="logo.jpg" sizes="30x30">
  <title>Check Agency | Tour Map</title>
</head>
</html>
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'project');
define('DB_USER','root');
define('DB_PASSWORD','');
$conn = mysqli_connect("localhost", "root", "","project");
	//echo "YOUR REGISTRATION IS COMPLETEDmmmmmmmmmmm...";
    $username = $_POST['firstname'];
    $data = $_POST['dob'];
	$licence=$_POST['licence'];
	$phone= $_POST['phone'];
    $email = $_POST['email'];
    $password =  $_POST['password'];
    $query = "INSERT INTO agency (username,date,licence,phone,email,password ) VALUES ('$username','$data','$licence','$phone','$email','$password')";
    $data = mysqli_query ($conn,$query)or die(mysqli_error($conn));
    if($data)
    {
    header('location:loginHTML.php');
    }

?>