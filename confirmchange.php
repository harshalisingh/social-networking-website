<?php
session_start();
$username= $_SESSION['username']; 

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("irkut", $con);



$fname = $_POST['fname']; 
$lname = $_POST['lname']; 
$dd = $_POST['dd'];
$mm = $_POST['mm']; 
$yy = $_POST['yy']; 
$gender = $_POST['gender'];
$email = $_POST['email'];
$city = $_POST['city'];
$country = $_POST['country'];

$school = $_POST['school'];
$college = $_POST['college'];
$gcoll = $_POST['gcoll']; 

$mobile = $_POST['mobile'];
$status = $_POST['status']; 
$you = $_POST['you']; 

/*echo $school;
echo $college;
echo $gcoll;
echo $mobile;
echo $status;
echo $you;*/

mysql_query("UPDATE validate SET fname = '".$fname."', lname= '".$lname."', email='".$email."', dd = '".$dd."', mm= '".$mm."', yy='".$yy."',".
 
"gender = '".$gender."', country= '".$country."', city='".$city."' WHERE username = '".$username."' ");

mysql_query("DELETE FROM profile WHERE username= '$username' ");

mysql_query("INSERT INTO profile (username, school, college, gcoll, mobile, status, you)
VALUES ('".$username."', '".$school."', '".$college."', '".$gcoll."', '".$mobile."', '".$status."', '".$you."')");

mysql_close($con);

header ("Location: showprofile.php?q_username=$username");

?>
