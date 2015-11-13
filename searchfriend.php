<html>
<head>
<title>Friends</title>
<script type="text/javascript">
function searchfname(str)
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
    document.getElementById("searchresult").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","searchnm.php?fname="+str,true);
xmlhttp.send();
}

function searchlname(str)
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
    document.getElementById("searchresult").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","searchnm.php?lname="+str,true);
xmlhttp.send();
}

function searchusername(str)
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
    document.getElementById("searchuresult").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","searchunm.php?uname="+str,true);
xmlhttp.send();
}

function searchemail(str)
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
    document.getElementById("searcheresult").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","searchmail.php?ename="+str,true);
xmlhttp.send();
}


</script>
</head>
<body>
<?php
session_start();
require_once "use.php";
?>
<table style="padding-top:15px;">
<tr>
<td width=15% valign="top"> 
<table valign="top">
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
$username= $_SESSION['username'];  

$q_username=$username;
$query = "SELECT picadd FROM profilepic ".
            "WHERE username = \"$q_username\" ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $picadd = $row[picadd];
}

?>
<tr><td><img src="profile/<?php echo $picadd;?>" width="100%" height="100%" ></td></tr>

<tr></tr><tr></tr><tr></tr><tr></tr>
<?php


if($q_username==$_SESSION['username'])
{  
echo "<tr><td bgcolor=#BCCDE9><a href='scrapbook.php'> Message </a></td></tr>";
}
else
{
echo "<tr><td bgcolor=#BCCDE9><a href='sendscrap.php?q_username=$q_username'>Send Message </a></td></tr>";
}

echo "<tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td bgcolor=#BCCDE9><a href='photo.php?q_username=$q_username'> Photos </a></td></tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td bgcolor=#BCCDE9><a href='video.php?q_username=$q_username'> Videos </a></td></tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr>";

echo "<tr><td bgcolor=#BCCDE9><a href='friend.php?q_username=$q_username'> Friends </a></td></tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td>";
?>
<div id="content">
<div id="right">
<center> StudentWorld Users</center>
</div>
</div>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);


$result = mysql_query("SELECT * FROM validate");

$i=0;
while($row = mysql_fetch_array($result))
  {
  $i++;
  
  echo "<tr><td><p align =center> <a href='ShowProfile.php?q_username=$row[username]' style='background-color:#fff;'><font face=Garamond color=#0066B3><b>$row[fname] $row[lname]</b></a></p></td></tr>";
  if($i==25)
   { 

    echo "<tr><td ><p align=center><font face=verdana size=2 color=#B11E89> Search for more</font></p></td></tr>";
   break;
   }  
}

mysql_close($con);
?>

</td</tr>

</table>
</td>

<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
mysql_query("INSERT INTO search (username, fname, lname)
VALUES ('".$username."', 'null', 'null')");

mysql_query("UPDATE search SET fname = 'null', lname = 'null'
WHERE username = '".$username."' ");


mysql_close($con);


//echo "<td width=0% ></td>";
echo "<td width=75% valign='top'>";
echo "<table width=100% style='border-bottom: solid 1px #C0C0C0;'><tr><td width=35% bgcolor=#BCCDE9><font face=arial color=black size=6>Search Friends </font></td><td width=70%></td></tr></table>";
echo "<br><table width=100%>";

echo "<tr><td bgcolor=#efefef width=100%> <b><font face=verdana size=3> Search By Name </font><b></td></tr></table>"; 
//echo "<br><br><table>Enter the Name";
?>
<form>
<br>
<table width=100%  style="padding-bottom:15;">
<tr><td width=10%></td>
<td width=30%></td>
<td width=20%><font size="3" face="garamond">First Name</font></td>
<td width=20%><font size="3" face="garamond">Last Name</font></td>
<td width=10%></td></tr>
<tr><td width=10%></td>
<td width=30%><font size="5" face="garamond">Enter the Name &nbsp :</font></td>
<td width=20%><input type="text" name="fname" size="20" onblur="searchfname(this.value)"></td>
<td width=20%><input type="text" name="lname" size="20" onblur="searchlname(this.value)"></td>
<td width=10%></td></tr></table>
</form>

<div id="searchresult">

</div>
<?php

echo "<br><br><br><table width=100%>";
echo "<tr><td bgcolor=#efefef width=100%> <b><font face=verdana size=3> Search By Username </font><b></td></tr></table>"; 
?>
<form>
<br>
<table width=100%  style="padding-bottom:15;">
<tr>
<tr><td width=10%></td>
<td width=30%><font size="5" face="garamond">Enter the Username &nbsp :</font></td>
<td width=20%><input type="text" name="uname" size="20" onblur="searchusername(this.value)"></td>
<td width=10%></td></tr></table>
</form>

<div id="searchuresult">

</div>

<?php

echo "<br><br><br><table width=100%>";
echo "<tr><td bgcolor=#efefef width=100%> <b><font face=verdana size=3> Search By E-mail ID </font><b></td></tr></table>"; 
?>
<form>
<br>
<table width=100%  style="padding-bottom:15;">
<tr>
<tr><td width=10%></td>
<td width=30%><font size="5" face="garamond">Enter the E-mail Id &nbsp :</font></td>
<td width=20%><input type="text" name="ename" size="20" onblur="searchemail(this.value)"></td>
<td width=10%></td></tr></table>
</form>

<div id="searcheresult">

</div>



</td>
</tr>
</table>
</body>
</html>