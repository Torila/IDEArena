 <!--
 --------------------------------------------------------------------------------------------------------------
 		USERPAGE for IDEArena
 		Name: Victoria Laughlin
 		Updated: 2/13/2017
 --------------------------------------------------------------------------------------------------------------
 		README: HTML/PHP version. Idearena alpha 1.0. Goal is to create the Arena system.
-->
<?php require('includes/session.php'); ?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
   <title><?php echo $login_session; ?>'s Page</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<body>

 <!-- Header -->

 <?php
 		require('stylesheets/header.php'); ?>
 <!-- Body -->
 <div class="container">
   <h2>Welcome </h2>
   <p>Choose an idea...</p>
 </div>

<div class="container">
 <h1>Welcome <?php echo $login_session; ?></h1>
 <h2><a href = "logout.php">Sign Out</a></h2>

</div>
        <!-- /.container -->

	</body>
</html>