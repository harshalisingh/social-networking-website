<html>
<body bgcolor=#D4DDED>

<table width=100% height=10% bgcolor="white">
<tr>
<td align=center>
<img src="chirkut5.bmp"></td></tr>
</table>
<table align=right width=40% bgcolor=#BCCDE9>
<tr>
<td align=center width=8%><a href="Loginsuccessful.php" style="text-decoration:none;"><font face="Garamond" color="black">Home</font></a></td>
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
?>
<td align=center width=8%><a href="scrapbook.php" style="text-decoration:none;"><font face="Garamond" color="black">Scrapbook</font></a></td>
<td align=center width=8%><a href="commentbook.php" style="text-decoration:none;"><font face="Garamond" color="black">Comments</font></a></td>
<td align=center width=8%><a href="logout.php" style="text-decoration:none;"><font face="Garamond" color="black">Logout</font></a></td>
</tr>
</table>
<br>
<br>

<table  bgcolor=#BCCDE9>
<tr><td>
<font face="Garamond" color="black" size="6"> Comments by Chirkut Users </font></td></tr>
</table>
<br>
<br>

<table width=100% bgcolor="#E8EEFA" bordercolor="white" border="5">
<tr>
<th width=20% align=center>Comment by</th>
<th align=center bgcolor=#D4DDED></th>
<th align=center >Comments</th>
</tr>

<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$username = $_SESSION['username'];
$query = "SELECT * FROM comment ";

$result = mysql_query($query, $con);
            

while($row = mysql_fetch_array($result))
  {
  echo "<tr><td align=center>$row[sent_from]</td><td bgcolor=#D4DDED></td><td align=center>$row[message]</td></tr>";
  }

mysql_close($con);
?>

</table>

<br>
<br>

<table bgcolor=#BCCDE9><tr><td><font face=Garamond color=black size=6> Type in your Comment</font></td></tr></table>
<br>
<br>

<form action="inscomment.php" method="POST"> 

<table>
<tr>

<td align=center width=20%><font face="Garamond" size="5">Message : &nbsp&nbsp</font>
<td align=center><textarea rows="4" cols="60" name="message"></textarea></td></tr>
<tr>
<td><br></td>
<td><br></td>
</tr>
<tr>
<td><br></td>
<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=Submit value="Share"></input>&nbsp&nbsp<input type="Reset"></input></td></tr>
</table>
</form>


</body>
</html> 