<html>
<head>
<title>Photo Upload</title>
</head>
<body>
<?php
session_start();
$aid= $_GET['aid'];
$username= $_SESSION['username']; 
?>
<script type="text/javascript">
aid=<?php echo $aid; ?>

number = prompt("Enter the number of photos you want to upload:");

location.href = "photosubmit.php?aid=" + aid + "& number=" + number; 
</script>
</body>
</html>