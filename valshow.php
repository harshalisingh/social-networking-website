<html>
<body>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$result = mysql_query("SELECT * FROM validate");

while($row = mysql_fetch_array($result))
  {
  echo $row['fname'] . " " . $row['lname']. " " .$row['username']. " " . $row['password'] . " " . $row['country']. " " .$row['pin'];
  echo "<br>";
  }

mysql_close($con);
?>
</body>
</html> 