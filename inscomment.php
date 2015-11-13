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
 $message = $_POST['message'];
$sql="INSERT INTO comment (sent_from,message) VALUES ('$username','$message')";



if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
mysql_close($con);

header ("Location: commentbook.php");
?>
</body>
</html> 