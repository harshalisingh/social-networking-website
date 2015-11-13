<html>
<body>
<?php
session_start();
require_once "use.php";
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$username=$_SESSION['username'];
$query = "SELECT picadd FROM profilepic ".
            "WHERE username = \"$username\" ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $picadd = $row[picadd];
}
?>
<center><br><br><br><table bgcolor=#BCCDE9><tr><td><font face=Garamond color=black size=6> Upload your new photo </font></td></tr></table>
<br><br>
<center><img src="profile/<?php echo $picadd;?>" height=20% width=10%></center>
<br><br>
<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Image:</label>
<input type="file" name="file" id="file" />
<br />
<br><br>
<input type="submit" name="submit" value="Submit" />
</form>


</body>
</html> 