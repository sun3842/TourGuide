<?php
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","project");
	
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
function insert($sql){
		$conn = mysqli_connect("localhost", "root", "","project");
		mysqli_query($conn, $sql)or die(mysqli_error($conn));
}
function delete($sql){
	$conn = mysqli_connect("localhost", "root", "","project");
	mysqli_query($conn, $sql)or die(mysqli_error($conn));
}
if(isset($_REQUEST["signal"])&&$_REQUEST["signal"]=="write"&&isset($_REQUEST["email"])&&isset($_REQUEST["pid"])){
	$sql='INSERT INTO `visited_table`(`User_Email`, `Place_Id`) VALUES ("'.$_REQUEST["email"].'","'.$_REQUEST["pid"].'")';
	insert($sql);
//echo "suc";
}
if(isset($_REQUEST["signal"])&&$_REQUEST["signal"]=="write"&&isset($_REQUEST["license"])&&isset($_REQUEST["pid"])&&isset($_REQUEST["offer"])){
	$sql='INSERT INTO `offer_table`(`Offer`, `Place_Id`, `licence`) VALUES ("'.$_REQUEST["offer"].'","'.$_REQUEST["pid"].'","'.$_REQUEST["license"].'")';
	insert($sql);
	//echo "suc";
}
if(isset($_REQUEST["signal"])&&$_REQUEST["signal"]=="read"&&isset($_REQUEST["license"])&&isset($_REQUEST["offer"])){
	$sql='SELECT * FROM `agency` WHERE licence="'.$_REQUEST["license"].'"';
	$jdata=getJSONFromDB($sql);
	$jdataprs=json_decode($jdata);
	echo "Ajency Email:".$jdataprs[0]->email;
	echo "\r\n";
	echo "Ajency Phone Number:".$jdataprs[0]->phone;
	//echo "suc";
	//echo  sizeof($jdataprs);
}
if(isset($_REQUEST["placeoffer"])&&$_REQUEST["placeoffer"]=="offer"&&isset($_REQUEST["licence"])&&isset($_REQUEST["placeid"])){
	//echo "suc";
	$sql='DELETE FROM `offer_table` WHERE Place_Id="'.$_REQUEST["placeid"].'" AND licence="'.$_REQUEST["licence"].'"';
	delete($sql);
	//echo "Ajency Email:".$jdataprs[0]->email;
	//echo "\r\n";
	//echo "Ajency Phone Number:".$jdataprs[0]->phone;
	//echo  sizeof($jdataprs);
}
?>