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

	if(!empty($_POST) && (isset($_POST['workrate'])))
	{
		
		require 'db.php';
		
		if (!$db)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
	
		//$id = $_GET['id'];
		$rating = $_POST['rating'];
		$id = $_POST['id'];
		
		require 'dbname.php';
		
		
		$sql="UPDATE work_report SET rating='$rating' WHERE file_id='$id'";
		
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
	}	
	
	else
	{
		echo'Something Not Right';
	}	


	
		echo'</td> 
  	</tr>';	
	echo '<tr>';
    	echo ' <td width="90px"><br></td>';
    echo '</tr>';

mysql_close($db);

}
	else{
			echo '<tr><td colspan="5" align="center">You are not Logged In</tr></td>';
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
