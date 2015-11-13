<?php
session_start();

$username = $_SESSION['username'];

if(isset($_GET['testtype']))
{
$testtype = $_GET['testtype'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



} 
echo "<tr><td width=20% align=left><a href='testtype.php'>  </td></tr>
mysql_close($con);
echo "</table>";

//echo $fname;
//echo $lname;


?>