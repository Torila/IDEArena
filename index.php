 <!--
 --------------------------------------------------------------------------------------------------------------
 		HOMEPAGE for IDEArena
 		Name: Victoria Laughlin
 		Updated: 2/13/2017
 --------------------------------------------------------------------------------------------------------------
 		README: HTML/PHP version. Idearena alpha 1.0. Goal is to create the Arena system.
-->
<?php require('includes/connect.php'); ?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
   <title>Home</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<body>

 <!-- Header -->
 <?php require('stylesheets/header.php'); ?>

 <!-- Body -->
 <div class="container">
   <h2>IDEArena</h2>
   <p>Choose an idea...</p>
 </div>

<div class="container">
 <?php


 try {

        $stmt = $connect->query('SELECT postID, postTitle, postQst, postDate FROM posts ORDER BY postID DESC');
        while($row = $stmt->fetch()){

        	echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
        	echo '<p>Posted on '.date('M jS Y H:i:s', strtotime($row['postDate'])).'</p>';

        	}
      } catch(PDOException $e) {
			echo $e->getMessage();
			}
?>
</div>
        <!-- /.container -->

	</body>
</html>