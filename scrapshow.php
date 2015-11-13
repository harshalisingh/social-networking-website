<html>
<body>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$result = mysql_query("SELECT * FROM scrap");

while($row = mysql_fetch_array($result))
  {
  echo $row['send_to'] . " " . $row['message']. " " .$row['sent_from'];
  echo "<br>";
  }

mysql_close($con);
?>
</body>
</html> 