<?php
session_start();
$number = $_POST['number'];
$aid = $_POST['aid'];
$date = date("Y/m/d");
//echo $number;
//echo $aid;

for($i = 0; $i < $number; $i++){
$file_name = $_FILES['uploadFile'. $i]['name'];
// strip file_name of slashes
$file_name = stripslashes($file_name);
$file_name = str_replace("'","",$file_name);
//echo $filename;

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$username = $_SESSION['username'];
$query = "SELECT MAX(pid) as pid FROM photos ".
            "WHERE aid = \"$aid\" ";

$result = mysql_query($query, $con);
            

while($row = mysql_fetch_array($result))
  {
  $pcount=$row[pid];
  }
//echo $pcount;
$pcount=$pcount+1;

mysql_query("INSERT INTO photos (aid, pid, photoadd, date)
VALUES ('".$aid."','".$pcount."','".$file_name."','".$date."')");

mysql_query("UPDATE album SET date = '".$date."'
WHERE aid = '".$aid."' ");

mysql_close($con);

$copy = copy($_FILES['uploadFile'. $i]['tmp_name'],"album/". $file_name);
 // prompt if successfully copied
 if($copy){
// echo "$file_name | uploaded sucessfully!<br>";
 }else{
 echo "$file_name | could not be uploaded!<br>";
 }

}
 header ("Location: photoalbum.php?aid=$aid");
?>


