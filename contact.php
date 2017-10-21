<!DOCTYPE html>
<html>
<?php session_start(); ?>
<script>
function login(elm)
		{
			//alert(elm.name);
			if(elm.name==0){
			window.location.assign("loginHTML.php");
			}
			else if(elm.name==1)
				window.location.assign("user.php");
			else if(elm.name==2)
				window.location.assign("ajency_details.php"); 
			else if(elm.name==3)
				window.location.assign("admin_details.php");
		}
</script>
<head>
	<style>
		.button {
			background-color: #008CBA; /* Blue */
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 12px;
			margin: 4px 2px;
			cursor: pointer;
		}
		.button2 {background-color: #f44336;} /* Red */ 
	</style>
<link rel="icon" type="image/jpg" href="logo.jpg" sizes="20x20">
<title>Contact | Tour Map</title>
</head>
	<body>
	<img src="world.gif" width="50 px" height="50px">
        <i style="position: absolute; top: 0; right: 1%";><font size="6"><b>Tour Map</b></font></i><br>
        <table style="border: 1px solid black ; width:100%";>
            <tr style="border: 1px solid black">
                <td style="text-align:right">
				<a href="homepage.php"><input type="button" class = "button" value="Home"></a>
                <input type="button" class = "button" value="Contuct us" onclick="contact()"></a>
                <input type="button" class = "button" value="<?php  if(isset($_SESSION['login']) &&$_SESSION['login']>0)echo $_SESSION['name']; else echo "Login/Signup"; ?>" name="<?php if(isset($_SESSION['login'])) echo $_SESSION['login'];else echo 0;?>" onclick="login(this)">
                </td>
            </tr>
        </table>
		<?php
		require("database.php");
		$data=getJSONFromDB("select * from admin_table");
		$ddata=json_decode($data);
		echo "Admin Name   :".$ddata[0]->Name."<br>";
		echo "Email Address:".$ddata[0]->Email_id."<br>";
		echo "Phone Number :".$ddata[0]->Phone."<br>";;
		?>
		<form action="logout.php" method="post">
		<?php
			if(isset($_SESSION['login'])&&$_SESSION['login']>0)
			echo '<input type="submit" value="logout" class = "button button2" name="logOutButton" id="logOutButtonId">';
		?>
		</form>
	</body>
	
</html>