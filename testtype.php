<html>
<head>
<title>Online test</title>
</head>
<body>
<?php
session_start();
require_once "use.php";

$type= $_GET['type'];


//echo $type;
?>
<br><br>
<table width=100% CELLPADDING=10 bgcolor=#efefef>
<tr>
<tr><td><p><font face=georgia size=4 color=red>Rules:</font>
<font face=georgia size=3><ul><li>There will <font face=arial>25</font> questions in each test. </li>
<li>Try to solve ir within <font face=arial>30 </font> minutes. </li>
<li><font face=arial>2 </font> Marks for each correct answer. </li>
<li><font face=arial>-1 </font> for each wrong answer. </li>

</ul>

</font></p></td></tr></table><br><br>
<table cellpadding=6 width=100%>
<tr></tr><tr></tr><tr></tr>
<tr><td width=30%></td><td width=40% align=center bgcolor=#BCCDE9><font face=verdana size=3><b>Select one of following test !!</b></font></td><td width=30%></td></tr>
</table><br><table cellpadding=6 width=100%>
<ul id="nav">
<tr><td width=40%></td><td width=20%><a href="test.php?type=<?php echo $type; ?>&no=1" style="background-color:#fff;"><font size=3 face=verdana color=#0066B3>Test 1 </a></td><td width=40%></td></tr>
<tr><td width=40%></td><td width=20%><a href="test.php?type=<?php echo $type; ?>&no=2" style="background-color:#fff;"><font size=3 face=verdana color=#0066B3>Test 2</a></td><td width=40%></td></tr>
<tr><td width=40%></td><td width=20%><a href="test.php?type=<?php echo $type; ?>&no=3" style="background-color:#fff;"><font size=3 face=verdana color=#0066B3>Test 3 </a></td><td width=40%></td></tr>
<tr><td width=40%></td><td width=20%><a href="test.php?type=<?php echo $type; ?>&no=4" style="background-color:#fff;"><font size=3 face=verdana color=#0066B3>Test 4 </a></td><td width=40%></td></tr>
<tr><td width=40%></td><td width=20%><a href="test.php?type=<?php echo $type; ?>&no=5" style="background-color:#fff;"><font size=3 face=verdana color=#0066B3>Test 5 </a></td><td width=40%></td></tr>
<tr><td width=40%></td><td width=20%><a href="test.php?type=<?php echo $type; ?>&no=6" style="background-color:#fff;"><font size=3 face=verdana color=#0066B3>Test 6 </a></td><td width=40%></td></tr>
<tr><td width=40%></td><td width=20%><a href="test.php?type=<?php echo $type; ?>&no=7" style="background-color:#fff;"><font size=3 face=verdana color=#0066B3>Test 7 </a></td><td width=40%></td></tr>
<tr><td width=40%></td><td width=20%><a href="test.php?type=<?php echo $type; ?>&no=8" style="background-color:#fff;"><font size=3 face=verdana color=#0066B3>Test 8 </a></td><td width=40%></td></tr>
<tr><td width=40%></td><td width=20%><a href="test.php?type=<?php echo $type; ?>&no=9" style="background-color:#fff;"><font size=3 face=verdana color=#0066B3>Test 9 </a></td><td width=40%></td></tr>
<tr><td width=40%></td><td width=20%><a href="test.php?type=<?php echo $type; ?>&no=10" style="background-color:#fff;"><font size=3 face=verdana color=#0066B3>Test 10 </a></td><td width=40%></td></tr>
</ul>
</table>

</body>
</html>