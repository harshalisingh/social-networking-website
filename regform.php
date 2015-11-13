<html>
<head>
<title>StudentWorld accounts
</title>
<?php
session_start();
?>
</head>
<body>

			

<script type="text/javascript">
function validate_form()
{
var x=document.forms["myForm"]["email"].value
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
valid=true;
 
if(document.myForm.fname.value=="")
{
alert(" Enter your the first name!");
valid=false;
}

else if(document.myForm.lname.value=="")
{
alert ("Enter your last name!");
valid=false;
}
else if(document.myForm.username.value=="")
{
alert ("Enter your Username!");
valid=false;
}
else if(atpos<1 || dotpos<atpos+2 || dotpos+2>x.length)
{
alert("email id is not valid!");
return false;
}
else if(document.myForm.password.value=="")
{
alert("Enter Password!");
valid=false;
}
else if(document.myForm.cpassword.value=="")
{
alert("Enter confirm Password!");
valid=false;
}
else if(document.myForm.password.value != document.myForm.cpassword.value)
{
alert("Password do not match!");
valid=false;
}
else if((document.myForm.gender[0].checked==false)&&(document.myForm.gender[1].checked==false))
{
alert("Select your gender!");
valid=false;
}
else if(document.myForm.place.value=="")
{
alert("Answer Security Question1!");
valid=false;
}
else if(document.myForm.person.value=="")
{
alert("Answer Security Question2!");
valid=false;
}


return valid;

}

function check1(str)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("emailcheck").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","checkemail.php?email="+str,true);
xmlhttp.send();
}

function check(str)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("usernamecheck").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","checkusername.php?username="+str,true);
xmlhttp.send();
}
</script>

<br>
<table width=100%>
<tr><td bgcolor=#E8EEFA>&nbsp&nbsp<font size=6> Create an account</font></td></tr>
</table>

<br>
<br>
<font size=2 face="Verdana" color="black">&nbsp&nbsp&nbsp;If you already have an account then <a href="chirkut.php">login</a> here.</font>

<br>
<br>

<font size=4 face="Arial, sans-serif" color=#3366cc >&nbsp&nbsp Required information for StudentWorld account</font>
<br><br>
<form action="insval.php" method="POST" name="myForm" onsubmit ="return validate_form()">
<font size="4">Account Information</font><hr>
<table width="100%">

<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> First Name: </b></td><td><input type="text" name="fname"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Last Name: </b></td><td><input type="text" name="lname"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Username: </b></td><td><input type="text" name="username" onblur="check(this.value)"></input>
<div id="usernamecheck"></div></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Your e-mail: </b></td><td><input type="text" name="email" onblur="check1(this.value)" onsubmit="echeck();"></input>
<div id="emailcheck"></div></td></tr>
</tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Choose a Password: </b></td><td><input type="password" name="password"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Confirm Password: </b></td><td><input type="password" name="cpassword"></input></td></tr>

<tr>
<td><br></td><td><br></td></tr></table><br>
<font size="4">Personal Information</font>
<hr>
<table width="100%">
<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> I am: </b></td><td>
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
</td>
<tr>
<td><br></td><td><br></td></tr>

<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Birthday: </b></td><td>Day : 
<select name="dd">
<?php
for($i=1;$i<32;$i++)
{
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>

&nbsp;&nbsp; Month : 
<select name="mm">
<?php
for($i=1;$i<13;$i++)
{
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select>

&nbsp;&nbsp; Year : 
<select name="yy">
<?php
for($i=1995;$i>1900;$i--)
{
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
?>
</select></td></tr>
<tr>
<td><br></td><td><br></td></tr>

<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Country: </b></td><td><input type="text" name="country"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>


<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> City: </b></td><td><input type="text" name="city"></input></td></tr>

</table>
<br><Br>
<font size="4">Security Questions</font><hr>

<table>
<tr>
<td width=50% bgcolor=#E8EEFA>&nbsp&nbsp<b> What is name of your favourite place? </b></td><td><input type="text" name="place"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>

<tr>
<td width=50% bgcolor=#E8EEFA>&nbsp&nbsp<b> Who is your favourite sport person? </b></td><td><input type="text" name="person"></input></td></tr>

<tr>
<td><br></td><td><br></td></tr>
<tr>
<td><br></td><td><input type=Submit value="Create my account" ></input>&nbsp<input type="Reset"></input>
</td></tr>

</form></table>
</body>
</html>