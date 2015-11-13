<html>
<head>
<title>ONLINE TEST</title>
<script type="text/javascript">
function searchtesttype(str)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("searchresult").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","searchtest.php?testtype="+str,true);
xmlhttp.send();
}</script>
</head>

<?php
session_start();
require_once "use.php";
?>
<table style="padding-top:15px;">
<tr>
<td width=15% valign="top"> 
<table valign="top">
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
$username= $_SESSION['username'];  


?>




<form>
<br>
<table width=100%  style="padding-bottom:15;">
<tr><td width=10%></td>
<td width=30%></td>

<td width=30%><font size="5" face="garamond">Enter the name of the test :</font></td>
<td width=20%><input type="text" name="testtype" size="20" onblur="searchtesttype(this.value)"></td>
<td width=10%></td></tr></table>
</form>
