<?php require_once('includes/connect.php'); ?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Add Post</title>
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

	<?php include('stylesheets/header.php'); ?>
	<h2>Add Post</h2>

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
			try {
				//insert into database
				$stmt = $connect->prepare('INSERT INTO posts (postTitle, postQst, postDate) VALUES (:postTitle, :postQst,:postDate)') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
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
	<form action='' method='post'>

		<p><label>Title:</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>

		<p><label>Question:</label><br />
		<textarea name='postQst' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postQst'];}?></textarea></p>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>
	</div>
</div>