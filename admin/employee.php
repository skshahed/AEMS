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
 <form action="view_employee.php" method="post">
	<table align="center" width="900px" border="1" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="2" cellpadding="3">
	 <tr>
	   <th align="center" colspan="6" height="40px" style="font-size:18px"><b><u>Employee List</u></b></th>
   </tr>
 
  <tr>
    	<td width="170px" height="30px" align="center"><b>Username</b></td>
		<td width="180px" height="30px" align="center"><b>Full Name</b></td>
    	<td width="170px" height="30px" align="center"><b>E-mail</b></td>
        <td width="170px" height="30px" align="center"><b>Phone</b></td>
        <td align="center"><b>Details</b></td>
  </tr>
   <tr height="10px">
  </tr>
  
<?php

//if(isset($_SESSION['username']))
//{
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );
	require_once 'db.php';
	if (!$db)
 		{
 			die('Could not connect: ' . mysql_error());
  		}
	else
	{
	
	//$test=$_SESSION['username'];
	
	require_once 'dbname.php';
		
		
	
	
	$result = mysql_query("SELECT * FROM profile WHERE state='Current'");
  	$count = mysql_num_rows($result);
	
	/*if($result === FALSE) 
	{
    	die(mysql_error()); // TODO: better error handling
	}
	*/
	
	if(!(isset($pagenum)))
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
	
	$result_a = mysql_query("SELECT * FROM profile WHERE state='Current' ORDER BY name ASC $max");
		
 	echo '<tr>';
			
			while($row = mysql_fetch_array($result_a))
			{
    	echo '<td align="left">' . $row['username'] . '</td>';
		//echo '<td align="left">' . $row['leave_id'] . '</td>';
			//echo'<input type="hidden" value="'.$row['username'].'" name="username" />';
		
		echo '<td align="left">' . $row['name'] . '</td>';
    	echo '<td align="left">' . $row['email'] . '</td>';
		echo '<td align="left">' . $row['phone'] . '</td>';
		echo '<td align="center">';
			//$view=$row['leave_id'];
			//echo'<input type="submit" name="view" value="Click" />';
		
		echo '<button type="button"><a href="view_employee.php?id='. $row["username"] . '">Click</button></a>';		
		echo '</td>';
	
    echo '</tr>';
		
			}
			//echo'<input type="hidden" name="state" value="Current" />';
			
	echo '<tr><td colspan="6" align="center">';
		echo"(Total Current Employee = ".$count.")";
	echo '</td></tr>';
	
	echo '<tr><td colspan="6" align="center">';
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
	
	//mysql_close($db);
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
