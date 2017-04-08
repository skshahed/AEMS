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
   <form action="attendance.php" method="post">     
	<table align="center" width="650px" border="1" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="2" cellpadding="3">
	 <tr>
	   <th align="center" colspan="6" height="40px" style="font-size:18px"><b><u>Daily Attendance</u></b></th>
   </tr>
 
 <?php

//if(isset($_SESSION['username']))
//{
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );
	require 'db.php';
	if (!$db)
 		{
 			die('Could not connect: ' . mysql_error());
  		}
	else
	{
	
	//$test=$_POST['username'];
	
	require 'dbname.php';
	
	if(!empty($_POST) && isset($_POST['submit']) && (!empty($_POST['attend'])))
		{
		//$att_user=$_POST['attend'];
		$date = date('Y-m-d H:i:s');
		
		foreach($_POST['attend'] as $att_user)
		{
			$sql="INSERT INTO attend(username,date) VALUES('$att_user','$date')";
		
			$result = mysql_query($sql, $db) or die(mysql_error($db));
		}
		echo'<tr>
   			<td height="100px" align="center" colspan="5">';
				echo'Action Successful.Attendance Added.';
			echo'</td>';
		echo'</tr>';
		}
	
	elseif(!empty($_POST) && isset($_POST['edit']))
		{
			header('Location: edit_attend.php');
		}
		
	elseif(!empty($_POST) && isset($_POST['view']))
		{
			/*echo'<dialog id="window">
				<h1>Hi you </h1>
			</dialog>';*/
			header('Location: view_attend.php');
		}
		
	else
	{	

 
  echo'<tr>
    	<td width="200px" height="30px" align="center"><b>Employee Name</b></td>
        <td width="200px" height="30px" align="center"><b>Username</b></td>
		<td width="120px" height="30px" align="center"><b>Date</b></td>
        <td align="center"><b>Mark</b></td>
  </tr>
   <tr height="10px">
  </tr>';
  
		
	//echo'<input type="hidden" name="username" value="' . $test . '" />';	
	
	
	$result = mysql_query("SELECT name,username FROM profile WHERE state='Current' ORDER BY name ASC");
  	$count = mysql_num_rows($result);
	
	/*if($result === FALSE) 
	{
    	die(mysql_error()); // TODO: better error handling
	}
	*/
if($count==0)
{
	echo'<tr height="50px"><td colspan="6" align="center">No Employee</td></tr>';
}

else
{
	/*if(!(isset($pagenum)))
	{
		$pagenum = 1;
		
	}
	
	if(isset($_GET['pagenum']))
	{
		$pagenum=($_GET['pagenum']);
	}
	
		
	$page_rows = 5;
	
	$last = ceil($count/$page_rows); //page number of last page
	
	
	if($pagenum < 1)
	{
		$pagenum = 1;
	}
	
	elseif($pagenum > $last)
	{
		$pagenum = $last;
	}

	
	$max = 'LIMIT '.($pagenum - 1)*$page_rows.',' .$page_rows; //sets the range to display in our query
	
	*/
	//$result_a = mysql_query("SELECT * FROM log_details WHERE username='$test' ORDER BY log_id DESC");
		
 	
			
			while($row = mysql_fetch_array($result))
			{
				$date = date('Y-m-d');
	echo '<tr>';
    	echo '<td align="center">' . $row['name'] . '</td>';
		echo '<td align="center">' . $row['username'] . '</td>';
    	echo '<td align="center">' . $date . '</td>';
		
		$pro_user=$row['username'];
		$result2 = mysql_query("SELECT date,username FROM attend WHERE date LIKE '$date%' AND username='$pro_user' limit 200");
		$count2 = mysql_num_rows($result2);
		//$result2 = mysql_query("SELECT attend.date,attend.username,profile.username FROM attend INNER JOIN profile ON date='$date' AND attend.username=profile.username");
		
		if($count2==0)
		{
			echo '<td align="center" ><input type="checkbox" name="attend[]" value="'.$pro_user.'"></td>';
			//echo '<td align="center" ><input type="hidden" name="username" value="'.$row['username'].'"></td>';
		}
		else
		{
			echo '<td align="center" ><b>Attend</b></td>';
		}
    echo '</tr>';
			}
			
			
		echo '<tr>';	
			echo '<td colspan="5" align="right">';
				echo'<input type="submit" name="view" value="View" />';
				echo'<input type="submit" name="edit" value="Edit" />';
				echo'<input type="submit" name="submit" value="Submit" />';
			echo '</td>';
		echo '</tr>';
		

	/*echo '<tr><td colspan="5" align="center">';
		echo"--Page $pagenum of $last--";	
	echo '</td></tr>';
			
	echo '<tr><td colspan="6" align="center">';	
	if($pagenum == 1)
	{
		
	}
	
	elseif(!$pagenum)
	{
		
	}
	
	
	else
	{
		echo"<a href='{$_SERVER['PHP_SELF']}?pagenum=1'> <<-First</a>";
		//echo"  ";
		
		$previous = $pagenum-1;
		echo"<a href='{$_SERVER['PHP_SELF']}?pagenum=$previous'> <-Previous</a>";
	}
	
	echo" -------- ";
	
	
	if($pagenum == $last)
	{
		
	}
	
	else
	{
		$next = $pagenum+1;
		echo"<a href='{$_SERVER['PHP_SELF']}?pagenum=$next'>Next -></a>";
		//echo" ";
		
		//$previous = $pagenum - 1;
		echo"<a href='{$_SERVER['PHP_SELF']}?pagenum=$last'>Last ->></a>";
		//$_SESSION['page']=$next;
	}
	 echo '</td></tr>';
*/

	}
	
   	echo'<tr height="10px">
  	</tr>';
}

	mysql_close($db);
}
/*}
	else{
			echo '<tr><td align="center">You are not Logged In</tr></td>';
		}
*/
?>

</table>
</form>
		
		<br /><br /><br />
</div>        
     <div id="footer">
	<?php

	include 'footer.php';

?>
	</div>
	
</body>
</html>
