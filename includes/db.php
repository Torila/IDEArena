<?php

	define('DBHOST','localhost');
	define('DBUSER','vnlaughlin');
	define('DBPASS','cs480');
	define('DBNAME','vnlaughlin');
	$connect = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>