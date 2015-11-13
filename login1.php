<?php
session_start();
$nusername = $_GET['nusername'];
$_SESSION['username']= $nusername;
 session_register("username");
 header ("Location: Loginsuccessful.php");
?>       
