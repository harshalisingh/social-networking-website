<html>
<body>
<?php
session_start();
$password=$_GET[password];
$username=$_GET[username];
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "irkut";

//connect to Mysql dbms

$link = mysql_connect($db_host, $db_user, $db_pass);

//Select the database with the 'validate' table 
mysql_select_db($db_name, $link);

//formulate the query and send it to dbms for execution

function md5_salt($string) {
    $salt = md5($string."%*4!#$;\.k~'(_@");
   
    // Hash the string
    $string = md5("$salt$string$salt");
   
    return $string; }

$pasword=md5_salt($password);
//echo $pasword;


   $query = "SELECT username FROM validate ".
            "WHERE username = \"$_GET[username]\" ".
            "AND password = \"$pasword\" ";


   $result = mysql_query($query, $link);


//Check the number of rows in the query results set. If the
//username/password is on file, the query will produce exactly
//1 row os results. If not, mysql_num_rows() will find that the
//query returned zero (0) rows.

     if (mysql_num_rows($result)==0)        
       header ("Location: Accessdenied.php");

     else
       { 
		 $_SESSION['username']= $_GET[username];
		 session_register("username");
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$username=$_SESSION['username'];

mysql_query("UPDATE validate SET flag = 'ON'
WHERE username='".$username."' ");


        header ("Location: Loginsuccessful.php");
         
       }
?>
</body>
</html>  