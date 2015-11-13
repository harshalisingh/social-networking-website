<?php
$uname = $_POST['uname'];
$ename = $_POST['ename'];
$place = strtoupper($_POST['place']);
$person = strtoupper($_POST['person']);

//echo $uname;
//echo $ename;
//echo $place;
//echo $person;


$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
$query = "SELECT * FROM validate ".
            "WHERE username = \"$uname\" OR email = \"$ename\" ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $username = $row[username];
  $splace = strtoupper($row[place]);
  $sperson = strtoupper($row[person]);

}
//echo $splace;
//echo $sperson;

if($place==$splace OR $person==$sperson)
{
header ("Location: newpass.php?username=$username");
}

else
{
header ("Location: wrongans.php");
}


?>
