<?php
session_start();

$username = $_SESSION['username'];


$ename = $_GET['ename'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
//echo $ename;
//echo $username;

$query = "select username from validate WHERE email = '".$ename."' ";
//echo $query;           

$result = mysql_query($query, $con);
echo "<br><table width=100%  cellpadding=15 FRAME=BOX RULES=ROWS Bordercolor=#C0C0C0 style='border-left : 1px solid #fff;border-top : 1px solid #fff;border-right : 1px solid #fff;'>";
while($row = mysql_fetch_array($result))
  {
   $picadd="";
   $tusername=$row[username];
  // echo $tusername;

  $query1 = "SELECT picadd FROM profilepic ".
            "WHERE username = \"$tusername\" ";
  
  $result1 = mysql_query($query1, $con);

  while($row1 = mysql_fetch_array($result1))
  {
   $picadd=$row1[picadd];
  }
  echo "<tr><td width=20% align=left><a href='showprofile.php?q_username=$tusername' style='background-color:#fff;color:#fff;'><img src='profile/$picadd' height=100 width=75> </td><td width=5%></td><td width=10% valign=top><a href='showprofile.php?q_username=$tusername' style='background-color:#fff;'><font size=4 face=verdana color=#0066B3>$tusername</font></td><td width=65%></td></tr>";
  
  }
echo "</table>";

?>

