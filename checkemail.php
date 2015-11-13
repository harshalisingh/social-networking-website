<?php

$db = new mysqli('localhost','root','','irkut');
if (mysqli_connect_errno()){
	echo "Coud not connect database. Please try again later.";
	exit;
}
$email = $_GET['email'];
//echo $username;

$query = "select username from validate where email = '$email'";
//echo $query;
$result = $db->query($query);
$num = $result->num_rows;
//echo $num;


if($num==0)
{
echo '<font color="green" >Email id available.</font>';
}
else
{
echo '<font color="red" >email id not available.</font>';
}
?>
