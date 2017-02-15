<!--

		functions for IDEArena
-->
<?php
	$host = "localhost";
	$user = "vnlaughlin";
	$passwd = "cs480";
	$database =  "vnlaughlin";
	$connect = mysql_connect($host, $user, $passwd);
	mysql_select_db($database);
?>

<?php





function showAll(){

 	$ids = "select * from IDEAS";
 	$link = "<a href = ' ";

 	$result_ids = mysql_query("$ids");
 	while($row = mysql_fetch_assoc($result_ids)){
 			$prime = $row['id'];
 			$link .= "select link_title from LINKS where LINKS.link_id = $prime";
 			$link .= ".php' </a>";
 			$result_lnks = mysql_query("$lnks");
	        $home_title = $row['title'];
			$home_text = $row['text'];
 	?>
 	<hr>
		<div class="row">
		  <div class="col-md-7">
		    <a href="#">
		      <img class="img-responsive" src="<?php echo $path ?>" alt="">
		    </a>
		  </div>
		  <div class="col-md-5">

		    <div class="panel panel-default">
		      <div class="panel-heading"><?php echo $link;?><?php echo $home_title; ?></a> <?php print " "; echo $home_text; ?></div>


	      </div>
		  </div>
	</div>
<?php
		}
   }
?>
