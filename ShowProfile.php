<html>
<head>
<title>Profile</title>
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
<td width=75% valign="top">


<?php

$q_username= $_GET['q_username'];
$username= $_SESSION['username'];            
echo "<table width=100% valign='top'><tr><td width=35% bgcolor=#BCCDE9><font face=Garamond color=black size=6> Profile of $q_username </font></td>";

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
$flag="false";
$temp="false";

 
$query = "SELECT username FROM friendreq ".
            "WHERE reqname = \"$username\" ";
$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $username = $row[username];
  if (strcasecmp($q_username,$username)==0) 
  {
   $temp="true";
  }
}


$query = "SELECT friendname FROM friends ".
            "WHERE username = \"$username\" ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $friendname = $row[friendname];
  if (strcasecmp($q_username,$friendname)==0) 
  {
   $flag="true";
  }
}

if($temp=="true")
{

echo "<td width=30% align=right><font face=Garamond color=#660000>Waiting friend confirmation</font></td>";
echo "";
echo "<td width=35%> </td></tr>";
}
else
{
if(strcasecmp($q_username,$_SESSION['username'])==0)
{
echo "<td width=50%></td>";
echo "<td width=15%><a href='editprofile.php?q_username=$q_username' style='border: 2px outset;padding: 2px; text-decoration: none;background-color:#E8EEFA;'><font face=Garamond color=black>Edit Profile</font></a></td></tr>";
}
else
{
if (strcasecmp($q_username,$username)!=0 && $flag=="false") 
{
echo "<td width=50%></td>";
echo "<td width=15% align=right><a href='addfriend.php?q_username=$q_username' style='border: 2px outset;padding: 2px; text-decoration: none;background-color:#E8EEFA;'><font face=Garamond color=black>Add as friend</font></a></td>";
echo "";
}
else
{
echo "<td width=50%></td>";
echo "<td width=15%><a href='unfriend.php?q_username=$q_username' style='background-color:#fff;'><font face=Garamond color=#0066B3>Unfriend</a></td></tr>";
}
}
}
echo "</table><br><br>";

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$query = "SELECT * FROM validate ".
            "WHERE username = \"$q_username\" ";

$result = mysql_query($query, $con);

echo '<table width=100% valign="top" bgcolor=#efefef style="border-bottom: solid 1px #C0C0C0;">';


echo "<tr><td width=100% align=left><b>Basic information</b></td></tr></table>";

//echo "<table width=100%><tr><td width=100%></td></tr><tr></tr></table>";
echo "<table width=100%  bordercolor=white bgcolor=#FFFFEE>";

while($row = mysql_fetch_array($result))
  {
	  $username = $row['username'];
	  $fname = $row['fname'];
	  $lname = $row['lname'];
	  $country =$row['country'];
	  $city = $row['city'];
          $dd = $row['dd'];
          $mm = $row['mm']; 
          $yy = $row['yy']; 
          $gender = $row['gender'];
          $email = $row['email'];
        
        
	echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr><td width=20% align=center bgcolor=#FFFFEE><b>First Name</b></td><td>:</td><td>$fname</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
	echo "<tr><td width=20% align=center bgcolor=#FFFFEE><b>Last Name</b></td><td>:</td><td>$lname</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
	echo "<tr><td width=20% align=center bgcolor=#FFFFEE><b>Country</b></td><td>:</td><td>$country</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
	echo "<tr><td width=20% align=center bgcolor=#FFFFEE><b>City</b></td><td>:</td><td>$city</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
        echo "<tr><td width=20% align=center bgcolor=#FFFFEE><b>Date of Birth:</b></td><td>:</td><td>$dd/$mm/$yy</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
        echo "<tr><td width=20% align=center bgcolor=#FFFFEE><b>I am:</b></td><td>:</td><td>$gender</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
        echo "<tr><td width=20% align=center bgcolor=#FFFFEE><b>E-mail</b></td><td>:</td><td>$email</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
  }


echo "</table><br><br>";

$query = "SELECT * FROM profile ".
            "WHERE username = \"$q_username\" ";

$result = mysql_query($query, $con);

echo '<table width=100% valign="top" bgcolor=#efefef style="border-bottom: solid 1px #C0C0C0;">';


echo "<tr><td width=100% align=left><b>Educational information</b></td></tr></table>";

//echo "<table width=100%><tr><td width=100%></td></tr><tr></tr></table>";
echo "<table width=100%  bordercolor=white bgcolor=#FFFFEE>";

while($row = mysql_fetch_array($result))
  {
	  $username = $row['username'];
	  $school = $row['school'];
	  $college = $row['college'];
	  $gcoll =$row['gcoll'];
	  $mobile = $row['mobile'];
          $status = $row['status'];
          $you = $row['you']; 
                  
        
	echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr><td width=20% align=center bgcolor=#FFFFEE><b>School</b></td><td>:</td><td>$school</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
	echo "<tr><td width=20% align=center bgcolor=#FFFFEE><b>High School</b></td><td>:</td><td>$college</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
	echo "<tr><td width=20% align=center bgcolor=#FFFFEE><b>College</b></td><td>:</td><td>$gcoll</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";

echo "</table><br><br>";

echo '<table width=100% valign="top" bgcolor=#efefef style="border-bottom: solid 1px #C0C0C0;">';


echo "<tr><td width=100% align=left><b>Personal information</b></td></tr></table>";

//echo "<table width=100%><tr><td width=100%></td></tr><tr></tr></table>";
echo "<table width=100%  bordercolor=white bgcolor=#FFFFEE>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr><td width=20% align=center bgcolor=#FFFFEE><b>Mobile No.</b></td><td>:</td><td>$mobile</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td width=20% align=center bgcolor=#FFFFEE><b>Relationship Status</b></td><td>:</td><td>$status</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td width=20% align=center bgcolor=#FFFFEE><b>About me</b></td><td>:</td><td>$you</td></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
echo "</table>";	
  }

?>
<br><br><br><br><br><br><br><br>
</td>
</tr>
</table>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>

</body>
</html> 