<?php 
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AEMS</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div id="header"></div>
        <div id="navmenu">	
  		<?php	
            include 'header.php';
         ?>   
         </div>   
<div id="reg">		
        <br /><br /><br />
   <form action="view_report.php" method="post">     
	<table align="center" width="800px" border="1" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="2" cellpadding="3">
	 <tr>
	   <th align="center" colspan="6" height="40px" style="font-size:18px"><b><u>Work File</u></b></th>
   </tr>
 
  <tr>
    	<td width="170px" height="30px" align="center"><b>File Name</b></td>
		<td width="120px" height="30px" align="center"><b>Project ID</b></td>
    	<td width="170px" height="30px" align="center"><b>File Uploader</b></td>
        <td width="170px" height="30px" align="center"><b>File Size</b></td>
        <td width="80px" align="center"><b>Rating</b></td>
       <!-- <td width="170px" align="center"><b>Rate Work <br />(Based on 5)</b></td> -->
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
	
	$test=$_SESSION['username'];
	
	require_once 'dbname.php';
		
		
	
	
	$result = mysql_query("SELECT * FROM work_report WHERE username='$test'");
  	$count = mysql_num_rows($result);
	
	/*if($result === FALSE) 
	{
    	die(mysql_error()); // TODO: better error handling
	}
	*/
if($count>0)
{
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
	$crate=0;
	$counter=0;
	
	$max = 'LIMIT '.($pagenum - 1)*$page_rows.',' .$page_rows; //sets the range to display in our query
	
	$result_a = mysql_query("SELECT * FROM work_report WHERE username='$test' ORDER BY file_id DESC $max");
		
 	echo '<tr>';
			
			while($row = mysql_fetch_array($result_a))
			{
				$filesize = round($row['filesize']/1024,2);
				$mb = round($filesize/1024,2);
				
    	echo '<td align="left">' . $row['filename'] . '</td>';
		echo '<td align="center">' . $row['p_id'] . '</td>';
    	echo '<td align="left">' . $row['username'] . '</td>';
		echo '<td align="left">' . $filesize . ' KB or '. $mb .' MB' . '</td>';
		echo '<td align="center" >' . $row['rating'] . '</td>';
		
		if($row['rating']!=NULL)
		{
		$crate=$row['rating']+$crate;
		$counter=$counter+1;
		
		}
    echo '</tr>';
			}
			
		if($row['rating']!=NULL)
		{
	echo '<tr>
			<td colspan="5" align="center">Avarage Rating =>' .round($crate/$counter,1) .'</td>
		</tr>';
		}
	echo '<tr><td colspan="5" align="center">';
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
}
else
{
	echo'<tr height="50px"><td colspan="6" align="center">No Rating Yet</td></tr>';
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
