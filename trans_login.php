<?php 
session_start();

//ob_start();
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	
	
	if($username && $password)
	{
		
		require 'db.php';
		
		if (!$db)
 		{
 			die('Could not connect: ' . mysql_error());
  		}
		
		else 
		{		
			require 'dbname.php';
			
			$query=("SELECT username,password,type FROM login WHERE  username='$username' AND password='$password'");
			
			$result=mysql_query($query, $db) or die(mysql_error($db));
			
			$count=mysql_num_rows($result);
			
		
			if($count)
			{
			$row = mysql_fetch_assoc($result);
				

				
				$username = $row['username'];
				$date = date('Y-m-d H:i:s');
				//$date = GETDATE();
				
				$sql="INSERT INTO log_details (username,en_time) VALUES ('$username','$date')";
		
				$insert = mysql_query($sql, $db) or die(mysql_error($db));
				
				$_SESSION['username'] = $row['username'];
				$_SESSION['type'] = $row['type'];
				
				if($_SESSION['type']==admin)
				{
					header('Location: ./admin/admin.php');
				}
				else if($_SESSION['type']==emp)
				{
					header('Location: index.php');
				}
				
			}
			else
			{
				echo "<script>alert('Wrong Username or Password!');</script>";
				$_SESSION['error']="Wrong Username or Password!";
				header('Location:login.php');
			}
			
			mysql_close($db);
			/*else
			{
				
		
			header('Location:error.php');
			ob_end_flush();
	
			}*/
		}
	} 
	else 
	{
		if(empty($username))
		{
			header('Location:login.php');
			//echo 'Please Enter Username';
			//ob_end_flush();
		}
		
		else if(empty($password))
		{
			header('Location:login.php');
			//echo 'Please Enter Password';
		}
		
	}


?>