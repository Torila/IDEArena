<?php

require_once('../includes/connect.php');
if($user->logged_in()){
	header('Location: index.php');
	}
?>

<!doctype html>
<html lang="en">
 <head>
   <title>Login</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<body>

<div id="login">

<!-- NAV BAR -->
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	   <a class="navbar-brand" href="..\index.php">IDEArena</a>
	    </div>
	    <ul class="nav navbar-nav">
	    <li><a href="..\index.php">Home</a></li>
	    <li><a href="">Catagories</a></li>
		<li><a href="signup.php">Sign Up</a></li>
		<li><a href="login.php">Login</a></li>
	    </ul>
	  </div>
</nav>





	<?php

	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($user->login($username, $password)){
			//logged in return to index page
			header('Location: index.php');

			exit;
		} else {
			$message = '<p class="error">Wrong username/email or password</p>';
			}
	}//end if submit

	if(isset($message)){ echo $message; }

	?>
	<div class="container">
	<h2>Login</h2>
	<form action='' method='post'>

		<p><label>Username/Email</label><br />
		<input type='text' name='username' value=''></p>
		<p><label>Password</label><br />
		<input type='password' name='password' value=''></p>


		<p><input type='submit' name='submit' value='Submit'></p>

	</form>
	</div>
</div>