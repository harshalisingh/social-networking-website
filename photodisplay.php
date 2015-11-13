<?php
session_start();
require_once "use.php";
$aid=$_GET['aid'];
$pid=$_GET['pid'];
//echo $aid;
//echo $pid;

require_once('inc/func.inc.php');

echo "<br><table width=100%>";
//echo "<tr><td bgcolor=#efefef width=100%> <b><font face=verdana size=3> Fullscreen view </font><b></td></tr></table>"; 


/**  setup  **/
$imgDir	= "album"; 		// image directory
$imgSub	= false;		// include sub directories when gathering images?
$imgId	= "lgImage"; 	// id tag for images

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("irkut", $con);

$username=$_SESSION['username'];
$query = "SELECT photoadd FROM photos ".
            "WHERE aid = \"$aid\" ";

$result = mysql_query($query, $con);
$i=0;
while($row = mysql_fetch_array($result))
{
  $temp = $row[photoadd];
  //echo $temp;
  $getImg[$i]="album/$temp";  
  

//echo $getImg[$i];
$i=$i+1;
}
$j= (int)$pid; 
$j=$j-1;
//echo $j;
//echo $getImg[$j];

//$getImg = lsDir($imgDir,$imgSub); // gather images
//$numImgs = count($getImg); // count images
 $numImgs = $i;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<xhtml>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Photo Viewer</title>
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" charset="utf-8">
		<!--[if lt IE 7]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" charset="utf-8">
		<![endif]-->
	</head>
	<body bgcolor=#fff>
		<script type="text/javascript" charset="utf-8">
			var NumberOfImages = <?php echo $numImgs?>; var img = new Array(NumberOfImages); var txt = new Array(NumberOfImages); var imgNumber =<?php echo $j; ?>;   

			<?php $i=0; foreach ($getImg as $image): ?>                          
      				img[<?php echo $i?>] = "<?php echo $image?>";
				txt[<?php echo $i?>] = "<?php echo $i+1?>";
			<?php $i++; endforeach; ?>
		
			/* no need to change, unless you're a hacker */
			if (document.images) { preload_image_object = new Image(); var i = 0; for(i=0; i<=<?php echo $numImgs-1?>; i++) preload_image_object.src = img[i]; }
			function NextImage() { imgNumber++; if (imgNumber == NumberOfImages) imgNumber = 0; document.getElementById("<?php echo $imgId?>").src = img[imgNumber]; document.getElementById('details').innerHTML = txt[imgNumber]; }
			function PreviousImage() { imgNumber--; if (imgNumber < 0) imgNumber = NumberOfImages - 1; document.getElementById("<?php echo $imgId?>").src = img[imgNumber]; document.getElementById('details').innerHTML = txt[imgNumber]; }
                          
		</script>
		<div id="inner">
			<!-- content -->
			<!-- everything's stored within this div -->
			<div id="content">
				<!-- png corners (gives the appearance of rounded corners) -->
				<div class="corners">
					<div class="left_top"></div>
					<div class="right_top"></div>
					<div class="left_bottom"></div>
					<div class="right_bottom"></div>
				</div>
				<!-- next/previous arrows -->
				<div class="controls">
					<a class="previous" href="#prev" onclick="PreviousImage();return false;" title="Previous Photo">Previous Photo</a>
					<a class="next" href="#next" onclick="NextImage();return false;" title="Next Photo">Next Photo</a>
				</div>
				<!-- image details - in this case, the image number -->
				<div class="details_bg">
					<div id="details">
						1
					</div>
				</div>
				<!-- image -->
				<div class="photo">
					<img src="<?php echo $getImg[$j]?>" id="<?php echo $imgId?>" width="600" height="400" alt="" />
				</div>
			</div>
			


</body>
</html>



