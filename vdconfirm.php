<?php
   session_start();
    $vname= $_POST['vname'];
    $dname= $_POST['dname'];
    $date = date("Y/m/d");
    //echo $aname;
    //echo $dname; 
   
    if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
  /* echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";}*/
 $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("irkut", $con);

$query = "SELECT count FROM vcounter ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $count = $row[count];
}

$count=$count+1;

$username = $_SESSION['username'];


mysql_query("INSERT INTO video (vid, username, vname, vface, vtype, date, vdescripn)
VALUES ('".$count."','".$username."','".$vname."','".$_FILES["file"]["name"]."','".$_FILES["file"]["type"]."','".$date."','".$dname."')");


mysql_query("UPDATE vcounter SET count = '$count'");   
 mysql_close($con);

     if (file_exists("album/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "video/" . $_FILES["file"]["name"]);
      //echo "Stored in: " . "video/" . $_FILES["file"]["name"];

      }
    }
 header ("Location: video.php?q_username=$username");
?> 