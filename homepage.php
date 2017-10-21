<!DOCTYPE html>
<html>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript">
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
        function contact(){}
		
		function searchPlc(placeName){
			var request=new XMLHttpRequest();
			var table=document.getElementById("iSearchPlace");
			var test=document.getElementById("spd");
			request.onreadystatechange=function(placeName)
				{
					if (request.readyState == 4 && request.status == 200)
						{
						     resp=JSON.parse(request.responseText);
							//alert(resp.length);
							if(resp.length>0){
								table.innerHTML="";
								table.style.visibility="visible";
							for( i=0;i<=resp.length;i++){
								//alert(resp[i].Place_Name);
								table.innerHTML+='<a href="place_details.php?pid='+resp[i].Place_Id+'"><img src="'+resp[i].Photo+'" height="200" width="350">'+resp[i].Place_Name+'</a>';
							}
						}
							
					}
						
				};
				var url="check.php?signal=read&Place="+placeName;
				request.open("GET", url, true);
				request.send();
			
		}
		
        function search(elm) {
			//alert(elm.value);
			var apt=document.getElementById("iAllPlace");
			var spt=document.getElementById("iSearchPlace");
			if(elm.value!=''){
			apt.style.display="none";
			spt.style.visibility="visible"
			searchPlc(elm.value);
			}
			else if(elm.value==""){
				apt.style.display="normal";
				apt.style.visibility="initial";
				spt.style.visibility="collapse";
			}
		}  
	$(document).ready(function(){
    $("button").click(function(){
        $("p").hide();
    });
});		
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
        <title>
           Home | Tour Map
        </title>
    </head>
    <body>
	<table>
	<tr>
	<?php
		session_start();
		$_SESSION['loginerror']=0;
	?>
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
        <br/>
        <input type="text" name="searchbox" id="searchboxid" width="10px" onkeyup="search(this)" placeholder="Search Your Place Here">
    
        <br><br>
		<?php
			require("database.php");
			$sql="select * from place_table";
			$place=getJSONFromDB($sql);
			$placedata=json_decode($place);
			$totalplace=sizeof($placedata);
		?>
        <table style="width:95%" name="allPlace" id="iAllPlace">
            <tr>
                <td>
                 <?php
			
					for($i=0;$i<$totalplace;$i++){
						$pid=$placedata[$i]->Place_Id;
						$pname=$placedata[$i]->Place_Name;
						$pp=$placedata[$i]->Photo;
						//if($i%3==0&&$i!=0)echo "<br/>";
						echo '<a href="place_details.php?pid='.$pid.'"><img src="'.$pp.'" height="200" width="350">'.$pname.'</a>';
					}
				?>
                </td>
            </tr>
        </table>
		<p  name="searchPlace" id="iSearchPlace" style="visibility:hidden;">
		
		</p>
		</tr >
		<tr>
		<form action="logout.php" method="post">
		<?php
			if(isset($_SESSION['login'])&&$_SESSION['login']>0)
			echo '<input type="submit" value="logout" class = "button button2" name="logOutButton" id="logOutButtonId">';
		?>
		</form>
		<?php
			//if(isset($_SESSION['login'])&&$_SESSION['login']==3)
			//echo <a src= "add_place.php"'<input type="submit" value="logout" name="logOutButton" id="logOutButtonId">';
		?>
		</tr>
        </table>
    </body>
</html>