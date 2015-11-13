<html>
<head>
<title> Test</title>
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
<tr><th align=center><font face=georgia size=5 color="#B11E89">Sample  Test </font>
</font></th></tr></table>
<table width=100%  cellpadding=8 FRAME=BOX RULES=ROWS Bordercolor=#C0C0C0 style="padding-left:10ex;border-left : 1px solid #fff;border-top : 1px solid #fff;border-right : 1px solid #fff;">
<form action="testresult.php" method="post">
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$result = mysql_query("SELECT * FROM $type where qset = '".$no."' ");

while($row = mysql_fetch_array($result))
  {
  $qno = $row[qno];
  $question= $row[question];
  $option1= $row[option1];
  $option2=$row[option2];
  $option3= $row[option3];
  $option4=$row[option4];

echo "<tr><td><font face=calibri size=3><br>$qno . $nbsp $question<br><br>";
echo "<input type=radio name='$qno' value='a''>$nbsp $option1 <br>";
echo "<input type=radio name='$qno' value='b'> $nbsp $option2 <br>";
echo "<input type=radio name='$qno' value='c'> $nbsp $option3 <br>";
echo "<input type=radio name='$qno' value='d'> $nbsp $option4<br></font></td></tr>";


}
 ?>
</table>

<font><br><br></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;
<input type="hidden" name="type" value="<?php echo $type; ?>">
<input type="hidden" name="no" value="<?php echo $no; ?>">

<input type=Submit value="Submit"></input>
</form>

</body>
</html>
