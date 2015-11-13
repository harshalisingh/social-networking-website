<?php
session_start();

$username = $_SESSION['username'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("irkut", $con);

mysql_query("Delete from album WHERE username = '".$username."' ");

mysql_query("DELETE from friendreq WHERE username = '".$username."' ");

mysql_query("DELETE from friendreq WHERE reqname = '".$username."' ");

mysql_query("DELETE from friends WHERE username = '".$username."' ");

mysql_query("DELETE from friends WHERE friendname = '".$username."' ");

mysql_query("DELETE from profile WHERE username = '".$username."' ");

mysql_query("DELETE from profilepic WHERE username = '".$username."' ");

mysql_query("DELETE from statupdate WHERE susername = '".$username."' ");

mysql_query("DELETE from video SET WHERE username = '".$username."' ");

mysql_query("DELETE from validate WHERE username = '".$username."' ");

mysql_close($con);
header ("Location: logout.php");
?>