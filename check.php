
<?php
	require("database.php");
	if($_REQUEST["signal"]=="read" && isset($_REQUEST['license'])){
		$sql="select * from agency where licence='".$_REQUEST['license']."'";
			//$sql="select * from user where email='".$_REQUEST['email']."'";
			//echo $sql."<br/>";
			$jsonData= getJSONFromDB($sql);
			$data=json_decode($jsonData);
			$x=sizeof($data);
			//echo $x;
			echo $x;
	}
	if($_REQUEST["signal"]=="read" && isset($_REQUEST['email'])){
		//$sql="select * from agency where licence='".$_REQUEST['license']."'";
			$sql="select * from user_table where Email_id='".$_REQUEST['email']."'";
			//echo $sql."<br/>";
			$jsonData= getJSONFromDB($sql);
			$data=json_decode($jsonData);
			$x=sizeof($data);
			//echo $x;
			echo $x;
	}
	if($_REQUEST["signal"]=="read"&& isset($_REQUEST["Place"])){
		$placeName=$_REQUEST["Place"];
		$sql="SELECT * FROM `place_table` WHERE Place_Name LIKE '%".$placeName."%'";
		$jsonData=getJSONFromDB($sql);
		echo $jsonData;
	}
?>