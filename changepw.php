<?php
session_start();

$username = $_SESSION['username'];


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

$opassword = $_POST['opassword'];
$npassword = $_POST['npassword'];

$oldpass=md5_salt($opassword);
$newpass=md5_salt($npassword);

$query = "SELECT password FROM validate ".
            "WHERE username = \"$username\" ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $password = $row[password];
}

mysql_close($con);

if($password==$oldpass)
{
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

mysql_query("UPDATE validate SET password = '".$newpass."'
WHERE username = '".$username."' ");

mysql_close($con);
header ("Location: passchanged.php");

}
else
{
header ("Location: passwrong.php");
}


//echo $opassword;
//echo $npassword;
?>

