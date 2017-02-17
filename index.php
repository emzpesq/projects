<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="theme.css">

	<script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
	<?php
	echo 'hello, this is email validator' . '<br>';

	$username="root";
	$password="";
	$database="test";

	@mysql_connect('localhost',$username,$password) or die("cannot connect to mysql");

	@mysql_select_db($database) or die( "Unable to select database");

	$query = "Select * from emails";
	$result = mysql_query($query);

	$emails = array();
	while ($email =  mysql_fetch_assoc($result))
	{
		$emails[] = $email['email'];
	}
	foreach ($emails as $email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
			echo $email . '<br>';
		}
	}
	print_r(array_count_values($emails));
	
	mysql_close();
	echo "end of list";
	?>
</body>
</html>
