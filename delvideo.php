<?php
session_start();
$username= $_SESSION['username'];  

$vid=$_GET['vid'];
//echo $aid;

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("irkut", $con);
mysql_query("DELETE FROM video WHERE vid='".$vid."' ");


mysql_close($con);
header ("Location: video.php?q_username=$username");
?>
