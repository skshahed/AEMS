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
        
	<form action="view_attend.php" method="post">
       
  
<?php

if(isset($_SESSION['username']))
{
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );
	
	include 'db.php';
	if (!$db)
 		{
 			die('Could not connect: ' . mysql_error());
  		}
	else
	{
	
	//$test=$_SESSION['username'];
	include 'dbname.php';
	
		if(!empty($_POST) && isset($_POST['emp_attend']))
		{
			$pathname=$_POST['username'];
			$showdate=$_POST['show_date'];
			echo'<table align="center" width="650" border="1" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="2" cellpadding="3">
			<tr>
	   			<th align="center" colspan="5" height="60px" style="font-size:18px"><b><u>Employee Attendance</u></b></th>
   			</tr>';
	
  		echo'<tr>
			
    		<td width="200px" height="30px" align="center"><b>Username</b></td>
        	<td colspan="3" width="200px" height="30px" align="center"><b>'.$pathname.'</b></td>
  		</tr>';
		echo'<tr>
    		
        	<td align="center"><b>Date</b></td>
			<td align="center"><b>Day</b></td>
        	<td align="center"><b>Present</b></td>
  		</tr>';
		
		
			$result = mysql_query("SELECT username,date FROM attend WHERE username='$pathname' AND date LIKE '$showdate%' ORDER BY date ASC");
  			$count = mysql_num_rows($result);
	
	/*if($result === FALSE) 
	{
    	die(mysql_error()); // TODO: better error handling
	}
	*/
		if($count==0)
		{
			echo'<tr height="50px"><td colspan="6" align="center">No Result Found.</td></tr>';
		}
		
		else
		{
			while($row = mysql_fetch_array($result))
			{	
				$db_date=$row['date'];
				$daytime=strtotime($db_date);
				$onlydate=date("Y-m-d",$daytime);
				$day=date("l",$daytime);
				echo '<tr>';
    				echo '<td align="center">' . $onlydate . '</td>';
					echo '<td align="center">' . $day. '</td>';
    				echo '<td align="center">Yes</td>';
				echo'</tr>';
			}
		}
		
		echo'<tr>
        	<td colspan="5" align="center"><b>Total Present this month = '.$count. '  Day' .'</b></td>
  		</tr>';
		
   		echo'<tr height="10px">
  		</tr>';
				
			
		}
		
		
		else
		{
		echo'<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="2" cellpadding="3">
	 	<tr>
	   		<th align="center" colspan="5" height="40px" style="font-size:18px"><b><u>Select Employee</u></b></th>
   		</tr>
	 	<tr> <td width="100">&nbsp;</td>
    		<td  width="60" align="center"></td>
    		<td></td>
  		</tr>';
  
	$result = mysql_query("SELECT username FROM profile WHERE state='Current' ORDER BY username ASC");
	
	$count=mysql_num_rows($result);
  	
		if($result === FALSE) 
		{
    		die(mysql_error()); // TO DO: better error handling
		}
	
	echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="120px">Username</td>';
		echo '<td align="left">:</td>';
	
		
		
		
		echo'<td align="left">';
				echo'<select name="username" style="width:170px;">';
				$start=1;
				for($start=1;$start<=$count;$start++)
				{
					while($row = mysql_fetch_array($result))
					{
						echo'<option>' . $row['username'] . '</option>';
						//echo'<input type="hidden" name="pathname" value="' . $row['username'] . '" />';
					}
				}
				
				echo'</select>';
			//echo'<input type="hidden" name="pathname" value="' . $row['username'] . '" />';
			echo'</td>';
    echo '</tr>';
	
	$date = date('Y-m');
  echo'<tr>
	<td></td>
    <td>Select Month</td>
    <td>:</td>
	<td><input type="month" min="2013-01" max="'.$date.'" required="required" name="show_date" /></td>
    <td></td>
  </tr>';
	
 echo'<tr>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	    <td align="left" height="20"><br><input type="submit" name="emp_attend" value="Next" />&nbsp; &nbsp;
     <input type="reset"  /><br><br></td>

    <td></td>
  </tr>';
	
  
	echo '<tr>';
    	echo ' <td width="90px"><br><br></td>';
    echo '</tr>';

//}
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
