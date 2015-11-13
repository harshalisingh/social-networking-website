<?php
   session_start();
   
    if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
    /*echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";*/

    $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("irkut", $con);
$username= $_SESSION['username'];
mysql_query("DELETE FROM profilepic WHERE username='".$username."'");

mysql_query("INSERT INTO profilepic (username, picadd)
VALUES ('".$_SESSION['username']."','".$_FILES["file"]["name"]."')");

    mysql_close($con);

     if (file_exists("profile/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "profile/" . $_FILES["file"]["name"]);
      //echo "Stored in: " . "profile/" . $_FILES["file"]["name"];

      }
    }
  require_once "Loginsuccessful.php";
?> 