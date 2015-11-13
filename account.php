<html>
<head>
<script type="text/javascript">

function validate1_form()
{
if(document.myForm1.nusername.value=="")
{
alert("Username cant be blank!");
valid=false;
}
 return valid;

}


function validate_form()
{
if(document.myForm.opassword.value=="")
{
alert("Enter old Password!");
valid=false;
}
else if(document.myForm.npassword.value=="")
{
alert("Enter new Password!");
valid=false;
}
else if(document.myForm.cpassword.value=="")
{
alert("Enter confirm Password!");
valid=false;
}
else if(document.myForm.npassword.value != document.myForm.cpassword.value)
{
alert("Password do not match!");
valid=false;
}
return valid;

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

function showpass()
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
    document.getElementById("passdisplay").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","showpassword.php",true);
xmlhttp.send();
}

function showname()
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
    document.getElementById("namedisplay").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","showusername.php",true);
xmlhttp.send();
}


</script>

<title>Profile</title>
<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->

</head>
<body>
<?php
session_start();
require_once "use.php";
?>
<br>
<table align='center'><tr><td  bgcolor=#BCCDE9><font face=Garamond color=black size=6> Account Setting </font></td></tr>
</table>
<br><br>
<table width=60% align="center" bgcolor=#efefef style="border-bottom: solid 1px #C0C0C0;">
<tr><td width=80% align=left><b>Change Username</b></td><td width=20 align=right><input type=button onClick="showname()" value="change"></td></tr></table>
<br>
<div id="namedisplay"></div></td></tr>

</table>
<br>
<table width=60% align="center" bgcolor=#efefef style="border-bottom: solid 1px #C0C0C0;">
<tr><td width=80% align=left><b>Change Password</b></td><td width=20 align=right><input type=button onClick="showpass()" value="change"></td></tr></table>
<br>
<div id="passdisplay"></div></td></tr>
<br><br>
<table align='center'><tr><td><a href='delaccount.php' style='border: 2px outset;padding: 2px; text-decoration: none;background-color:#E8EEFA;'><font face=Garamond color=black>Delete Account</font></a></td></tr>
</table>
</body>
</html>