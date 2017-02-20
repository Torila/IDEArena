<?php

require_once('includes/connect.php');
session_start();

?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>

<div id="wrapper">

	<?php include('stylesheets/header.php'); ?>
	<h2>Login</h2>

	<?php

	if(isset($_POST['submit'])){
		$_POST = array_map( 'stripslashes', $_POST );
		extract($_POST);

		//check database
		$stmt = $connect->query("SELECT userID FROM users WHERE username = '$name' or email = '$name' and password = '$password'");
		$row = $stmt->fetch();
		$active = $row['active'];
    	if(!$stmt){
    		$count = 1;
		}
		//very basic validation
		if($name == ''){
			$error[] = 'Please enter your username/email.';
		}
		if($password ==''){
			$error[] = 'Please enter your password.';
		}
		if($count == 1){
			$error[] = 'Your username/email and password are invalid.';
		}

		if(!isset($error)){
			try {
				session_register("name");
        		$_SESSION['login_user'] = $name;
				header('Location: userpage.php?action=added');
				exit;
			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		}
	}
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>
	<div class="container">
	<form action='' method='post'>

		<p><label>Username/Email</label><br />
		<input type='text' name='name' value='<?php if(isset($error)){ echo $_POST['name'];}?>'></p>
		<p><label>Password</label><br />
		<input type='password' name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>'></p>


		<p><input type='submit' name='submit' value='Submit'></p>

	</form>
	</div>
</div>