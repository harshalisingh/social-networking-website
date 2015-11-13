<html>
<head>
<title> Test Analysis</title>
</head>
<body>
<?php
session_start();
$type= $_GET['type'];
$no= $_GET['no'];


//echo $type;
//echo $no;

?>

<table width=100% CELLPADDING=10 bgcolor=#BCCDE9>
<tr>
<tr><th align=center><font face=georgia size=5 color="#B11E89"> Test Analysis </font>
</font></th></tr></table>
<table width=100%  cellpadding=8 FRAME=BOX RULES=ROWS Bordercolor=#C0C0C0 style="padding-left:10ex;border-left : 1px solid #fff;border-top : 1px solid #fff;border-right : 1px solid #fff;">
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$result1 = mysql_query("SELECT * FROM $type where qset = '".$no."' ");

while($row = mysql_fetch_array($result1))
  {
  $qno = $row[qno];
  $result= $row[result];
  $analysis= $row[analysis];
    
echo "<tr><td><font face=calibri size=3><br>$qno . $nbsp <font color=green>$result</font><br>";
echo "$analysis <br>";


}
 ?>
</table>
<br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" onclick="location.href='testtype.php?type=<?php echo $type; ?>'" value="Test Home">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" onclick="location.href='Loginsuccessful.php'" value="StudentWorld Home">

</body>
</html>
