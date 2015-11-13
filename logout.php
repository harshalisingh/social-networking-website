<?php
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$username=$_SESSION['username'];

mysql_query("UPDATE validate SET flag = 'OFF'
WHERE username='".$username."' ");

mysql_query("DELETE FROM chat WHERE from='".$username."'");

session_destroy();

header ("Location: chirkut.php");
?>