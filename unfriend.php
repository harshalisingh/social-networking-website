<?php
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$q_username= $_GET['q_username'];
$username= $_SESSION['username'];  

mysql_query("DELETE from friends WHERE username = '".$username."' AND friendname = '".$q_username."' ");

mysql_query("DELETE from friends WHERE friendname = '".$username."' AND username = '".$q_username.'" ");
mysql_close($con);
header ("Location: showprofile.php?q_username=$q_username");
?>