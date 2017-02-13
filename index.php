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
		
mysql_close();
?>
