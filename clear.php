<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	header('location:index.php');
?>
<!doctype html>
<html lang="en">
<head>
<!--Set the standard character set -->
<meta charset="utf-8">
<!--Force the viewport to render at 100% on most devices-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Michael Dryburgh">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>