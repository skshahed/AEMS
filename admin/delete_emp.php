<?php 
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AEMS</title>
<link rel="stylesheet" href="css/styles.css" />
</head>

<body>
	<div id="header"></div>
        <div id="navmenu">	
  		<?php	
            include 'header2.php';
         ?>   
         </div>   
		<div id="reg">
        <br /><br /><br />
		<form>
        
	<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="2" cellpadding="3">
	 <tr>
	   <th align="center" colspan="5" height="40px" style="font-size:18px"><b><u>Success Message</u></b></th>
   </tr>
  <tr> 
  	<td width="100">&nbsp;</td>
    <td  width="60" align="center"></td>
    <td></td>
  </tr>  
  
<tr> 
  	<td align="center" colspan="5">  
<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );

if(isset($_SESSION['username']))
{
	
	include 'db.php';
	if (!$db)
 		{
 			die('Could not connect: ' . mysql_error());
  		}
	else
	{
	
	//$test=$_SESSION['username'];
	
	include 'dbname.php';
	
	if(!empty($_POST) && isset($_POST['remove']))
	{
		$user = $_POST['hidden'];
		
		$sql = mysql_query("SELECT username FROM login WHERE username = '$user'");
		$count=mysql_num_rows($sql);
		if($count)
		{
			$delete = "DELETE FROM login WHERE username = '$user'";
			$update="UPDATE profile SET state='Ex' WHERE username='$user'";
			$result = mysql_query($delete, $db) or die(mysql_error($db));
			if($result !== false)
			{
				echo'Remove User Access Action is Successful.';
			}
		
			$result2 = mysql_query($update, $db) or die(mysql_error($db));
			
			if($result2 !== false)
			{
				echo"Updated User as Ex-User";
			}
		}
		else
		{
			echo"User doesn't Exist";
		}	
	}
	
	elseif(!empty($_POST) && isset($_POST['access']))
	{
		$user = $_POST['hidden'];
		$state = $_POST['state'];
		$date = date('Y-m-d');
		$sql = mysql_query("SELECT username FROM profile WHERE username = '$user'");
		$count=mysql_num_rows($sql);
		if($count)
		{
			
			$update="UPDATE profile SET state='Current' WHERE username='$user'";
			$result2 = mysql_query($update, $db) or die(mysql_error($db));
			if($result2 !== false)
			{
				echo"Updated User as Current User.";
			}
			
			$restore = "INSERT INTO login (username, password, date) VALUES
			('$user','123456','$date')";
			$result = mysql_query($restore, $db) or die(mysql_error($db));
			if($result !== false)
			{
			echo'Gain User Access is Successful';
			}
				//echo"Didn't Change Anything.Try again later.";
			
		}
		else
		{
			echo"User doesn't Exist";
		}	
	}
	
	elseif(!empty($_POST) && isset($_POST['delete']))
	{
		$user = $_POST['hidden'];
		$sql = mysql_query("SELECT username FROM profile WHERE username = '$user'");
		$count=mysql_num_rows($sql);
		if($count)
		{
			
			$delete = "DELETE FROM payroll WHERE payroll.username = '$user'";
			
			$delete2 = "DELETE FROM login WHERE username = '$user'";
			
			$delete3 = "DELETE FROM profile WHERE username = '$user'";
			
			//$delete = "DELETE login,profile,payroll FROM login,profile,payroll WHERE profile.username = '$user' AND profile.username = login.username AND profile.username = payroll.username";
			
			$result = mysql_query($delete, $db) or die(mysql_error($db));
			$result2 = mysql_query($delete2, $db) or die(mysql_error($db));
			$result3 = mysql_query($delete3, $db) or die(mysql_error($db));
			
			if($result3 !== false)
			{
			echo'Delete User information is Successful';
			}
			
		}
		else
		{
			echo'Something Not Right';
		}	
	}
	
	elseif(!empty($_POST) && isset($_POST['paydelete']))
	{
		$user = $_POST['hidden'];
		$sql = mysql_query("SELECT username FROM payroll WHERE username = '$user'");
		$count=mysql_num_rows($sql);
		if($count)
		{
			$delete = "DELETE FROM payroll WHERE payroll.username = '$user'";
			$result = mysql_query($delete, $db) or die(mysql_error($db));
			if($result !== false)
			{
			echo'Delete User payment information is Successful';
			}
			
			else
			{
				echo"Didn't Change Anything";
			}
		}
		else
		{
			echo'Something Not Right';
		}	
	}
	
	
	
	
	
	

		echo'</td> 
  	</tr>';	
	echo '<tr>';
    	echo ' <td width="90px"><br></td>';
    echo '</tr>';

	mysql_close($db);
}
}
	else{
			echo '<tr><td align="center">You are not Logged In</tr></td>';
		}

?>

</table>

</form>


		
		<br /><br /><br />
		</div><!-- end of reg-->
        
     <div id="footer">
	<?php

	include 'footer.php';

?>
	</div>
	
</body>
</html>
