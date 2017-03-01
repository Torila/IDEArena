<?php require_once('../includes/connect.php');
$username = $user->grab_user();
//echo $username;


?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Add Post</title>

     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>

</head>
<body>

<div id="wrapper">
 <!-- NAV BAR -->
<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	   <a class="navbar-brand" href="index.php">IDEArena</a>
	    </div>
	    <ul class="nav navbar-nav">
	    <li><a href="index.php">Home</a></li>
	 	<li><a href="">Catagories</a></li>
	 	<li><a href="addpost.php">Add Post</a></li>
	 	<li><a href="logout.php">Log Out</a></li>
	    </ul>
	  </div>
</nav>


	<?php

	if(isset($_POST['submit'])){
		$_POST = array_map( 'stripslashes', $_POST );
		extract($_POST);

		//very basic validation
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}
		if($postQst ==''){
			$error[] = 'Please enter a question.';
		}

		if(!isset($error)){

			//try {
			//	$stmt
			//$userID = ;
			//} catch(PDOException $e) {
			//   echo $e->getMessage();
			//}


			try {
				//insert into database

				$stmt = $connect->prepare('INSERT INTO posts (postTitle, userID, postQst, postDate) VALUES (:postTitle, :postQst,:postDate)') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':userID' => $userID,
					':postQst' => $postQst,
					':postDate' => date('Y-m-d H:i:s')
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
	<h2>Add Post</h2>
	<form action='' method='post'>

		<p><label>Title:</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>

		<p><label>Question:</label><br />
		<textarea name='postQst' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postQst'];}?></textarea></p>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>
	</div>
</div>