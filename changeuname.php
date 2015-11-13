<?php
session_start();

$username = $_SESSION['username'];
$nusername = $_POST['nusername'];

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("irkut", $con);

mysql_query("UPDATE album SET username = '".$nusername."'
WHERE username = '".$username."' ");

mysql_query("UPDATE friendreq SET username = '".$nusername."' 
WHERE username = '".$username."' ");

mysql_query("UPDATE friendreq SET reqname = '".$nusername."'
WHERE reqname = '".$username."' ");

mysql_query("UPDATE friends SET username = '".$nusername."'
WHERE username = '".$username."' ");

mysql_query("UPDATE friends SET friendname = '".$nusername."'
WHERE friendname = '".$username."' ");

mysql_query("UPDATE profile SET username = '".$nusername."'
WHERE username = '".$username."' ");

mysql_query("UPDATE profilepic SET username = '".$nusername."'
WHERE username = '".$username."' ");

mysql_query("UPDATE scrap SET send_to = '".$nusername."'
WHERE send_to = '".$username."' ");

mysql_query("UPDATE scrap SET sent_from = '".$nusername."'
WHERE sent_from = '".$username."' ");

mysql_query("UPDATE statupdate SET susername = '".$nusername."'
WHERE susername = '".$username."' ");

mysql_query("UPDATE video SET username = '".$nusername."'
WHERE username = '".$username."' ");

mysql_query("UPDATE validate SET username = '".$nusername."'
WHERE username = '".$username."' ");

mysql_close($con);
header ("Location: login1.php?nusername=$nusername");
?>