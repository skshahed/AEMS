<?php 
//session_start();
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
     <form action="update_project.php" method="post">
	<table align="center" width="1100px" border="1" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="2" cellpadding="3">
	 <tr>
	   <th align="center" colspan="10" height="40px" style="font-size:18px"><b><u>Project</u></b></th>
   </tr>
 
  <tr>
    	<td width="150px" height="30px" align="center"><b>Project ID</b></td>
		<td width="150px" height="30px" align="center"><b>Project Name</b></td>
    	<td width="150px" height="30px" align="center"><b>Project Incharge</b></td>
        <td width="150px" height="30px" align="center"><b>Project Status</b></td>
        <td width="150px" height="30px" align="center"><b>Start Date</b></td>
    	<td width="150px" height="30px" align="center"><b>Client ID</b></td>
        <td width="150px" height="30px" align="center"><b>Company</b></td>
        <td width="150px" height="30px" align="center"><b>Company Address</b></td>
        <td width="150px" height="30px" align="center"><b>End Date</b></td>
        <td width="150px" align="center"><b>Decision</b></td>
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
	$result = mysql_query("SELECT * FROM project");
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
	
	$result_a = mysql_query("SELECT * FROM project ORDER BY p_id DESC $max");
		
 	echo '<tr>';
			
			while($row = mysql_fetch_array($result_a))
			{
				//$filesize = round($row['filesize']/1024,2);
				//$mb = round($filesize/1024,2);
				
    	echo '<td align="center">' . $row['p_id'] . '</td>';
			//echo'<input type="hidden" value="'.$row['p_id'].'" name="p_id" />';
		echo '<td align="left">' . $row['p_name'] . '</td>';
    	echo '<td align="left">' . $row['p_incharge'] . '</td>';
		echo '<td align="left">' . $row['p_status'] . '</td>';
		echo '<td align="left">' . $row['start_date'] . '</td>';
    	echo '<td align="left">' . $row['client_id'] . '</td>';
		echo '<td align="left">' . $row['company'] . '</td>';
		echo '<td align="left">' . $row['co_addr'] . '</td>';
		echo '<td align="left">' . $row['end_date'] . '</td>';
		echo '<td align="center">';
		
			if($row['p_status']=='Running')
			{
			echo '<button type="button"><a href="update_project.php?id='. $row["p_id"] . '">Click  to  End</button></a>';
			}
			if($row['p_status']=='Closed')
			{
			echo '<button type="button">Already Ended</button>';
			}
		echo '</td>';
	
    echo '</tr>';
			}
	echo '<tr><td colspan="10" align="center">';
		echo"--Page $pagenum of $last--";	
	echo '</td></tr>';
			
	echo '<tr><td colspan="10" align="center">';	
	if($pagenum == 1)
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
