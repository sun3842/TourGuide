<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/jpg" href="logo.jpg" sizes="20x20">
<title>Check Agency | Tour Map</title>
</head>
	<body>
		<?php
		require("database.php");
		if($_REQUEST["signal"]=="read" && isset($_REQUEST['license'])){
			$sql="select * from agency where licence='".$_REQUEST['license']."'";
			//$sql="select * from ajency where email='".$_REQUEST['email']."'";
			//echo $sql."<br/>";
			$jsonData= getJSONFromDB($sql);
			$data=json_decode($jsonData);
			$x=sizeof($data);
			//echo $x;
			echo $x;
		}
		?>
	</body>
</html>