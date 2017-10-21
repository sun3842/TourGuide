<?php
			require("database.php");
			$sql="select * from place_table";
			$place=getJSONFromDB($sql);
			$placedata=json_decode($place);
			$totalplace=sizeof($placedata);
?>

<!DOCTYPE html>
<html>
<script>
var request=new XMLHttpRequest();
 function placeDelete(elm){
	 elm.value="Deleted";
	 elm.style.color="red";
	 //elm.value="Deleted";
	 var placeid=elm.name;
	 //alert();
	 alert(placeid);
	 request.onreadystatechange=function(placeid,elm){
		 if (request.readyState == 4 && request.status == 200){
		        resp=request.responseText;
				alert(resp);
				alert(elm.value);
				elm.value=resp;
				elm.style.color="red";
		 }
	 };
	 var url="delete_user.php?signal=place&email="+placeid;
	 request.open("POST", url, true);
	 request.send();
 }
</script>
<head>
<link rel="icon" type="image/jpg" href="logo.jpg" sizes="20x20">
<title>Admin | Tour Map</title>
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
</head>
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
    <th>Place_id</th>
    <th>Place_Name</th> 
    <th>Type</th>
    <th>Rating</th> 
	<th>Details</th>
	<th>Delete Place</th>
  </tr>
            <tr>
               
                 <?php
						for($i=0;$i<$totalplace;$i++){
						$pid=$placedata[$i]->Place_Id;
						$pname=$placedata[$i]->Place_Name;
						$ptype=$placedata[$i]->Type;
						$prating=$placedata[$i]->Rating;
						$pdetails=$placedata[$i]->Details;
						echo "<tr>";
						echo "<td>".$pid."</td>";
						echo "<td>".$pname."</td>";
						echo "<td>".$ptype."</td>";
						echo "<td>".$prating."</td>";
						echo "<td>".$pdetails."</td>";
						echo '<td> <input type="button" class="button button2" value="Delete" name="'.$pid.'" id="'.$i.'" onclick="placeDelete(this)" >';
						echo "</tr>";
				
					}
				?>
                
            </tr>
        </table>
		<a href="add_place.php"><input type="button" class ="button" value="Add_place">
		<form action="logout.php" method="post">
		<?php
			if(isset($_SESSION['login'])&&$_SESSION['login']>0)
			echo '<input type="submit" value="logout" class = "button button2" name="logOutButton" id="logOutButtonId">';
		?>
		</form>
</body>
</html>