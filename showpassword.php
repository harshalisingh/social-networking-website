<html>
<body>

<?php
session_start();

$username = $_SESSION['username'];
?>
<form method="post" action="changepw.php" name="myForm" onsubmit ="return validate_form()">
<table width=60% align="center">
<tr>
<td width=30% bgcolor=#E8EEFA>&nbsp&nbsp<b> Old Password: </b></td><td><input type="password" name="opassword"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td width=30% bgcolor=#E8EEFA>&nbsp&nbsp<b> New Password: </b></td><td><input type="password" name="npassword"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td width=30% bgcolor=#E8EEFA>&nbsp&nbsp<b> Confirm Password: </b></td><td><input type="password" name="cpassword"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td><br></td><td><input type=Submit value="Save"></input>&nbsp<input type="Reset" value="cancel"></input>
</td></tr>

</form>
</table>
</body>
</html>