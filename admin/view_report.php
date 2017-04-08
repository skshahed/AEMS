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
		<form action="update_report.php" method="post">
        
	<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="2" cellpadding="3">
	 <tr>
	   <th align="center" colspan="5" height="40px" style="font-size:18px"><b><u>View Report Information</u></b></th>
   </tr>
  <tr height="20px">
   <td></td>
  </tr>
  
<?php

if(isset($_SESSION['username']))
{
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );
	
	if(!empty($_POST) && (isset($_POST['accept']) || isset($_POST['reject'])))
		{
		
		require 'db.php';
		
		if (!$db)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
	
		$id = $_POST['id'];
		//$accept = 'Accepted';
    	//$reject = 'Rejected';
		
		require 'dbname.php';
		
		if(isset($_POST['accept']))
		{
		$sql="UPDATE leave_request SET status='Accepted' WHERE leave_id='$id'";
		}
		elseif(isset($_POST['reject']))
		{
		$sql="UPDATE leave_request SET status='Rejected' WHERE leave_id='$id'";
		}
		$result = mysql_query($sql, $db) or die(mysql_error($db));
		echo'<tr>
   			<td align="center" colspan="5">';
				echo'Action Successful';
			echo'</td>';
		echo'</tr>';
		if (!mysql_query($sql,$db))
  		{
  			die('Error: ' . mysql_error());
  		}
		
		mysql_close($db);
		
		
		}
		
	else
	{

	
	require 'db.php';
	if (!$db)
 		{
 			die('Could not connect: ' . mysql_error());
  		}
	else
	{
	
	//$leave_id=$_POST['leave_id'];
	$file_id = $_GET['id'];
	//$view=$_POST['view'];
	
	require 'dbname.php';
	
	$result = mysql_query("SELECT * FROM work_report WHERE file_id = '$file_id'");
  	
	if($result === FALSE) {
    	die(mysql_error()); // TODO: better error handling
	}
	
	while($row = mysql_fetch_array($result))
	{
			$filesize = round($row['filesize']/1024,2);
			$mb = round($filesize/1024,2);
		
 	echo '<tr>';
    	echo '<td width="30px"></td>';
    	echo '<td width="100px">File Name</td>';
		echo '<td width="30px" align="left">:</td>';
    	echo '<td align="left">' . $row['filename'] . "</td>";
		echo '<td width="10px"></td>';
    echo '</tr>';
	
    echo '<tr>';
    	echo '<td></td>';    
    	echo '<td>Project ID</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['p_id'] . "</td>";
    echo '</tr>';
	
	
    echo '<tr>';
    	echo '<td></td>';
    	echo '<td>File Uploader</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['username'] . "</td>";
    echo '</tr>';
	
    echo '<tr>';
    	echo '<td></td>';
    	echo '<td>File Size</td>';
		echo '<td align="left">:</td>';
    	//echo '<td align="left">' . $row['filesize'] . "</td>";
		echo '<td align="left">' . $filesize . ' KB or '. $mb .' MB' . '</td>';
    echo '</tr>';
  
  
  	if($row['rating']==NULL)
	{
		echo '<tr>';
    		echo '<td><br></td>';
    	echo '</tr>';
		
	echo '<tr>';
    	echo '<td></td>';
		echo '<td>Give Rating</td>';
    	echo '<td align="left">:</td>';
		echo '<td align="left">';
			echo'<input type="radio" required="required" name="rating" value="1" />';
			echo'<input type="radio" required="required" name="rating" value="2" />';
			echo'<input type="radio" required="required" name="rating" value="3" />';
			echo'<input type="radio" required="required" name="rating" value="4" />';
			echo'<input type="radio" required="required" name="rating" value="5" />';
			echo'<input type="hidden" value="'.$row['file_id'].'" name="id" />';
			echo'<input type="submit" name="workrate" value="Rate" />';
		echo '</td>';
		
		echo '<td></td>';
    echo '</tr>';
	
	 
    echo '<tr>';
    	echo '<td width="90px"></td>';
		echo '<td></td>';
    	echo '<td></td>';
		echo '<td></td>';	
		echo '<td align="center">';
			echo'<input type="hidden" value="'.$row['filename'].'" name="filename" />';
			echo'<a href="../upload/'.$row['filename'].'"><button type="button">View</button></a>';
		echo '</td>';
		echo '<td></td>';
    echo '</tr>'; 
	}
	
	else
	{
		echo '<tr>';
    		echo '<td></td>';
    		echo '<td>Rating</td>';
			echo '<td align="left">:</td>';
    		echo '<td align="left">' . $row['rating'] . "</td>";
    	echo '</tr>';
		
		echo '<tr>';
    		echo '<td><br></td>';
    	echo '</tr>';
		
		echo '<tr>';
			echo '<td width="90px"></td>';
			echo '<td></td>';
    		echo '<td></td>';
		
			echo '<td align="center">';
				echo'<input type="hidden" value="'.$row['filename'].'" name="filename" />';
				echo'<a href="../upload/'.$row['filename'].'"><button type="button">View</button></a>';
				echo'<button type="button">Already Rated</button>';
			echo '</td>';
    		//echo '<td align="center" colspan="6"></td>';
    	echo '</tr>';
	}
	
	
	echo '<tr>';
    	echo ' <td><br><br></td>';
    echo '</tr>';

	}
	}
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
