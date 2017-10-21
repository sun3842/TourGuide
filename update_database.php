<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/jpg" href="logo.jpg" sizes="20x20">
<title>Signup | Tour Map</title>
</head>
	<body>	
	<?php session_start() ?>
		<?php
			$target_dir = "url/";
			//print_r($GLOBALS);
			$target_file = $target_dir.$_FILES["fileToUpload"]["name"];
			/*echo $_FILES["fileToUpload"]["name"]."<br>";
			$uploadOk = 1;
			// Check if image file is a actual image or fake image
			if (file_exists($target_file)) {
				echo "Sorry, file already exists<br>";
				$uploadOk = 0;
			}
			if ($_FILES["fileToUpload"]["size"] > 50000000) {
				echo "File size exceeded<br>";
				$uploadOk = 0;
			}
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded<br>";
			}
			else
				if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) */
			if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
					
			define('DB_HOST', 'localhost');
			define('DB_NAME', 'project');
			define('DB_USER','root');
			define('DB_PASSWORD','');
			$conn = mysqli_connect("localhost", "root", "","project");
				$Firstname  = $_POST['firstname'];
				$Lirstname  = $_POST['lastname'];
				$data = $_POST['dob'];
				$Gender= $_SESSION['gender'];
				$phone= $_POST['phone'];
				$email = $_POST['email'];
				$photo = $target_file;
				$password = $_POST['password'];
				$query = "UPDATE user_table SET Firstname='$Firstname',Lastname='$Lirstname',Date_of_birth='$data',Gender='$Gender',Phone='$phone',Email_id='$email',Photo='$photo',Password='$password' WHERE Email_id='$email'";
				$data = mysqli_query ($conn,$query)or die(mysqli_error($conn));
				if($data)
				{
					header('location:logout.php');
				}
			}
			?>
	</body>
</html>