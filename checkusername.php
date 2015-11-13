<?php

$db = new mysqli('localhost','root','','irkut');
if (mysqli_connect_errno()){
	echo "Coud not connect database. Please try again later.";
	exit;
}
$username = $_GET['username'];
//echo $username;

$query = "select username from validate where username = '$username'";
//echo $query;
$result = $db->query($query);
$num = $result->num_rows;
//echo $num;


if($num==0)
{
echo '<font color="green" >Username available.</font>';
}
else
{
echo '<font color="red" >Username not available.</font>';
}
?>
