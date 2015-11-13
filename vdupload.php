<html>
<head>
<title>Upload video</title>
</head>
<body>
<?php
session_start();
require_once "use.php";
echo "<center><br><br><br><table bgcolor=#BCCDE9><tr><td><font face=Garamond color=black size=6> Upload Your video </font></td></tr></table><br><br>";

$q_username= $_GET['q_username'];
$username= $_SESSION['username']; 
//echo $q_username;
?>

<form action="vdconfirm.php" method="POST" enctype="multipart/form-data">
<center>
<table width=40% align=center>

<tr>
<td  bgcolor=#E8EEFA>&nbsp&nbsp<b> Video Name: </b></td><td><input type="text" name="vname"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td bgcolor=#E8EEFA>&nbsp&nbsp<b> Video description: </b></td><td><input type="text" name="dname"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td  bgcolor=#E8EEFA>&nbsp&nbsp<b> Upload Video: </b></td><td>
<input type="file" name="file" id="file" />
<br /></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<td><br></td><td><input type=Submit value="Confirm"></input>&nbsp<input type="Reset" value="cancel"></input>
</td></tr>

</form></table></center>
</body>
</html>
