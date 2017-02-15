<?php
ob_start();
//session_start();
	define('DBHOST','localhost');
	define('DBUSER','vnlaughlin');
	define('DBPASS','cs480');
	define('DBNAME','vnlaughlin');
	$connect = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	date_default_timezone_set('America/New_York');

	//add class if doesn't work
?>
