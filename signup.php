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
</head>
<script type="text/javascript">
var request = new XMLHttpRequest();
var flag=1;
function fnamecheck()
	{
	 var a=document.frm.firstname.value;
	 var msg=document.getElementById("fnc");
	 if(a.length<3){
		msg.innerHTML="invalid name";
		msg.style.color="red";
		flag=0;
		return false;
	}
	else
		{
			msg.innerHTML="valid name";
			msg.style.color="green";
			flag=1;
			return true;
		}
	}
	
	function lnamecheck()
	{
	 var a=document.frm.lastname.value;
	 var msg=document.getElementById("lnc");
	 if(a.length<3){
		msg.innerHTML="invalid name";
		msg.style.color="red";
		flag=0;
		return false;
	}
	else
		{
			msg.innerHTML="valid name";
			msg.style.color="green";
			flag=1;
			return true;
		}
	}
	
	
	function eml(mail)
	{
		request.onreadystatechange=function(mail)
				{
					if (request.readyState == 4 && request.status == 200)
						{
						    resp=request.responseText;
							//alert(resp);
							msg=document.getElementById("emailc");
							if(resp>0){
							msg.innerHTML="email is used";
							msg.style.color="red";
							return false;
							}
							else{
							msg.innerHTML="email valid";
							msg.style.color="green";
							return true;
						}
					}
						
				};
				var url="check.php?signal=read&email="+mail;
				request.open("GET", url, true);
				request.send();
	}
	
	function emailcheck(mail)
	{
	 var a=mail.value;
	 //alert(a);
	 var pos=a.indexOf("@");
	 var com=a.indexOf(".com");
	 var msg=document.getElementById("emailc");
	 if(pos>=-1 && com>pos){
		flag=1;
		eml(a);
		return true;
	}
	else
		{
			msg.innerHTML="invalid email";
			msg.style.color="red";
			flag=0;
			return false;
		}
	}
	
    
    function phonecheck()
    {
        var msg=document.getElementById("phnc");
        var pnum=document.frm.phone.value;
        if(pnum>1000&&pnum<9999999999)
        {
            msg.innerHTML="valid phone";
            msg.style.color="green";
            flag=1;
            return true;
        }
        else
        {
            msg.innerHTML="invalid phone";
            msg.style.color="red";
            flag=1;
            return false;
        }
    }
    
	function passcheck()
	{
	 var a=document.frm.password.value;
	 var msg=document.getElementById("passc");
	 if(a.length<5){
		msg.innerHTML="invalid password";
		msg.style.color="red";
		flag=0;
		return false;
	}
	else
		{
			msg.innerHTML="valid password";
			msg.style.color="green";
			flag=1;
			return true;
		}
	}
	
	function cpasscheck()
	{
	 var a=document.frm.confirmpassword.value;
	 var b=document.frm.password.value;
	 
	 var msg=document.getElementById("cpassc");
	 if(a!=b){
		msg.innerHTML="pass not match";
		msg.style.color="red";
		flag=0;
		return false;
	}
	else
		{
			msg.innerHTML="pass match";
			msg.style.color="green";
			flag=1;
			return true;
		}
	}
	
	function submitfrm()
	{
		var ch=document.getElementById("emailc");
		if(fnamecheck()==true && lnamecheck()==true && passcheck()==true && cpasscheck()==true&&ch.style.color=="green"){
		document.frm.submit();
		}
		else
		alert("wrong");
	}
    

</script>

<head>
<title>Signup | Tour Map</title>
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
<form action="new_user.php" method="post" enctype="multipart/form-data" name="frm">
First name:<br>
<input type="text" name="firstname" id="fn" onkeyup="fnamecheck()" placeholder="Enter first name" > <i id="fnc"></i>
<br>
Last name:<br>
<input type="text" name="lastname" id="ln" onkeyup="lnamecheck()" placeholder="Enter last name" > <i id="lnc"></i>
<br>
DOB:<br>
<input type="text" name="dob" id="dob" placeholder="Enter date of birth" ><br>

Gender:<br>
  <input type="radio" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <input type="radio" name="gender" value="other"> Other 
<br>
Phone:<br>
<input type="text" name="phone" id="phone" onkeyup="phonecheck()" placeholder="Enter phone number"><i id="phnc"></i> <br>
Email Id:<br>
<input type="text" name="email" id="emailid" onkeyup="emailcheck(this)" placeholder="Enter email address" > <i id="emailc"></i>
<br><br>
Select image to upload :<br><br> 
<input type="file" name="fileToUpload" id="fileToUploadId" accept="image/*"><br><br>

Password:<br>
<input type="password" name="password" id="pass" onkeyup="passcheck()" placeholder="Enter password" > <i id="passc"></i>
<br>
Confirm Password:<br>
<input type="password" name="confirmpassword" id="cpass" onkeyup="cpasscheck()" placeholder="re-type password" ><i id="cpassc"></i>
<br><br>
<input type="button" value="Sign Up" class = "button" id="sign" onclick="submitfrm()">
</form>

</body>


</html>