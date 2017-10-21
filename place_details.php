<?php
session_start();
//echo $_REQUEST["pid"];
//echo $_SESSION["email"];
require("database.php");
$sql='SELECT * FROM `place_table` WHERE Place_Id='.$_REQUEST["pid"];
$place=getJSONFromDB($sql);
$data=json_decode($place);
$isvisited=0;
$isoffer=0;
$numberofoffer=0;
$placephotos=0;
$offer='SELECT * FROM `offer_table` WHERE Place_Id='.$_REQUEST["pid"];
$pofr=getJSONFromDB($offer);
$poffer=json_decode($pofr);
$numberofoffer=sizeof($poffer);
if(isset($_SESSION["email"])&&$_SESSION["login"]==1){
$visit='SELECT * FROM `visited_table` WHERE User_Email="'.$_SESSION["email"].'" AND Place_Id="'.$_REQUEST["pid"].'";';
$pvisit=getJSONFromDB($visit);
$pvisitdata=json_decode($pvisit);
$isvisited=sizeof($pvisitdata);

}
if(isset($_SESSION["licence"])&&$_SESSION["login"]==2){
$offer='SELECT * FROM `offer_table` WHERE licence="'.$_SESSION["licence"].'" AND Place_Id="'.$_REQUEST["pid"].'";';
$poffer=getJSONFromDB($offer);
$pofferdata=json_decode($poffer);
$isoffer=sizeof($pofferdata);

}


//echo $data[0]->Photo;
?>
<!DOCTYPE html>
<html>
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
		function placevisit(elm){
			//alert(elm.name);
			//alert(elm.id);
			if(elm.name=="isPlaceVisited")
			{
				window.location.assign("loginHTML.php");
			}
			else{
			elm.style.color="red";
			elm.value="Place Visited";
			var request=new XMLHttpRequest();
			request.onreadystatechange=function(elm)
				{
					if (request.readyState == 4 && request.status == 200)
						{
						    resp=request.responseText;
							alert(resp);
							//msg=document.getElementById(el);
							elm.value="Place Visited";
							
						}
						
				};
				var url="database.php?signal=write&email="+elm.name+"&pid="+elm.id;
				request.open("POST", url, true);
				request.send();
			}
		}
		
		function placeoffer(elm){
			var v=document.getElementById("pofrid");
			val=v.value;
			//alert(val);
			//alert(elm.id);
			//alert(elm.name);
			if(elm.name=="isoffer")
			{
				window.location.assign("loginHTML.php");
			}
			else{
			elm.style.color="red";
			elm.value="Place offered";
			v.style.display="none";
			var request=new XMLHttpRequest();
			request.onreadystatechange=function(elm)
				{
					if (request.readyState == 4 && request.status == 200)
						{
						    resp=request.responseText;
							alert(resp);
							//msg=document.getElementById(el);
							elm.value="Place Visited";
							
						}
						
				};
				var url="database.php?signal=write&license="+elm.name+"&pid="+elm.id+"&offer="+val;
				request.open("POST", url, true);
				request.send();
			}
		}
		
		function offerAccept(elm){
			val=elm.name;
			alert(val);
			elm.style.color="red";
			var request=new XMLHttpRequest();
			request.onreadystatechange=function(elm)
				{
					if (request.readyState == 4 && request.status == 200)
						{
						    resp=request.responseText;
							alert(resp);
							//msg=document.getElementById(el);
							//elm.value="Place Visited";
							
						}
						
				};
				var url="database.php?signal=read&license="+elm.name+"&&offer="+elm.value;
				request.open("POST", url, true);
				request.send();
		}
	</script>
	<head>
	<link rel="icon" type="image/jpg" href="logo.jpg" sizes="20x20">
	<title>Place Details</title>
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
</head>
	<body>
	<img src="world.gif" width="50 px" height="50px">
        <i style="position: absolute; top: 0; right: 1%";><font size="6"><b>Tour Map</b></font></i><br>
        <table style="border: 1px solid black ; width:100%";>
            <tr style="border: 1px solid black">
                <td style="text-align:right">
				<a href = "homepage.php"><input type= "button" class= "button" value= "Home"></a>
                  <a href="contact.php"><input type="button" class = "button" value="contuct us" onclick="contact()"></a>
                  <input type="button" class = "button" value="<?php  if(isset($_SESSION['login']) &&$_SESSION['login']>0)echo $_SESSION['name']; else echo "Login/Signup"; ?>" name="<?php if(isset($_SESSION['login'])) echo $_SESSION['login'];else echo 0;?>" onclick="login(this)">
                </td>
            </tr>
        </table>
		<table>
			<tr>
				<td>
					<img src="<?php echo $data[0]->Photo ?>" height="200" width="350">
					<input type="button" id="<?php echo $_REQUEST['pid'];?>" name="<?php if(isset($_SESSION['login'])&&$_SESSION['login']==1) echo $_SESSION["email"]; else echo 'isPlaceVisited';?>" class = "button"  onclick="placevisit(this)" value="<?php if($isvisited>0)echo 'place already visited';else echo 'visit this place'; ?>" style="visibility:<?php if($_SESSION["login"]==1||!isset($_SESSION["login"])||$_SESSION['login']==0)echo 'visible'; else echo 'hidden';?>">
					<?php
						if($isoffer<=0&&isset($_SESSION['login'])&&$_SESSION['login']==2)
							echo '<input type="text" name="pofrtxt" id="pofrid">'
					?>
					<input type="button" onclick="placeoffer(this)" id="<?php echo $_REQUEST['pid']; ?>" name="<?php if(isset($_SESSION['login'])&&$_SESSION['login']==2) echo $_SESSION["licence"]; else echo "isoffer"?>" class = "button" value="<?php if($isoffer>0)echo 'place already offered';else echo 'offer place'; ?>"style="visibility:<?php if($_SESSION['login']==2||!isset($_SESSION['login'])||$_SESSION['login']==0)echo 'visible'; else echo 'hidden';?>">
					<?php 
						if(isset($_SESSION['login'])&&$_SESSION['login']==1){
						for($i=0;$i<$numberofoffer;$i++)
							echo '<input type="button" name="'.$poffer[$i]->licence.'" value="'.$poffer[$i]->Offer.'" onclick="offerAccept(this)" id="offerbutton"'.$i.'">';
						}
					?>
                    <br/>
					<i>Place Name:<b><?php echo $data[0]->Place_Name ?></b></i><br/>
					<i>Place Type:<b><?php echo $data[0]->Type ?></b></i><br/>
					<i>Place Rating:<b><?php echo $data[0]->Rating ?></b></i><br/>
					<i>Place Details:<b><?php echo $data[0]->Details ?></b></i><br/>
					<i>More Photos:</i><br>
					<?php
					$ppsql='SELECT * FROM `photo_table` where Place_Id="'.$_REQUEST["pid"].'";';
					$pphotojson=getJSONFromDB($ppsql);
					$pphoto=json_decode($pphotojson);
					$placephotos=sizeof($pphoto);
					for($i=0;$i<$placephotos;$i++){
						$source=$pphoto[$i]->Url;
						if($i%3==0&&$i!=0)echo "<br/>";
						echo '<img src="'.$source.'" width="330px" height="150px"> ';
					}
				   ?>
				</td>
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