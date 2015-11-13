<?php
session_start();

$username = $_SESSION['username'];
?>
<form method="post" action="changeuname.php" name="myForm1" onsubmit ="return validate1_form()">
<table width=60% align="center">
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td width=30% bgcolor=#E8EEFA>&nbsp&nbsp<b> Username: </b></td><td><input type="text" name="nusername" onblur="check(this.value)"></input>
<div id="usernamecheck"></div></td></tr>
<tr>
<td><br></td><td><br></td></tr>

<tr>
<td><br></td><td><input type=Submit value="Save"></input>&nbsp<input type="Reset" value="cancel"></input>
</td></tr>

</form>
</table>