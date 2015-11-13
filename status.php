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
$username=$_SESSION['username'];
$mstatus=$_POST['mstatus'];


$query = "SELECT flag FROM counter ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $flag = $row[flag];
}

$flag=$flag+1;

mysql_close($con);
?>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
//echo $username;
//echo $mstatus;
//echo $flag;
mysql_select_db("irkut", $con);
$t=time();
mysql_query("INSERT INTO statupdate (sid, susername, sname,time)
VALUES ('$flag','".$username."','".$mstatus."','".$t."')");

mysql_query("UPDATE counter SET flag = '$flag'");

mysql_close($con);
require_once "Loginsuccessful.php";
?>
</body>
</html>