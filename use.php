
<head>
<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<table height=6% width=100% bgcolor=#BCCDE9>

<tr>
<td width=60% align=left><font face="courier" size=6 color="#B11E89">StudentWorld</font></td>
<td align=center width=8%><a href="Loginsuccessful.php" style=text-decoration:none;>Home</a></td>
<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("Location: invalidSession.php");
}
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
$username=$_SESSION['username'];

$query = "SELECT * FROM validate ".
            "WHERE username = \"$username\" ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  echo "<td align=center width=8%><a href='ShowProfile.php?q_username=$row[username]' style=text-decoration:none;><font face=Garamond color=black>Profile</font></a></td>";
}


//echo "<td align=center width=8%><a href='photo.php?q_username=$username' >Photos</td>";
echo "<td align=center width=8%><a href='account.php' >Account</td>";
echo "<td align=center width=8%><a href='logout.php' >Logout</a></td>";
?>
</tr>
</table>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>


