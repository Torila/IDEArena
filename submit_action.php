<!--
--------------------------------------------------------------------------------------------------------------
		SUBMIT ACTION for Idearena
		Names: Victoria Laughlin
		Updated: 2/8/2017
--------------------------------------------------------------------------------------------------------------
		README: HTML/PHP version. Idearena alpha 1.0. Goal is to create the Arena system.
-->

<?
	include_once 'includes/db_connect.php';
	$title = $_POST['title'];
	$text = $_POST['qst'];
	$query = "insert into IDEAS values ('$title', '$text')";
	mysql_select_db($database);
		if(mysql_query($query, $connect))
			print "<P>Insert successful.<P>";
		else
			print "<P>Insert fail.<p>";
	mysql_close($connect);
?>