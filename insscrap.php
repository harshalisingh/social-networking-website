
<html>
<body>
<?php
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("irkut", $con);

 $username = $_SESSION['username'];
 $to = $_POST['to'];
 $message = $_POST['message'];
 $t=time();

$sql="INSERT INTO scrap (send_to,message,sent_from ,time) VALUES ('$to','$message','$username','$t')";



if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
mysql_close($con);

header ("Location: ShowProfile.php?q_username=$to");
?>
?>
</body>
</html> 