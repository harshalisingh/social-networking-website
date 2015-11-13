<html>
<body>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$result = mysql_query("SELECT * FROM comment");

while($row = mysql_fetch_array($result))
  {
  echo $row['sent_from'] . " " . $row['message'];
  echo "<br>";
  }

mysql_close($con);
?>
</body>
</html> 