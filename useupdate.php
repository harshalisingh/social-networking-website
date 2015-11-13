<table valign="top" width=100% bgcolor=#efefef FRAME=BOX RULES=ROWS Bordercolor=#C0C0C0 style="padding-right:5ex;border-left : 1px solid #fff;border-top : 1px solid #fff;border-right : 1px solid #fff;">
<?php
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
$username=$_SESSION['username'];



$query ="SELECT * FROM statupdate WHERE susername = \"$username\" OR".
" susername IN (SELECT friendname FROM friends ".
            "WHERE username = \"$username\" ) order by sid desc";
//echo $query;

$result = mysql_query($query, $con);

$i=0;
$min=1;
$hr=1;
$day=1;
while($row = mysql_fetch_array($result))
  {
   $i=$i+1;
  $picadd="";
  $query1 = "SELECT picadd FROM profilepic ".
            "WHERE username = \"$row[susername]\" ";

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

  echo "<tr><td width=10% style='padding-bottom:3ex;padding-top:3ex;'><a href='ShowProfile.php?q_username=$row[susername]' style=background:#fff;text-align:left;color:#fff><img src='profile/$picadd' width=80%></a></td><td width=80%  align=left style='padding-bottom:3ex;padding-top:3ex;'><a href='ShowProfile.php?q_username=$row[susername]' style=background:#efefef;text-align:left;><font face=calibri color=#0066B3>$row[susername]</a></font>";
  
 
  echo "<font face=TrebuchetMS color=black style=background-color:#efefef;>$row[sname]</br><font face=garamond color=#686868 size=2>$msg</font></td><td width=10%>";
   if($username==$row[susername])
  {
   echo "<a href='delstatus.php?sid=$row[sid]' style='border: 2px outset;padding: 1px; text-decoration: none;background-color:#fff;'><font face=arial size=2 color=black>Delete</font></a>";
  }   
echo "</td></tr>";
if($i==40)
{
break;
}
}

mysql_close($con);
?>
</table>