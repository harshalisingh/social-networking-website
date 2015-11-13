<html>
<body>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create table
mysql_select_db("irkut", $con);
$sql = "CREATE TABLE comment
(
sent_from varchar(15) NOT NULL,
message varchar(160) NOT NULL
)"
;

// Execute query
mysql_query($sql,$con);
echo "table created";



mysql_close($con);
?>
</body>
</html> 