<! DOCTYPE html>
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
		  <title>add place | Tour Map</title>
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
	<form action="add_database.php" method="post" enctype="multipart/form-data" name="frm">
	 <h3>
		Select image to upload : 
		<input type="file" name="fileToUpload" id="fileToUploadId" accept="image/*"><br><br>
		Place_Id     :
		<input type="text" name="pid" placeholder="Enter Place_Id" ><br><br><br>
		Place_Name   :
		<input type="text" name="pname" placeholder="Enter Place_Name" ><br><br><br>
		Place Type   :
		<input type="text" name="ptype" placeholder="Enter Place_Type" ><br><br><br>
		Place_Rating :
		<input type="text" name="prating" placeholder="Enter Place_Rating" ><br><br><br>
		Place_Details:
		<input type="text" name="pdetails" placeholder="Enter Place_Details" ><br><br><br>
		Upload More photos for this place:
		<input type="file" name="pphotos[]" id="pphotosid" accept="image/*" multiple><br/>
		<input type="submit" value="ADD" class="button" id="sign" onclick="submit">
	</h3>
	</form>
	<form action="logout.php" method="post">
		<?php
			if(isset($_SESSION['login'])&&$_SESSION['login']>0)
			echo '<input type="submit" value="logout" class = "button button2" name="logOutButton" id="logOutButtonId">';
		?>
		</form>
	</body>
</html>