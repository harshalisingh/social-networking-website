<html>
<head><title>New password</title>
<body bgcolor=#FFFFEE>
<script type="text/javascript">
function validate_form()
{
if(document.myForm.npassword.value=="")
{
alert("Enter Password!");
valid=false;
}
else if(document.myForm.cpassword.value=="")
{
alert("Enter confirm Password!");
valid=false;
}
else if(document.myForm.npassword.value != document.myForm.cpassword.value)
{
alert("Password do not match!");
valid=false;
}
return valid;

}
</script>
<?php
$username = $_GET['username'];
//echo $username;

echo "<center><br><br><br><table bgcolor=#BCCDE9><tr><td><font face=Garamond color=black size=6> Enter new Password !!  </font></td></tr></table>";

?>

<br>
<br>
&nbsp&nbsp</font>
<form method="post" action="changepw1.php" name="myForm" onsubmit ="return validate_form()">
<table width=50% align=center>

<tr>
<td bgcolor=#E8EEFA>&nbsp&nbsp<b> New Password: </b></td><td><input type="password" name="npassword"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td bgcolor=#E8EEFA>&nbsp&nbsp<b> Confirm Password: </b></td><td><input type="password" name="cpassword"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<input type="hidden" name="username" value="<?php echo $username; ?>">

</table>
<br>
<br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=Submit value="Continue"></input>
</center>
</form>
</body>
</html>
