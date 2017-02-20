<?php require_once('includes/connect.php'); ?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>

<div id="wrapper">

	<?php include('stylesheets/header.php'); ?>
	<h2>Sign Up</h2>

	<?php

	if(isset($_POST['submit'])){
		$_POST = array_map( 'stripslashes', $_POST );
		extract($_POST);
		$request1 = $connect->query('SELECT username FROM users');
		$request2 = $connect->query('SELECT email FROM users');


		//very basic validation
		if($username ==''){
			$error[] = 'Please enter your username.';
		}

		//check for username existance
		while($row = $request1->fetch()){
			if($username == $row){
				$error[] = 'This username is already in use.';
				break;
			}
		}
		if($email ==''){
			$error[] = 'Please enter your email.';
		}
		while($row = $request2->fetch()){
			//check for email existance
			if($email == $row){
				$error[] = 'This email is already in use.';
				break;
			}
		}
		if($password ==''){
					$error[] = 'Please enter your password.';
		}

		if(!isset($error)){
			try {
				//insert into database
				$stmt = $connect->prepare('INSERT INTO users (username, password, email) VALUES (:username, :password,:email)') ;
				$stmt->execute(array(
					':username' => $username,
					':password' => $password,
					':email' => $email
				));
				header('Location: index.php?action=added');
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

		<p><label>Username</label><br />
		<input type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>'></p>
		<p><label>Email</label><br />
		<input type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>'></p>
		<p><label>Password</label><br />
		<input type='password' name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>'></p>


		<p><input type='submit' name='submit' value='Submit'></p>

	</form>
	</div>
</div>