<?php

$uname = $_POST['uname'];
$ename = $_POST['ename'];

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$query = "SELECT * FROM validate ".
            "WHERE username = \"$uname\" OR email= \"$ename\" ";

$result = mysql_query($query, $con);

if (mysql_num_rows($result)==0)        
       header ("Location: Accessdenied.php");

else
{
header ("Location: inspass.php?uname=$uname & ename=$ename");
}
?>