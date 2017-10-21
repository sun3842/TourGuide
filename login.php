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
//*******************for user
$sql1="select * from user_table where Email_id='".$_POST["email"]."' AND Password='".$_POST["password"]."'";
//echo $sql;
$student1=getJSONFromDB($sql1);
$studentdata1=json_decode($student1);
//$x=0;
//********************for ajency
$sql2="select * from agency where email='".$_POST["email"]."' AND Password='".$_POST["password"]."'";
//echo $sql;
$student2=getJSONFromDB($sql2);
$studentdata2=json_decode($student2);

//******************for admin
$sql3="select * from admin_table where Email_id='".$_POST["email"]."' AND Password='".$_POST["password"]."'";
//echo $sql;
$student3=getJSONFromDB($sql3);
$studentdata3=json_decode($student3);
/*for($i=0;$i<sizeof($studentdata);$i++){
		
		echo $jsn[$i]->name." earned ".$jsn[$i]->cgpa;
		echo "<br>";
}*/
session_start();
 //$_SESSION['name']=$studentdata[0]->FirstName;
// echo $_SESSION['name'];
if(sizeof($studentdata1)>0) {
	$_SESSION['login']=1; 
	$_SESSION['name']=$studentdata1[0]->FirstName;
	$_SESSION['email']=$studentdata1[0]->Email_id ; 
	$_SESSION['image']=$studentdata1[0]->Photo ;
	$_SESSION['lastname']=$studentdata1[0]->LastName;
	$_SESSION['DOB']=$studentdata1[0]->Date_of_birth;
	$_SESSION['phone']=$studentdata1[0]->Phone;
	$_SESSION['gender']=$studentdata1[0]->Gender;
	header('location:homepage.php');
//print_r($_SESSION);
}
else if(sizeof($studentdata2)>0 ){
	$_SESSION['login']=2; 
	$_SESSION['name']=$studentdata2[0]->username;
	$_SESSION['email']=$studentdata2[0]->email ; 
	//$_SESSION['image']=$studentdata1[0]->Photo ;
	$_SESSION['licence']=$studentdata2[0]->licence;
	$_SESSION['DOB']=$studentdata2[0]->date;
	$_SESSION['phone']=$studentdata2[0]->phone;
	header('location:homepage.php');
}
else if(sizeof($studentdata3)>0){
	$_SESSION['login']=3; 
	$_SESSION['name']=$studentdata3[0]->Name;
	$_SESSION['email']=$studentdata3[0]->Email_id ; 
	//$_SESSION['image']=$studentdata1[0]->Photo ;
	//$_SESSION['licence']=$studentdata3[0]->licence;
	//$_SESSION['DOB']=$studentdata3[0]->date;
	$_SESSION['phone']=$studentdata3[0]->Phone;
	header('location:homepage.php');
}
else {
	$_SESSION['loginerror']=1;
	header("location:loginHTML.php");
}
echo "<br>";
//print_r($studentdata);echo "</pre>";



?>