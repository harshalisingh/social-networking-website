<?php
session_start();
$sid= $_GET['sid'];
$username= $_SESSION['username']; 
//echo $sid;

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
mysql_query("DELETE FROM statupdate WHERE sid='".$sid."'");
mysql_close($con);
header ("Location: loginsuccessful.php");
?> 
