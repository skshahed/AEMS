<?php

	session_start();
	
	require 'db.php';
		
		if (!$db)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
	
		$user = $_SESSION['username'];
		
		$date = date('Y-m-d H:i:s');
		
		require 'dbname.php';
		
		//$sqlselect="SELECT * FROM log_details WHERE username='$user' && ex_time='NULL' ORDER BY en_time DESC";
		$sql="UPDATE log_details SET ex_time='$date' WHERE username='$user' ORDER BY log_id DESC LIMIT 1";
		
		//$result = mysql_query($sqlselect, $db) or die(mysql_error($db));
		$result2 = mysql_query($sql, $db) or die(mysql_error($db));
		
	mysql_close($db);
	
	session_unset();

	session_destroy();

	header('Location:login.php');

?>