<html>
<head> </head>
<body>
<script type="text/javascript">

function validate1_form()
{
if(document.myForm1.message.value=="")
{
alert("Message cant be blank!");
valid=false;
}
 return valid;

}
</script>

<form action="insscrap.php" method="POST" name="myForm1" onsubmit ="return validate1_form()">

<?php
require_once "use.php";
echo "<center><br><br><br><table bgcolor=#BCCDE9><tr><td><font face=Garamond color=black size=6> Send him your Message </font></td></tr></table>";

$q_username= $_GET['q_username'];
$username= $_SESSION['username']; 
//echo $q_username;

echo "<input type=hidden name=\"to\" value=$q_username />";
?>

<br>
<br>
&nbsp&nbsp</font><textarea rows="4" cols="60" name="message"></textarea>
<br>
<br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=Submit value="Send Message"></input>&nbsp&nbsp<input type="Reset"></input>
</center>
</form>
</body>
</html>