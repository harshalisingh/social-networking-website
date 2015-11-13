<html>
<head>
<title> Testresult</title>
</head>
<body>
<?php
session_start();
$type= $_POST['type'];
$no= $_POST['no'];

$a[1]= $_POST['1'];
$a[2]= $_POST['2'];
$a[3]= $_POST['3'];
$a[4]= $_POST['4'];
$a[5]= $_POST['5'];
$a[6]= $_POST['6'];
$a[7]= $_POST['7'];
$a[8]= $_POST['8'];
$a[9]= $_POST['9'];
$a[10]= $_POST['10'];
$a[11]= $_POST['11'];
$a[12]= $_POST['12'];
$a[13]= $_POST['13'];
$a[14]= $_POST['14'];
$a[15]= $_POST['15'];
$a[16]= $_POST['16'];
$a[17]= $_POST['17'];
$a[18]= $_POST['18'];
$a[19]= $_POST['19'];
$a[20]= $_POST['20'];
$a[21]= $_POST['21'];
$a[22]= $_POST['22'];
$a[23]= $_POST['23'];
$a[24]= $_POST['24'];
$a[25]= $_POST['25'];
//$a2= $_POST['2'];


//echo $a[1];
//echo $a[2];

?>
<br><br>

<table width=100% CELLPADDING=10 bgcolor=#efefef>
<tr>
<tr><th align=center><font face=georgia size=5 color="#B11E89"> Test Result</font>
</font></th></tr>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
$i=1;
$count=0;
$query = "SELECT * FROM $type where qset = '".$no."' ";

$result1 = mysql_query($query, $con);

while( $row = mysql_fetch_array($result1) )
  {
  $result= $row[result];
//  echo $result;

  if($a[$i]==$result)
  {
   $count=$count+2;
  }
  else
  {
  $count=$count-1;
  }
  $i++;
  }

//echo $count;
if($count>=20)
{
echo "<tr><td align=center><font face=calibri size=5 color=green><br>Too Good !!<br></font";
echo " <font face=calibri size=5>Your Score : $count <br></font>";
echo " <font face=calibri size=3>Keep going ...take another test <br><Br></font></td></tr>";
}
else
{
if($count>=15)
{
echo "<tr><td align=center><font face=calibri size=5 color=blue><br>Its fine !!<br></font";
echo " <font face=calibri size=5>Your Score : $count <br></font>";

echo " <font face=calibri size=3>Try more ...take another test <br><Br></font></td></tr>";
}
else
{
echo "<tr><td align=center><font face=calibri size=5 color=red><br>Its Bad !!<br></font";
echo " <font face=calibri size=5>Your Score : $count <br></font>";

echo " <font face=calibri size=3>Try more ...take another test<br><br></font></td></tr>";

}
}
?>
<tr><td align=center>
<input type="button" onclick="location.href='viewanalysis.php?type=<?php echo $type; ?> & no=<?php echo $no; ?>'" value="view analysis">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" onclick="location.href='testtype.php?type=<?php echo $type; ?>'" value="Skip">
</td></tr>
</table>
</body>
</html>

