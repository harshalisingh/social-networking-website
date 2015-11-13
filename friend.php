<html>
<head>
<title>Friends</title>
</head>
<body>
<?php
session_start();
require_once "use.php";
?>
<table width=100% style="padding-top:15px;">
<tr>
<td width=15% valign="top"> 
<table valign="top" width=100%>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$q_username= $_GET['q_username'];
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

$q_username= $_GET['q_username'];
$username= $_SESSION['username'];  
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
<center>Friends</center>
</div>
</div>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);


$query = "SELECT * FROM friends ".
            "WHERE username = \"$q_username\" ";

$result = mysql_query($query, $con);

while($row = mysql_fetch_array($result))

  {
$query1 = "SELECT * FROM validate ".
            "WHERE username = \"$row[friendname]\" ";

$result1 = mysql_query($query1, $con);

while($row1 = mysql_fetch_array($result1))
{
$fname=$row1[fname];
$lname=$row1[lname];
}

echo "<tr><td><p align =center> </font><a href='ShowProfile.php?q_username=$row[friendname]' style='background-color:#fff;'><font face=Garamond color=#0066B3><b>$fname &nbsp; $lname</b></a></p></td></tr>";
  }

mysql_close($con);
?>

</td</tr>

</table>
</td>
<?php
//echo "<td width=0% ></td>";
echo "<td width=75% valign='top'>";
echo "<table width=100% style='border-bottom: solid 1px #C0C0C0;'><tr><td width=35% bgcolor=#BCCDE9><font face=arial color=black size=6>$q_username > Friends </font></td><td width=45%></td><td width=20%>";
if($username==$q_username)
{
echo "<a href='searchfriend.php?q_username=$q_username' style='border: 2px outset;padding: 2px; text-decoration: none;background-color:#E8EEFA;'><font face=Garamond color=black>Search new friends</font></a></td>";
}
echo "</td></tr></table>";
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
$query = "SELECT friendname FROM friends ".
            "WHERE username = \"$q_username\" ";

$result = mysql_query($query, $con);
echo "<br><table width=100%  cellpadding=15 FRAME=BOX RULES=ROWS Bordercolor=#C0C0C0 style='border-left : 1px solid #fff;border-top : 1px solid #fff;border-right : 1px solid #fff;'>";
while($row = mysql_fetch_array($result))
  {
   $picadd="";
   $frname=$row[friendname];

  $query1 = "SELECT picadd FROM profilepic ".
            "WHERE username = \"$frname\" ";
  
  $result1 = mysql_query($query1, $con);

  while($row1 = mysql_fetch_array($result1))
  {
   $picadd=$row1[picadd];
  }
  echo "<tr><td width=20% align=left><a href='showprofile.php?q_username=$frname' style='background-color:#fff;color:#fff;'><img src='profile/$picadd' height=100 width=75> </td><td width=10%></td><td width=10% valign=top><a href='showprofile.php?q_username=$frname' style='background-color:#fff;'><font size=4 face=verdana color=#0066B3>$frname</font></td><td width=60%></td></tr>";
  
  }


?>
</table>
</td>
</tr>
</table>
</body>
</table>
