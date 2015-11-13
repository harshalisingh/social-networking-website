<?php
session_start();
$aid= $_GET['aid'];
$pid= $_GET['pid'];
$username= $_SESSION['username'];   
//echo $aid;   
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

mysql_query("DELETE FROM photos WHERE aid='".$aid."' and pid='".$pid."' ");

mysql_close($con);
header ("Location: photoalbum.php?aid=$aid");

?>