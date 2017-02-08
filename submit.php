<!--
--------------------------------------------------------------------------------------------------------------
		SUBMIT for Idearena
		Names: Victoria Laughlin
		Updated: 2/8/2017
--------------------------------------------------------------------------------------------------------------
		README: HTML/PHP version. Idearena alpha 1.0. Goal is to create the Arena system.
-->

<!DOCTYPE html>
<html>
    <head>
        <title>Idearena > Home</title>
    </head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="http://fonts.googleaplis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link href="http://fonts.googleaplis.com/css?family=Lato" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
<!-- -----Stylesheet----- -->






<!-- /-------Stylesheet--------- -->
</style>





<!-- Header -->

<li><a href="submit.php">Submit Idea</a></li>

<!-- Title -->
<h2>
Submit a question to be debated:
</h2>
<hr>
<Form action=submit_action.php method=post>
Title: <input type=text size=20 name=title> <P>
<div class="form-group">
	<label class="control-label" for="comment">Question:</label>
		<textarea class="form-control" rows="2" name=qst placeholder="Enter your question..."></textarea>
</div><P>
<P>
<HR>
<input type=submit value=Submit>
</Form>

<!-- Text -->


 </body>
</html>