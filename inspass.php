<html>
<head>
<title>Security Question</title>
</head>
<body bgcolor=#FFFFEE>
<form action="inspass2.php" method="POST">

<?php

$uname = $_GET['uname'];
$ename = $_GET['ename'];


echo "<center><br><br><br><table bgcolor=#BCCDE9><tr><td><font face=Garamond color=black size=6> Answer the security Question !!  </font></td></tr></table>";

?>

<br>
<br>
&nbsp&nbsp</font>
<table width=60% align=center>

<tr>
<td>&nbsp&nbsp<b> What is name of your favourite place? </b></td><td><input type="text" name="place"></input></td></tr>
<tr>
<td align=center><font size=3><br><b>OR</b> <br></font><br></td><td><br></td></tr>
<tr>
<td>&nbsp&nbsp<b>  Who is your favourite sport person?</b></td><td><input type="text" name="person"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<input type="hidden" name="uname" value="<?php echo $uname; ?>">
<input type="hidden" name="ename" value="<?php echo $ename; ?>">

</table>
<br>
<br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=Submit value="Continue"></input>
</center>
</form>
</body>
</html>