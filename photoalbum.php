<html>
<head>
<title>Photos</title>
</head>
<body>
<?php
session_start();
$aid= $_GET['aid'];
$username= $_SESSION['username'];   
//echo $aid;   
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$result = mysql_query("SELECT * FROM album where aid='".$aid."' ");
while($row = mysql_fetch_array($result))
{
$pusername = $row[username];
$alname= $row[alname];
$alface= $row[alface];
$date=$row[date];

}      
require_once "use2.php";


echo "<td width=75% valign='top'>";

echo "<table width=100% style='border-bottom: solid 1px #C0C0C0;'><tr><td width=35% bgcolor=#BCCDE9><font face=arial color=black size=6>$pusername > Photos </font></td><td width=45%></td>";
if(strcasecmp($pusername,$username)==0)
{
echo "<td width=20% align=right><a href='albumphoto.php?aid=$aid' style='border: 2px outset;padding: 2px; text-decoration: none;background-color:#E8EEFA;'><font face=Garamond color=black>Upload more Photos</font></a></td></tr></table>";
}
else
{
echo "<td width=20%></td></tr></table>";
}
echo "<br><table width=100%>";
echo "<tr><td bgcolor=#efefef width=100%> <b><font face=verdana size=2> $alname 's photos </font><b></td></tr></table>"; 

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$result = mysql_query("SELECT * FROM photos where aid = '".$aid."' ");

echo "<br><table width=100%  cellpadding=10><tr> ";
$i=0;
while($row = mysql_fetch_array($result))
  {
  $i=$i+1;
  echo "<td width=25%><a href='photodisplay.php?pid=$row[pid] & aid=$aid' style='background-color:#fff;color:#fff;'><img src='album/$row[photoadd]' height=45% width=55%><font face=verdana size=2 color=black><br>$row[date]<br></font>";
if(strcasecmp($pusername,$username)==0)
{
echo "<a href='delphotos.php?aid=$aid & pid=$row[pid]' style='background-color:#fff;'><font face=Garamond color=#0066B3 size=2><br>Delete</font></a></td>";
 //echo $row[date]."<br>";
}
  if($i==4)
    {
     $i=0;
     echo "</tr><tr><td></td></tr><tr>";
    }
  }


?>
</td></tr>
</table>
</body>
</html>