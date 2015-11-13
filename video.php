<html>
<head>
<title>Videos</title>
</head>
<body>
<?php
session_start();
require_once "use.php";
?>
<table width=100% style="padding-top:15px;" >
<tr>
<td width=15% valign="top"> 
<table valign="top" width=100%>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$q_username= $_GET['q_username'];
$query = "SELECT picadd FROM profilepic ".
            "WHERE username = \"$q_username\" ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $picadd = $row[picadd];
}

?>
<tr><td><img src="profile/<?php echo $picadd;?>" width="100%" height="100%" ></td></tr>

<tr></tr><tr></tr><tr></tr><tr></tr>
<?php

$q_username= $_GET['q_username'];
$username= $_SESSION['username'];  
if(strcasecmp($q_username,$_SESSION['username'])==0)
{  
echo "<tr><td bgcolor=#BCCDE9><a href='scrapbook.php'> Message </a></td></tr>";
}
else
{
echo "<tr><td bgcolor=#BCCDE9><a href='sendscrap.php?q_username=$q_username'>Send Message </a></td></tr>";
}

echo "<tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td bgcolor=#BCCDE9><a href='photo.php?q_username=$q_username'> Photos </a></td></tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td bgcolor=#BCCDE9><a href='video.php?q_username=$q_username'> Videos </a></td></tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr>";

echo "<tr><td bgcolor=#BCCDE9><a href='friend.php?q_username=$q_username'> Friends </a></td></tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td>";
?>
<div id="content">
<div id="right">
<center>Friends</center>
</div>
</div>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);


$query = "SELECT * FROM friends ".
            "WHERE username = \"$q_username\" ";

$result = mysql_query($query, $con);

while($row = mysql_fetch_array($result))

  {
$query1 = "SELECT * FROM validate ".
            "WHERE username = \"$row[friendname]\" ";

$result1 = mysql_query($query1, $con);

while($row1 = mysql_fetch_array($result1))
{
$fname=$row1[fname];
$lname=$row1[lname];
}

echo "<tr><td><p align =center> </font><a href='ShowProfile.php?q_username=$row[friendname]' style='background-color:#fff;'><font face=Garamond color=#0066B3><b>$fname &nbsp; $lname</b></a></p></td></tr>";
  }

mysql_close($con);
?>

</td</tr>

</table>
</td>
<?php
echo "<td width=75% valign='top'>";

echo "<table width=100% style='border-bottom: solid 1px #C0C0C0;'><tr><td width=35% bgcolor=#BCCDE9><font face=arial color=black size=6>$q_username > Videos </font></td><td width=45%></td>";
if(strcasecmp($q_username,$username)==0)
{
echo "<td width=20% align=right><a href='vdupload.php?q_username=$q_username' style='border: 2px outset;padding: 2px; text-decoration: none;background-color:#E8EEFA;'><font face=Garamond color=black>Upload more Videos</font></a></td></tr></table>";
}
else
{
echo "<td width=20%></td></tr></table>";
}
echo "<br><table width=100%>";
echo "<tr><td bgcolor=#efefef width=100%> <b><font face=verdana size=2> All videos </font><b></td></tr></table>"; 

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$result = mysql_query("SELECT * FROM video where username = '".$q_username."' ");

echo "<br><table width=100%  cellpadding=15 FRAME=BOX RULES=ROWS Bordercolor=#C0C0C0 style=''><tr> ";
$i=0;
while($row = mysql_fetch_array($result))
  {
  //$i=$i+1;
 
  //echo $row[vface];

?>
  <tr><td width=40%><object  type="<?php echo $row[vtype]; ?>" data="video/<?php echo $row[vface]; ?>" width="320" height="240">
  
  <param name="loop" value="false">
  <param name="AUTOSTART" value="0">
  </object></td><td width=20%></td>
<?php
  echo "<td width=30%><font face=verdana size=3 style='background-color:#efefef;'>Video &nbsp Description</font><font size=2 face=verdana><br><b>Video name:&nbsp</b>$row[vname]</font><font size=2 face=verdana><br><b>Description:&nbsp</b>$row[vdescripn] <br><b>Uploaded on:&nbsp</b>$row[date]<br><br></font></td><td width=10% valign=top>";
if(strcasecmp($username,$q_username)==0)
{
echo "<a href='delvideo.php?vid=$row[vid]' style='border: 2px outset;padding: 2px; text-decoration: none;background-color:#E8EEFA;'><font face=Garamond color=black>Remove</font></a>";
}
echo "</td></tr>";
//echo $row[date]."<br>";
  /*if($i==2)
    {
     $i=0;
     echo "</tr><tr><td></td></tr><tr>";
    }*/
  }


?>
</table>
</td></tr>
</table>
</body>
</html>