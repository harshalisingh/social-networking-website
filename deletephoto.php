<?php
session_start();
$username= $_SESSION['username'];  

$aid=$_GET['aid'];
//echo $aid;

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("irkut", $con);
mysql_query("DELETE FROM album WHERE aid='".$aid."' ");
mysql_query("DELETE FROM photos WHERE aid='".$aid."' ");

mysql_close($con);
header ("Location: photo.php?q_username=$username");
?>
