<html>
<head>
<title>Photos</title>
<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->

</head>
<body>
<?php
session_start();
require_once "use.php";
?>

<table style="padding-top:15px;" width=100%>
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

$q_username = $_GET['q_username'];

//echo $q_username;
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
<td width=75% valign="top">
<?php

$q_username= $_GET['q_username'];
$username= $_SESSION['username'];            
echo "<table width=100% style='border-bottom: solid 1px #C0C0C0;'><tr><td width=35% bgcolor=#BCCDE9><font face=arial color=black size=6>$q_username > Photos </font></td><td width=45%></td>";
if(strcasecmp($q_username,$username)==0)
{
echo "<td width=20% align=right><a href='album.php?q_username=$q_username' style='border: 2px outset;padding: 2px; text-decoration: none;background-color:#E8EEFA;'><font face=Garamond color=black>Create new album</font></a></td></tr></table>";
}
else
{
echo "<td width=20%></td></tr></table>";
}
echo "<br><table width=100%>";
echo "<tr><td bgcolor=#efefef width=100%> <b><font face=verdana size=2> Your albums </font><b></td></tr></table>"; 

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$result = mysql_query("SELECT * FROM album where username = '".$q_username."' ");

echo "<br><table width=100%  cellpadding=15 FRAME=BOX RULES=ROWS Bordercolor=#C0C0C0 style='border-left : 1px solid #fff;border-top : 1px solid #fff;border-right : 1px solid #fff;'>";
//$i=0;
while($row = mysql_fetch_array($result))
  {
  // $i=$i+1;
  $alface=$row[alface];
  echo "<tr><td width=25%><a href='photoalbum.php?aid=$row[aid]' style='background-color:#fff;color:#505050;'>"; ?> 
<img  src="album/<?php echo $alface; ?>" height=45% width=55% border=4></td> 
<?php
echo "<td width=15%></td><td width=30%><font face=verdana size=3 style='background-color:#efefef;'>Album &nbsp Description</font><font size=2 face=verdana><br><b>Album name:&nbsp</b>$row[alname]</font><font size=2 face=verdana><br><b>Description:&nbsp</b>$row[descripn] <br><b>Last modified:&nbsp</b>$row[date]<br><br></font></td><td width=10% valign=top>";
if(strcasecmp($username,$q_username)==0)
{
echo "<a href='deletephoto.php?aid=$row[aid]' style='border: 2px outset;padding: 2px; text-decoration: none;background-color:#E8EEFA;'><font face=Garamond color=black>Remove</font></a>";
}
echo "</td></tr>"; 


 //echo $row[aface]."<br>";
  /*if($i==4)
    {
     $i=0;
     echo "</tr><tr><td></td></tr><tr>";
    }*/
  }



?>
</tr></table>
</td>
</tr>
</table>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>

</body>
</html>