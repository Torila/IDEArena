<?php require('../includes/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>POST TITLE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Header -->

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

	$stmt = $connect->prepare('SELECT postID, postTitle, postQst, postDate FROM posts WHERE postID = :postID');
	$stmt->execute(array(':postID' => $_GET['id']));
	$row = $stmt->fetch();

?>

 <!-- Body -->
 <body>
	<div class="container">
 <?php
 	echo '<h1>'.$row['postTitle'].'</h1>';
 	echo '<p>Posted on '.date('M jS Y', strtotime($row['postDate'])).'</p>';
	echo '<p>'.$row['postQst'].'</p>';

 ?>
	</div>
 </body>
 </html>