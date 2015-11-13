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
<td width=60% align=left style="padding-right:3ex;border-bottom: solid 1px #C0C0C0;"> <font size=5 color=#888888 face="verdana"> Welcome to Online Library!</font>
</td>
<td width=5%></td>
</tr>
<tr>
</table>
<marquee><h1><font color="RED">New arrivals!!!<h1></marquee>

<table align="center" border="3">
<tr bgcolor="LIGHTBLUE">
<th>Book No</th>
<th>Book Name</th>
<th>Author Name</th>
<th>Publisher</th>
<th>VolumeInfo</th>
</tr>
<tr>
<td>22664</td>
<td>Environmental Studies</td>
<td>Daniels,R.J.R</td>
<td>Wiley INDIA, New Delhi 2009</td>
<td>20</td>
</tr>
<tr>
<td>22669</td>
<td>Modern Digital and Analog Communication Systems</td>
<td>Lathi B. P.</td>
<td>Oxford University press,2006</td>
<td>20</td>
</tr>
<tr>
<td>22679</td>
<td>The 8088 and 8086 Microprocessors: Programming, Interfacing</td>
<td>Triebel W. A.</td>
<td>University press Hyderabed, 2009</td>
<td>25</td>
</tr>
<tr>
<td>22689</td>
<td>PC Hardware a beginners guide</td>
<td>Gilster R.</td>
<td>Tata Mcgraw Hill New Delhi, 2008</td>
<td>35</td>
</tr>
<tr>
<td>22694</td>
<td>Remote Sennsing: Principles and Application</td>
<td>Panda B. C.</td>
<td>Viva Books, New Delhi, 2009</td>
<td>15</td>
</tr>
<tr>
<td>22699</td>
<td>Data Mining Methods</td>
<td>Chattamvelli, R.</td>
<td>Narosa publishing house,New Delhi,2008</td>
<td>20</td>
</tr>
<tr>
<td>22704</td>
<td>Introduction to Prolog</td>
<td>Suri, R. P.</td>
<td>Narosa publishing house,New Delhi,2008</td>
<td>20</td>
</tr>
<tr>
<td>22709</td>
<td>Software Testing: Concepts and Practices.</td>
<td>Mustafa, K.</td>
<td>Narosa publishing house,New Delhi,2008</td>
<td>20</td>
</tr>
</table>







