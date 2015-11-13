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
$username= $_SESSION['username'];
$q_username= $_GET['q_username'];

mysql_query("INSERT INTO friendreq (username, reqname)
VALUES ('".$q_username."','".$_SESSION['username']."')");
mysql_close($con);

require_once "ShowProfile.php"; 
?>
<script type="text/javascript">
alert("Friend request sent!");
</script>
</body>
</html>