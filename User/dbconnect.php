<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<?php 
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	
	if(!$conn)
	{
		echo "could not connected";
	} 
	
	
	echo "<br/>";
	
	$db = mysqli_select_db($conn, 'allinone');
		
	if(!$db)
	{
		echo "select database first";
	}
	
	
	?>
	
</body>
</html>