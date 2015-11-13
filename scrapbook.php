<html>
<body>
<?php
session_start();
require_once "use.php";
?>

<br>
<br>

<table  bgcolor=#BCCDE9>
<tr><td>
<font face="Garamond" color="black" size="6"> Messages for You </font></td></tr>
</table>
<br>
<br>

<table width=100% valign="top"  FRAME=BOX RULES=ROWS Bordercolor=#C0C0C0 style="padding-right:5ex;border-left : 1px solid #fff;border-top : 1px solid #fff;border-right : 1px solid #fff;">

<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$username = $_SESSION['username'];
$query = "SELECT * FROM scrap ".
            "WHERE send_to = \"$username\" ";

$result = mysql_query($query, $con);
            

while($row = mysql_fetch_array($result))
  {
  //echo "<tr><td align=center height=15%>$row[sent_from]</td><td bgcolor=#D4DDED></td><td align=center height=15%>$row[message]</td></tr>";
  $picadd="";
  $query1 = "SELECT picadd FROM profilepic ".
            "WHERE username = \"$row[sent_from]\" ";

  $t=time();
  $tm=$t-$row[time];  
  $sec=$tm%60;
  $min=floor($tm/60);
  $hr=floor($min/60);
  $day=floor($hr/24);
  if($day>1)
  {
   $msg="$day days ago";
  }
  else
  {
  if($hr>0)
  {
   $msg="$hr hours ago";
  }
  else
  {
   if($min>0)
     {
      $msg="$min minutes ago";
     }
    else
     {
      $msg="$sec seconds ago";
     }
  }
  }
  $result1 = mysql_query($query1, $con);
  while($row1 = mysql_fetch_array($result1))
  {
  $picadd = $row1[picadd];
  
  }

  echo "<tr><td width=10% style='padding-bottom:3ex;padding-top:3ex;'><a href='ShowProfile.php?q_username=$row[sent_from]' style=background:#fff;text-align:left;color:#fff><img src='profile/$picadd' width=80%></a></td><td width=70%  align=left style='padding-bottom:3ex;padding-top:3ex;'><a href='ShowProfile.php?q_username=$row[sent_from]' style=background:#fff;text-align:left;><font face=calibri color=#0066B3>$row[sent_from]</a></font>";
  
 
  echo "<font face=TrebuchetMS color=black style=background-color:#fff;>$row[message]</br><font face=garamond color=#686868 size=2>$msg</font></td><td width=20%>";
 echo "</td></tr>";
}

mysql_close($con);
?>

</table>
</body>
</html> 