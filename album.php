<html>
<head>
<title>Create album</title>
</head>
<body>
<?php
session_start();
require_once "use.php";
echo "<center><br><br><br><table bgcolor=#BCCDE9><tr><td><font face=Garamond color=black size=6> Create Your Album </font></td></tr></table><br><br>";

$q_username= $_GET['q_username'];
$username= $_SESSION['username']; 
//echo $q_username;
?>

<form action="alconfirm.php" method="POST" enctype="multipart/form-data">
<center>
<table width=40% align=center>

<tr>
<td  bgcolor=#E8EEFA>&nbsp&nbsp<b> Album Name: </b></td><td><input type="text" name="aname"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td bgcolor=#E8EEFA>&nbsp&nbsp<b> Album description: </b></td><td><input type="text" name="dname"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td  bgcolor=#E8EEFA>&nbsp&nbsp<b> Upload Photo: </b></td><td>
<input type="file" name="file" id="file" />
<br /></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<td><br></td><td><input type=Submit value="Confirm"></input>&nbsp<input type="Reset" value="cancel"></input>
</td></tr>

</form></table></center>
</body>
</html>
