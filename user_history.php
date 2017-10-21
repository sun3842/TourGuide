<?php
			require("database.php");
			session_start();
			$sql="SELECT visited_table.User_Email, visited_table.Place_Id, place_table.Place_Name, place_table.Type FROM visited_table INNER JOIN place_table ON visited_table.Place_Id=place_table.Place_Id Where visited_table.User_Email='".$_SESSION['email']."'";
			$user=getJSONFromDB($sql);
			$userdata=json_decode($user);
			$totaluser=sizeof($userdata);
?>

<!DOCTYPE html>
<html>
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
        <title> User Visited History | Tour Map</title>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
	text-align: center;
}
</style>
</head>
<body>
<img src="world.gif" width="50 px" height="50px">
        <i style="position: absolute; top: 0; right: 1%";><font size="6"><b>Tour Map</b></font></i><br>
        <table style="border: 1px solid black ; width:100%";>
            <tr style="border: 1px solid black">
                <td style="text-align:right">
				<a href="homepage.php"><input type="button" class = "button" value="Home"></a>
                  <a href="contact.php"><input type="button" class = "button" value="Contuct us" onclick="contact()"></a>
                  <a href="user.php"><input type="button" class = "button" value="<?php  if(isset($_SESSION['login']) &&$_SESSION['login']>0)echo $_SESSION['name']; else echo "Login/Signup"; ?>" name="<?php if(isset($_SESSION['login'])) echo $_SESSION['login'];else echo 0;?>" onclick="login(this)">
                </td>
            </tr>
        </table>
<table style="width:100%">
<tr>
    <th>User_Email</th>
    <th>Place_Id</th> 
    <th>Place_Name</th>
	<th>Type</th>
  </tr>
            <tr>
            
                 <?php
			
					for($i=0;$i<$totaluser;$i++){
						$uemail=$userdata[$i]->User_Email;
						$uplace_id=$userdata[$i]->Place_Id;
						$up=$userdata[$i]->Place_Name;
						$ut=$userdata[$i]->Type;
						//$uphone=$userdata[$i]->Phone;
						//$uemail=$userdata[$i]->Email_id;
						echo "<tr>";
						  echo "<td>".$uemail."</td>";
						  echo "<td>".$uplace_id."</td>";
						  echo "<td>".$up."</td>";
						  echo "<td>".$ut."</td>";
						  //echo "<td>".$uphone."</td>";
						  //echo "<td>".$uemail."</td>";
						  //echo '<td> <input type="button" value="Delete" name="'.$uemail.'" id="'.$i.'" onclick="userDelete(this)" >';
						  echo "</tr>";
				
					}
				?>
               
            </tr>
        </table>
		<form action="logout.php" method="post">
		<?php
			if(isset($_SESSION['login'])&&$_SESSION['login']>0)
			echo '<input type="submit" value="logout" class = "button button2" name="logOutButton" id="logOutButtonId">';
		?>
		</form>
</body>
</html>