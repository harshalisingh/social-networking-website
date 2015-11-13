<html>
<head>
<title>Home</title>
<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="css/screen_ie.css" />
<![endif]-->

</head>
<body>
<?php
session_start();
require_once "use.php";
?>
<table width=100% border=0>
<tr>
<td width=20% align=left><font size=4 color=#9900FF>Welcome
<?php

  echo $_SESSION['username'];

?>

!</font>
</td>
<td width=60% align=left style="padding-right:3ex;border-bottom: solid 1px #C0C0C0;"> <font size=5 color=#888888 face="verdana"> New Updates</font>
</td>
<td width=5%></td>
</tr>
<tr>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$username=$_SESSION['username'];
$query = "SELECT picadd FROM profilepic ".
            "WHERE username = \"$username\" ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $picadd = $row[picadd];
}

?>
<td width=20% style="padding-left:2ex;"><img src="profile/<?php echo $picadd;?>" width=60% height=25%></td>

<td width=60% style="border-bottom: solid 1px #C0C0C0;"><font size=3 face="Arial"> Status Update</font><br><form action="status.php" method="post" name="update"><textarea rows="4" cols="60" name="mstatus" onclick="document.update.mstatus.value='';"> what's on your mind?</textarea>
<center>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type=Submit value="Share"></input>&nbsp&nbsp<input type="Reset"></input>
</center>
</form>
</td>
<td width=5%></td>
<td width=15%><table border="1" cellspacing="1" bordercolor="white" cellpadding="1" width="100%" align="right" valign="right" height="40"><tbody><tr> <td class="right_infra_bottom" valign="center">    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<b>Recent News </b><br> </td></tr><tr><td  class="right_infra_bottom" valign="center"><marquee behavior="scroll" height="226" direction="up" scrollamount="1" scrolldelay="10"><style type="text/css"><!----></style><ul  class="right_infra_bottom_table2"><li><a href=notices/exam-notice2012.pdf target="_blank">Examination Notice May-2012</a><br><br></li></ul><hr><br><ul  class="right_infra_bottom_table2"><li><a href=notices/academic-calendar2011-12-evensem.pdf target="_blank">Academic Calender 2012</a><br><br></li></ul><hr><br><ul  class="right_infra_bottom_table2"><li><a href=notices/notice-may2012.pdf target="_blank">Examination Notice May2012</a><br><br></li></ul><hr><br><ul  class="right_infra_bottom_table2"><li><a href=notices/free-notice.pdf target="_blank">Scholarship/Free ship</a><br><br></li></ul><!-- <a href="academic-cal-even.htm">Academic Calander  2009-10 for FE to BE</a>  <hr> <!-- <strong>First Year 2009-10:<br> <a href="notices/FE-evenTT.html">Time Table </a> <!-- <hr> </marquee>  <!--<a target="_blank" href="notices/roll- list1.pdf">Provisional Roll List : </a><strong></strong></strong>Student&nbsp;from CAP round only <br><a href="notices/roll-list1.htm">Provisional Roll List(division) : </a></td></tr> --> <!--<tr><td  >Location :<BR><BR> <img border="0" src= "/http://maps.google.com/maps/api/staticmap?&zoom=14&size=512x512&maptype=roadmap&markers=color:blue|label:S|40.702147,- 74.015794&markers=color:green|label:G|40.711614,-74.012318&markers=color:red|color:red|label:C|40.718217,-73.998284&sensor=false&key=ABQIAAAAAD- 6iaPoEm7mUqPmjSPZeBSUiwKKousr1EOC_K5ZtW18MZc0DRTtSS3tGzKjCLOTkmhyS0S6crLqSQ"></td></tr>--></u></td></tr><tr> <td class="right_infra_bottom" valign="center">    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	<b><a href="library.php"><u>Library</a></u> </b><br> </td></tr>		 <hr><br></td></tr></tbody></table>      <tr><td colspan="3">  <img src="images/menu_background.gif" width="100%" height="1px"><br>&nbsp;  </td></tr></table>  	  </td>	  <td   >&nbsp;</td>  </tr>  </table><table  border="0" cellspacing="0" cellpadding="0" >           <tr>           <td  valign="top"  class="right_infra_bottom" align="center">  </td>
</tr>
<tr>
<td width=20% valign="top"> 
<table style="padding-left:1ex;" valign="top">
<tr><td bgcolor=#BCCDE9><a href="uploadphoto.php"> Upload new photo </a></td></tr>
<tr></tr><tr></tr><tr></tr><tr></tr>
<tr><td bgcolor=#BCCDE9><a href="scrapbook.php"> Message </a></td></tr>
<tr></tr><tr></tr><tr></tr><tr></tr>
<tr><td bgcolor=#BCCDE9><a href="selectonlinetest.php"> Online test </a></td></tr>
<tr></tr><tr></tr><tr></tr><tr></tr>
<?php echo"<tr><td bgcolor=#BCCDE9><a href='friend.php?q_username=$username'> Friends </a></td></tr>"; ?>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<tr><td>
<div id="content">
<div id="right">
Online Friends

</div>
</div>
</td></tr>
<tr><td>
<font face=verdana color=black size=2>Look at the bottom <br>of page to find <br>out current online<br> friends.</font>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);
$username=$_SESSION['username'];

$query = "SELECT friendname FROM friends ".
            "WHERE username = \"$username\" ";

$result = mysql_query($query, $con);


while($row = mysql_fetch_array($result))
  {
  echo "<tr><td><p align =center><font face=Garamond color=black><b>$row[friendname]</b> &nbsp&nbsp</font><a href='ShowProfile.php?q_username=$row[friendname]'><font bgcolor=#BCCDE9>view profile</font></a></p></td></tr>";
  }

mysql_close($con);
?>

</td</tr>
</table>
<td width=60% valign="top">
<?php
require_once "useupdate.php";
?>
</td>
<td width=5%></td>
<td width=15% valign="top"> 
<table width=100% valign="top">
<tr><td valign="top">
<div id="content">
<div id="right">
Friend Request
</div>
</div>
</td></tr>
<tr>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$username=$_SESSION['username'];
$query = "SELECT * FROM friendreq ".
            "WHERE username = \"$username\" ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $reqname = $row[reqname];
  echo "<td align=center><font face=Garamond color=blue> $row[reqname]</font></a></td></tr>";

 echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<a href='do_confirm.php?reqname=$reqname' style=text-decoration:none;><font face=Garamond color=black>Yes</font></a> &nbsp;&nbsp;&nbsp;&nbsp;<a href='reject.php?reqname=$reqname' style=text-decoration:none;><font face=Garamond color=black>No</font></a></td></tr>";

}
?>
<tr><td valign="top">
<div id="content">
<div id="right">
Find Friends
</div>
</div>
</td></tr>
<tr><td>
<font size=2 face=verdana> Search and Find new friends</font><a href="searchfriend.php"> click here </a></td></tr>

</table>
</td>
</tr>
</table>

<div id="main_container">

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$username=$_SESSION['username'];

$query1 = "SELECT friendname FROM friends ".
            "WHERE username = \"$username\" ";

$result1 = mysql_query($query1, $con);


while($row1 = mysql_fetch_array($result1))
  {
  $musername=$row1[friendname];
//echo $musername;
$query = "SELECT username FROM validate ".
            "WHERE flag = 'ON' AND username = '".$musername."' ";

$result = mysql_query($query, $con);


while($row = mysql_fetch_array($result))
  {
  $cusername=$row[username];  

if($cusername != $username)
{
?>
<a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $cusername; ?>')">Chat With <?php echo $cusername; ?></a>


<?php
}  
  }
}
?>
<!-- YOUR BODY HERE -->

</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>

</body>
</html>