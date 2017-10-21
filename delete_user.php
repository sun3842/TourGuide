<?php
function delete($sql){
	$conn = mysqli_connect("localhost", "root", "","project");
	mysqli_query($conn, $sql)or die(mysqli_error($conn));
}
if($_REQUEST['signal']=="user"&&isset($_REQUEST['email'])){
	$sql='DELETE FROM `user_table` WHERE Email_id="'.$_REQUEST["email"].'";';
	delete($sql);
	echo "Deleted";
}
else if($_REQUEST['signal']=="agency"&&isset($_REQUEST['email'])){
	$sql='DELETE FROM `agency` WHERE licence="'.$_REQUEST["email"].'";';
	delete($sql);
	echo "Deleted";
}
else if($_REQUEST['signal']=="place"&&isset($_REQUEST['email'])){
	$sql='DELETE FROM `place_table` WHERE Place_Id="'.$_REQUEST["email"].'";';
	delete($sql);
	echo "Deleted";
}

?>