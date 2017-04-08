<?php
session_start();
	
	include 'db.php';
	if (!$db)
  	{
  		die('Could not connect: ' . mysql_error());
  	}
	
	include 'dbname.php';
	
	$test=$_SESSION['username'];
	
	//$name=$_POST['name'];
	//$pass=$_POST['password'];
	
	/*if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['p_addr']) && !empty($_POST['c_addr']) && !empty($_POST['phone']) && !empty($_POST['h_phone']) && !empty($_POST['bank_ac']))
		{
	$sql=mysql_query("UPDATE login SET login.password='$_POST[password]' WHERE username = '$test'");*/

	$sql=mysql_query("UPDATE login,profile SET login.password='$_POST[password]', profile.name='$_POST[name]', profile.email='$_POST[email]', profile.p_addr='$_POST[p_addr]', profile.c_addr='$_POST[c_addr]', profile.phone='$_POST[phone]', profile.h_phone='$_POST[h_phone]', profile.bank_ac='$_POST[bank_ac]' WHERE login.username = '$test' AND login.username=profile.username"); 



/*	if (!mysql_query($sql,$db))
  	{
  		die('Error: ' . mysql_error());
  	}*/
	//echo "Successfull";
	header('Location:edit_profile.php');

		/*}
	else{
			echo "Fill UP Everything Correctly";
		
		}*/
	mysql_close($db);
?>