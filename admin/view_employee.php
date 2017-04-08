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
		<form action="delete_emp.php" method="post">
        
	<table hspace="100px" align="left" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="5" cellpadding="3">
	 <tr>
	   <th align="center" colspan="5" height="40px" style="font-size:18px"><b><u>Employee Profile</u></b></th>
   </tr>
  <tr> 
  	<td>&nbsp;</td>
    <td></td>
    <td width="60px"></td>
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
	$crate=0;
	$counter=0;
	$test=$_GET['id'];
	$state=$_POST['state'];
	$test1=$_POST['username'];
	
	require 'dbname.php';
	
	$result_r = mysql_query("SELECT * FROM work_report WHERE username='$test'");
  	$count_r = mysql_num_rows($result_r);
	
	if($count_r>0)
	{
		while($row = mysql_fetch_array($result_r))
			{
				if($row['rating']!=NULL)
				{
					$crate=$row['rating']+$crate;
					$counter=$counter+1;
				}
			}
				
				echo '<tr>';
    				echo ' <td width="60px"></td>';    
    				echo '  <td width="150px">Rating(Based On 5)</td>';
					echo '<td align="left">:</td>';
    				echo '<td align="left">' . round($crate/$counter,1) . "</td>";
    			echo '</tr>';
	}
	
	
	$result = mysql_query("SELECT * FROM profile WHERE username = '$test' OR username = '$test1'");
  	
	if($result === FALSE) {
    	die(mysql_error()); // TODO: better error handling
	}
	
	while($row = mysql_fetch_array($result))
	{
		
		
 	echo '<tr>';
    	echo ' <td width="60px"></td>';
    	echo '  <td width="150px">Username</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['username'] . "</td>";
			$hidden = $row['username'];
			echo'<input type="hidden" value="'.$hidden.'" name="hidden" />';
    echo '</tr>';
	
    echo '<tr>';
    	echo ' <td></td>';    
    	echo '  <td>Full Name</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['name'] . "</td>";
    echo '</tr>';
	
	
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Email</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['email'] . "</td>";
			$useremail = $row['email'];
			echo'<input type="hidden" value="$useremail" name="useremail" />';
    echo '</tr>';
	
  
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Gender</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['gender'] . "</td>";
    echo '</tr>';
	
	echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Birth Date</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['birth_date'] . "</td>";
    echo '</tr>';
  
      
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Permanent Address</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['p_addr'] . "</td>";
    echo '</tr>';
  
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Current Address</td>';
		echo '<td>:</td>';
    	echo '<td align="left">' . $row['c_addr'] . "</td>";
    echo '</tr>';
	 
	
	echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Phone No.</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['phone'] . "</td>";
    echo '</tr>';
  
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Home Phone No.</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['h_phone'] . "</td>";
    echo '</tr>';
	
	echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Bank A/C No.</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['bank_ac'] . "</td>";
    echo '</tr>';

	echo '<tr>';
    	echo ' <td><br></td>';
    echo '</tr>';

	echo'<tr>
    	<td>&nbsp;</td>';
		
		
		if($row['state']=='Current')
		{
	    echo'<td colspan="2" align="right">
			<input type="submit" value="Remove Access" name="remove" />
		</td>';
		}
		elseif($row['state']=='Ex')
		{
		//echo'<input type="hidden" value="'.$row['state'].'" name="state" />';
	    echo'<td colspan="2" align="right">
			<input type="submit" value="Restore Access" name="access" />
		</td>';
		}
		echo'<td>
			<input type="submit" value="Delete All Info." name="delete" />
		</td>
 	</tr>';
	

	/*echo '<tr>';
    	echo ' <td><br><br></td>';
    echo '</tr>';
*/
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

<form  action="delete_emp.php" method="post">

<table hspace="700px" frame="above" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="2" cellpadding="3">
	 <tr>
	   <th align="center" colspan="5" height="40px" style="font-size:18px"><b><u>Employee Payment History</u></b></th>
   </tr>
 <tr> 
 	<td width="100">&nbsp;</td>
    <td  width="60" align="center"></td>
    <td></td>
  </tr>
  
  
  
  <?php

if(isset($_SESSION['username']))
{
	require 'db.php';
	if (!$db)
 		{
 			die('Could not connect: ' . mysql_error());
  		}
	else
	{
	
	$test=$_POST['username'];
	
	require 'dbname.php';
	
	$result = mysql_query("SELECT * FROM payroll WHERE username = '$test' ");
	
	$count=mysql_num_rows($result);
	
	if($count==0){
		
		echo '<tr>';
    		echo ' <td width="30px"></td>';
    		echo '<td width="300px" align="center">No Payment History Added</td>';
    	echo '</tr>';
		
		}
		
  	else
	{
	
	while($row = mysql_fetch_array($result))
	{
		
	
	
 	echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Username</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['username'] . "</td>";
			$hidden = $row['username'];
			echo'<input type="hidden" value="'.$hidden.'" name="hidden" />';
    echo '</tr>';
	
    echo '<tr>';
    	echo ' <td width="30px"></td>';    
    	echo '  <td width="150px">Rank</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['rank'] . "</td>";
    echo '</tr>';
	
	
    echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Salary</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['salary'].' TK.' . "</td>";
    echo '</tr>';
	
  
    echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Overtime</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['overtime'] .' TK.' . "</td>";
    echo '</tr>';
  
      
    echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Bonus</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['bonus'] .' TK.' . "</td>";
    echo '</tr>';
  
  $netsalary=$row['overtime']+$row['bonus']+$row['salary'];
  
    echo '<tr>';
    	echo ' <td width="90px"></td>';
    	echo '  <td width="150px">Net Salary</td>';
		echo '<td width="60px">:</td>';
    	echo '<td align="left">' . $netsalary .' TK.' . "</td>";
    echo '</tr>';
	
	echo '<tr>';
    	echo ' <td><br></td>';
    echo '</tr>';

	echo'<tr>
    	<td></td>
    	<td></td>
	    <td align="left"></td>
		<td>
			<input type="submit" value="Delete Pay Info." name="paydelete" />
		</td>
 	</tr>';
	 
	echo '<tr>';
    	echo ' <td width="90px"><br><br></td>';
    echo '</tr>';

	}

	mysql_close($db);
	}
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
