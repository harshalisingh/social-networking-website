<?php
$username = $_POST['username'];


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

$npassword = $_POST['npassword'];

$newpass=md5_salt($npassword);

$query = "SELECT password FROM validate ".
            "WHERE username = \"$username\" ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $password = $row[password];
}

mysql_close($con);

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

mysql_query("UPDATE validate SET password = '".$newpass."'
WHERE username = '".$username."' ");

mysql_close($con);
header ("Location: login2.php?username=$username & password=$npassword");



//echo $opassword;
//echo $npassword;
?>

