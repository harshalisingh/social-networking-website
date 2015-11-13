<html>
<body bgcolor=#F4DDED>

<table width=100% height=10% bgcolor="white">
<tr>
<td align=center>
</table>
<h2>

<?php

function md5_salt($string) {
    $salt = md5($string."%*4!#$;\.k~'(_@");
   
    // Hash the string
    $string = md5("$salt$string$salt");
   
    return $string; }
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("irkut", $con);


$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname']; 
$lname = $_POST['lname']; 
$dd = $_POST['dd'];
$mm = $_POST['mm']; 
$yy = $_POST['yy']; 

$gender = $_POST['gender'];
$email = $_POST['email'];
$city = $_POST['city'];
$country = $_POST['country'];
$place = $_POST['place'];
$person = $_POST['person'];



$pasword=md5_salt($password);

$sql="INSERT INTO validate (fname, lname, username,password,country,city,dd,mm,yy,gender,email,place,person)
VALUES
('$_POST[fname]','$_POST[lname]','$_POST[username]','$pasword','$_POST[country]','$_POST[city]','$_POST[dd]','$_POST[mm]','$_POST[yy]','$_POST[gender]','$_POST[email]','$_POST[place]','$_POST[person]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Your account has been activated. To login, please click<a href=\"chirkut.php\"> here</a>";


mysql_close($con)
?>
</body>
</html> 