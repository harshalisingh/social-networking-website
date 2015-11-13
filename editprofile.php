<html>
<head>
<title>Change Profile</title>
<script type="text/javascript">

function check1(str)
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
    document.getElementById("emailcheck").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","checkemail.php?email="+str,true);
xmlhttp.send();
}

</script>

</head>
<body>
<?php
session_start();
require_once "use.php";
?>
<table width=100% style="padding-top:15px;">
<tr>
<td width=15% valign="top" width=100%> 
<table valign="top">
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$q_username= $_GET['q_username'];
$query = "SELECT picadd FROM profilepic ".
            "WHERE username = \"$q_username\" ";

$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result))
{
  $picadd = $row[picadd];
}

?>
<tr><td><img src="profile/<?php echo $picadd;?>" width="100%" height="100%" ></td></tr>

<tr></tr><tr></tr><tr></tr><tr></tr>
<?php

$q_username= $_GET['q_username'];
$username= $_SESSION['username'];  
if($q_username==$_SESSION['username'])
{  
echo "<tr><td bgcolor=#BCCDE9><a href='scrapbook.php'> Message </a></td></tr>";
}
else
{
echo "<tr><td bgcolor=#BCCDE9><a href='sendscrap.php?q_username=$q_username'>Send Message </a></td></tr>";
}

echo "<tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td bgcolor=#BCCDE9><a href='photo.php?q_username=$q_username'> Photos </a></td></tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td bgcolor=#BCCDE9><a href='video.php?q_username=$q_username'> Videos </a></td></tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr>";

echo "<tr><td bgcolor=#BCCDE9><a href='friend.php'> Friends </a></td></tr>";
echo "<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
echo "<tr><td>";
?>
<div id="content">
<div id="right">
<center>Friends</center>
</div>
</div>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);


$result = mysql_query("SELECT * FROM validate");


while($row = mysql_fetch_array($result))
  {
  echo "<tr><td><p align =center> </font><a href='ShowProfile.php?q_username=$row[username]'><font face=Garamond color=black><b>$row[fname] $row[lname]</b></a></p></td></tr>";
  }

mysql_close($con);
?>

</td</tr>

</table>
</td>
<td width=75% valign="top">


<?php

$q_username= $_GET['q_username'];
$username= $_SESSION['username'];            
echo "<table width=100% valign='top'><tr><td width=25% bgcolor=#BCCDE9><font face=Garamond color=black size=6> Your Profile </font></td><td width=75%></td></tr></table>";


$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$query = "SELECT * FROM validate ".
            "WHERE username = \"$q_username\" ";

$result = mysql_query($query, $con);

echo '<br><Br><table width=100% valign="top" bgcolor=#efefef style="border-bottom: solid 1px #C0C0C0;">';


echo "<tr><td width=100% align=left><b>Basic information</b></td></tr></table><br>";

//echo "<table width=100%><tr><td width=100%></td></tr><tr></tr></table>";
echo "<table width=100%  bordercolor=white >";

while($row = mysql_fetch_array($result))
  {
	  $username = $row['username'];
	  $fname = $row['fname'];
	  $lname = $row['lname'];
	  $country =$row['country'];
	  $city = $row['city'];
          $dd = $row['dd'];
          $mm = $row['mm']; 
          $yy = $row['yy']; 
          $gender = $row['gender'];
          $email = $row['email'];
        
   }     
	
?>
<form action="confirmchange.php" method="POST" name=student>
<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> First Name: </b></td><td><input type="text" name="fname" value="<?php echo $fname;?>"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Last Name: </b></td><td><input type="text" name="lname" value="<?php echo $lname;?>"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Your e-mail: </b></td><td><input type="text" name="email" value="<?php echo $email;?>" onblur="check1(this.value)" onsubmit="echeck();"></input>
<div id="emailcheck"></div></td></tr>
</tr>
<tr>
<td><br></td><td><br></td></tr>
<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> I am: </b></td><td>
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
</td>
<tr>
<td><br></td><td><br></td></tr>

<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Birthday: </b></td><td>Day : 
<select name="dd" >
<?php
for($i=1;$i<32;$i++)
{
if($i==(int)$dd)
{
?>
<option selected="yes" value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
else
{
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>

<?php
}
}
?>
</select>

&nbsp;&nbsp; Month : 
<select name="mm">
<?php
for($i=1;$i<13;$i++)
{
if($i==(int)$mm)
{
?>
<option selected="yes" value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
else
{
?>

<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
}
?>
</select>

&nbsp;&nbsp; Year : 
<select name="yy" value="<?php echo $yy; ?>">
<?php
for($i=1995;$i>1900;$i--)
{
if($i==(int)$yy)
{
?>
<option selected="yes" value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}
else
{
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
}

}
?>
</select></td></tr>
<tr>
<td><br></td><td><br></td></tr>

<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Country: </b></td><td><input type="text" name="country" value="<?php echo $country;?>"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>


<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> City: </b></td><td><input type="text" name="city" value="<?php echo $city;?>"></input></td></tr>

<?php

echo "</table>";
echo '<br><Br><table width=100% valign="top" bgcolor=#efefef style="border-bottom: solid 1px #C0C0C0;">';

$query = "SELECT * FROM profile ".
            "WHERE username = \"$username\" ";

$result = mysql_query($query, $con);

while($row = mysql_fetch_array($result))
  {
	  $username = $row['username'];
	  $school = $row['school'];
	  $college = $row['college'];
	  $gcoll =$row['gcoll'];
	  $mobile = $row['mobile'];
          $status = $row['status'];
          $you = $row['you']; 
}
mysql_close($con);

echo "<tr><td width=100% align=left><b>Educational information</b></td></tr></table><br>";

?>

<table width=100%  bordercolor=white>

<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Grad School: </b></td><td><input type="text" name="school" value="<?php echo $school;?>"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>

<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> High school: </b></td><td><input type="text" name="college" value="<?php echo $college;?>"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>

<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> College: </b></td><td><input type="text" name="gcoll" value="<?php echo $gcoll;?>"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>
</table>
<Br><table width=100% valign="top" bgcolor=#efefef style="border-bottom: solid 1px #C0C0C0;">

<tr><td width=100% align=left><b>Personal information</b></td></tr></table><br>


<table width=100%  bordercolor=white>

<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Mobile No.: </b></td><td><input type="text" name="mobile" value="<?php echo $mobile;?>"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>

<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> Relationship status: </b></td><td><input type="text" name="status" value="<?php echo $status;?>"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>

<tr>
<td width=20% bgcolor=#E8EEFA>&nbsp&nbsp<b> About You: </b></td><td><input type="text" name="you" size=100 value="<?php echo $you;?>"></input></td></tr>
<tr>
<td><br></td><td><br></td></tr>

<tr>
<td><br></td><td><br></td></tr>
<tr>
<td><br></td><td><input type=Submit value="Save changes"></input>
</td></tr>
</table>
</form>
<br><br><br><br><br><br><br><br>
</td>
</tr>
</table>

</body>
</html> 