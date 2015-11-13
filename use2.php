<html>
<head>
<title></title>
</head>
<body>
<?php
session_start();
require_once "use.php";
?>
<table width=100% style="padding-top:15px;">
<tr>
<td width=15% valign="top" width=100%> 
<table>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$q_username= $_GET['q_username'];
$query = "SELECT picadd FROM profilepic ".
            "WHERE username = \"$pusername\" ";

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
echo "<tr><td bgcolor=#BCCDE9><a href='photo.php?q_username=$pusername'> Photos </a></td></tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td bgcolor=#BCCDE9><a href='video.php?q_username=$pusername'> Videos </a></td></tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr>";

echo "<tr><td bgcolor=#BCCDE9><a href='friend.php?q_username=$pusername'> Friends </a></td></tr>";
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
            "WHERE username = \"$pusername\" ";

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
</tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
</td</tr>

</table>
</td>

