<?php
			require("database.php");
			session_start();
			$sql="SELECT offer_table.Place_Id, place_table.Place_Name, Offer_table.Offer FROM Offer_table
			INNER JOIN place_table
			ON Offer_table.Place_Id=place_table.Place_Id Where offer_table.licence='".$_SESSION["licence"]."'";
			$user=getJSONFromDB($sql);
			$userdata=json_decode($user);
			$totaluser=sizeof($userdata);
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Offer | Tour Map</title>
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
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th, td {
			padding: 5px;
			text-align: center;
		}
		</style>
		<link rel="icon" type="image/jpg" href="logo.jpg" sizes="20x20">
	</head>
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
		function placeDelete(elm){
			//alert(elm.name);
			//alert(elm.id);
			elm.value="Deleted";
			 elm.style.color="red";
			 var request=new XMLHttpRequest();
			 request.onreadystatechange=function(elm){
				 if (request.readyState == 4 && request.status == 200){
						resp=request.responseText;
				 }
			 };
			 var url="database.php?placeoffer=offer&placeid="+elm.name+"&licence="+elm.id;
			 request.open("POST", url, true);
			 request.send();
	}
	</script>
<body>
<img src="world.gif" width="50 px" height="50px">
        <i style="position: absolute; top: 0; right: 1%";><font size="6"><b>Tour Map</b></font></i><br>
        <table style="border: 1px solid black ; width:100%";>
            <tr style="border: 1px solid black">
                <td style="text-align:right">
                  <a href="contact.php"><input type="button" class = "button" value="contuct us" onclick="contact()"></a>
                  <input type="button" class = "button" value="<?php  if(isset($_SESSION['login']) &&$_SESSION['login']>0)echo $_SESSION['name']; else echo "Login/Signup"; ?>" name="<?php if(isset($_SESSION['login'])) echo $_SESSION['login'];else echo 0;?>" onclick="login(this)">
                </td>
            </tr>
        </table>
	<table style="width:100%">
	<tr>
		<th>Place_Id</th>
		<th>Place_Name</th> 
		<th>Offer</th>
		<th>Delete Offer</th>
	  </tr>
				<tr>
				
					 <?php
				
						for($i=0;$i<$totaluser;$i++){
							$uplace_id=$userdata[$i]->Place_Id;
							$up=$userdata[$i]->Place_Name;
							$ut=$userdata[$i]->Offer;
							echo "<tr>";
							echo "<td>".$uplace_id."</td>";
							echo "<td>".$up."</td>";
							echo "<td>".$ut."</td>";
							echo '<td> <input type="button" class="button" value="Delete" name="'.$uplace_id.'" id="'.$_SESSION["licence"].'" onclick="placeDelete(this)" >';
							//echo "<td>".$ut."</td>";
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