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
		<title>Login | Tour Map</title>
	</head>
    <body>
        <img src="world.gif" width="50 px" height="50px">
        <i style="position: absolute; top: 0; right: 1%";><font size="6"><b>Tour Map</b></font></i><br>
        <table style="border: 1px solid black ; width:100%";>
            <tr style="border: 1px solid black">
                <td style="text-align:right">
				  <a href="homepage.php"><input type="button" class = "button" value="Home"</a>
                  <a href="contact.php"><input type="button" value="Contuct us" class = "button" onclick="contact()">
                  <a href="loginHTML.php"><input type="button" class = "button" value="<?php  if(isset($_SESSION['login']) &&$_SESSION['login']==1)echo $_SESSION['name']; else echo "Login/Signup"; ?>" onclick="login(this)">
                </td>
            </tr>
        </table>
        <br><br>
        <form name="login" action="login.php" method="post">
            <b>E-mail:</b>
            <input type="text" id="emailboxid" name="email" placeholder="Enter your E-mail address"><br><br>
            <b>Password:</b> 
            <input style="position: absolute;left: 6.7%" type="password" name="password" id="passwordbox" placeholder="Enter password"><br><br>
            <input type="submit" class = "button" value="login">
        </form>
		<br/>
		<?php
		session_start();
		if(isset($_SESSION['loginerror']) && $_SESSION['loginerror']==1)
			echo"<b style='color:red;'>Wrong password or email</b>";
		?>
		<br><a href="forgot_password.php">forgot_password </a>
        <h2 style="position: absolute; bottom: 2%; right: 1%">
            <a href="signup.php">signup_as_user  </a>or<a href="ajency_signup.php">  signup_as_ajency</a>
        </h2>
		
    </body>
</html>