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
		<form>
        <br /><br /><br />
	<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="2" cellpadding="3">
	 <tr>
	   <th align="center" colspan="5" height="40px" style="font-size:18px"><b><u>My Permission Request</u></b></th>
   </tr>
	 <tr> <td>&nbsp;</td>
    <td  width="60" align="center"></td>
    <td></td>
  </tr>
  
<?php

if(isset($_SESSION['username']))
{
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );
	require 'db.php';
	if (!$db)
 		{
 			die('Could not connect: ' . mysql_error());
  		}
	else
	{
	
	$test=$_SESSION['username'];
	
	require 'dbname.php';
	
	$result = mysql_query("SELECT * FROM leave_request WHERE username = '$test'");
	
	$count=mysql_num_rows($result);
	if($result === FALSE) {
    	die(mysql_error()); // TODO: better error handling
	}
	
	if($count==0)
	{
		echo '<tr>';
    		echo ' <td></td>';
    		echo '  <td width="450px" align="center">You have no Permission Request</td>';
    		echo '<td align="left"></td>';
    	echo '</tr>';	
	}
	
	else
	{
		
	if(!(isset($pagenum)))
	{
		$pagenum = 1;
		
	}
	
	if(isset($_GET['pagenum']))
	{
		$pagenum=($_GET['pagenum']);
	}
	
		
	$page_rows = 1;
	
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
	
	$result_a = mysql_query("SELECT * FROM leave_request WHERE username = '$test' ORDER BY date DESC $max");
	
		
	
	while($row = mysql_fetch_array($result_a))
	{
		
		
 	echo '<tr>';
    	echo ' <td width="60px"></td>';
    	echo '  <td width="100px">Username</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['username'] . "</td>";
    echo '</tr>';
	
	
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Subject</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['subject'] . "</td>";
    echo '</tr>';
	
	echo '<tr>';
    	echo ' <td></td>';    
    	echo '  <td>Message</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left"></td>';
    echo '</tr>';
	
	echo '<tr>';
    	echo ' <td></td>';    
    	echo '  <td></td>';
    	echo '<td colspan="4" align="left">' . $row['message'] . "</td>";
    echo '</tr>';
	
	echo '<tr>';
    	echo ' <td></td>';    
    echo '</tr>';
	
	
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Date</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['date'] . "</td>";
    echo '</tr>';
  
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Status</td>';
		echo '<td>:</td>';
    	echo '<td align="left">' . $row['status'] . "</td>";
    echo '</tr>';
	 
	}
}
	echo '<tr><td colspan="10" align="center">';
		echo"--Page $pagenum of $last--";	
	echo '</td></tr>';
			
	echo '<tr><td colspan="10" align="center">';	
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
