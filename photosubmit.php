<html>
<head>
<title>Upload files</title>
</head>
<body>

<form name="form1" enctype="multipart/form-data" method="post" action="uploadmphoto.php">
 
  <?php
  session_start();
  require_once "use.php";
  $number = $_GET['number'];
  $aid = $_GET['aid'];
   echo "<center><br><br><br><table bgcolor=#BCCDE9><tr><td><font face=Garamond color=black size=6> Upload more photos </font></td></tr></table><br><br>";
  for($i=0; $i < $number; $i++){
  ?>
    <center><p><input name="uploadFile<?php echo $i;?>" type="file" id="uploadFile<?php echo $i;?>" />
 
  <?php } ?></center></p>
  <p><input name="number" type="hidden" value="<?php echo $number;?>" />
<input name="aid" type="hidden" value="<?php echo $aid;?>" />    
<input type="submit" name="Submit" value="Submit" />
  </p>
</form>
</body>
</html>
