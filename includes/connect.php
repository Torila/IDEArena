<?php ob_start(); ?>
<?php session_start(); ?>


<?php

	define('DBHOST','localhost');
	define('DBUSER','vnlaughlin');
	define('DBPASS','cs480');
	define('DBNAME','vnlaughlin');
	$connect = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	date_default_timezone_set('America/New_York');

	//add class

	function __autoload($class) {

	   $class = strtolower($class);
	   $classpath = 'classes/class.'.$class . '.php';
	   if ( file_exists($classpath)) {
	      require_once $classpath;
		}

		//if call from within admin adjust the path
	   $classpath = '../classes/class.'.$class . '.php';
	   if ( file_exists($classpath)) {
	      require_once $classpath;
		}
	   $classpath = '../../classes/class.'.$class . '.php';
	   if ( file_exists($classpath)) {
	      require_once $classpath;
		}

	}

	$user = new User($connect);
?>

