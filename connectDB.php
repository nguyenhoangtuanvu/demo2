<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
	<?php
	$host="localhost";
	$post=3306; /* 3306*/
	$dbName="websales";
	$DbUserName="root";
	$dbPass="";
	// connect to database
	$conn = new mysqli($host,$DbUserName,$dbPass,$dbName,$post);
	if($conn->connect_error){
		echo"ko ket noi dc";
		die($conn->connect_error);
	}	
	?>

<body>
</body>
</html>
