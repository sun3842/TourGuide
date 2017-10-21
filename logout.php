<?php
    session_start();
	$_SESSION['login']=0;
	$_SESSION['loginerror']=0;
	header('location:homepage.php')
?>
				