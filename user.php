<!DOCTYPE html>
<html>
<?php session_start() ?>
<head>
<link rel="icon" type="image/jpg" href="logo.jpg" sizes="20x20">
<title>User Details | Tour Map</title>
</head>
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

	<body>
		 <img src="world.gif" width="50 px" height="50px">
        <i style="position: absolute; top: 0; right: 1%";><font size="6"><b>Tour Map</b></font></i><br>
        <table style="border: 1px solid black ; width:100%";>
            <tr style="border: 1px solid black">
                <td style="text-align:right">
				  <a href="homepage.php"><input class = "button" type="button" value="Home"</a>
                  <a href="contact.php"><input type="button" value="Contuct us" class = "button" onclick="contact()">
                  <a href="user.php"><input type="button"class = "button"value="<?php  if(isset($_SESSION['login']) &&$_SESSION['login']==1)echo $_SESSION['name']; else echo "Login/Signup"; ?>"></a>
				  
			   </td>
            </tr>
        </table>
		<table>
			<tr>
				<td height="1" width="70">
				<h3>Details</h3>
				</td>
				<td>
				<a href="album.php"><input type="button" class = "button" value="My Photos"></a>
				<a href="user_history.php"><input type="button" class = "button" value="Visited History"></a>
				<a href="user_update.php"><input type="button" class = "button button2" value="Update Profile"></a>
				
				</td>
			</tr>
			<tr>
				<td><img src="<?php if($_SESSION['login']!=0) echo $_SESSION['image']; ?>" height="300" width="300"><br/>
				<b>First Name:<i> <?php if($_SESSION['login']!=0) echo $_SESSION['name']; ?> </i></b><br/>
				<b>Last Name:<i> <?php if($_SESSION['login']!=0) echo $_SESSION['lastname']; ?> </i></b><br/>
				<b>Date of Birth:<i> <?php if($_SESSION['login']!=0) echo $_SESSION['DOB']; ?> </i></b><br/>
				<b>Gender:<i> <?php if($_SESSION['login']!=0) echo $_SESSION['gender']; ?> </i></b><br/>
				<b>Email:<i> <?php if($_SESSION['login']!=0) echo $_SESSION['email']; ?> </i></b><br/>
				<b>Phone Number:<i> <?php if($_SESSION['login']!=0) echo $_SESSION['phone']; ?> </i></b></td><br/>
			</tr>
		</table>
		<form action="logout.php" method="post">
		<?php
		if(isset($_SESSION['login'])&&$_SESSION['login']==1)
			echo '<input type="submit" value="logout" class = "button button2"name="logOutButton" id="logOutButtonId">';
		?>
		</form>
	</body>

<html>