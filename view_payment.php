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
	   <th align="center" colspan="5" height="40px" style="font-size:18px"><b><u>My Payment Details</u></b></th>
   </tr>
	 <tr> <td width="100">&nbsp;</td>
    <td  width="60" align="center"></td>
    <td></td>
  </tr>
  
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
	
	$test=$_SESSION['username'];
	
	include 'dbname.php';
	
	$result = mysql_query("SELECT * FROM profile,payroll WHERE profile.username = '$test' AND profile.username=payroll.username ");
  	
	if($result === FALSE) {
    	die(mysql_error()); // TODO: better error handling
	}
	
	while($row = mysql_fetch_array($result))
	{
	
    echo '<tr>';
    	echo ' <td width="30px"></td>';    
    	echo '  <td width="150px">Full Name</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['name'] . "</td>";
    echo '</tr>';
	
	echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">User Name</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['username'] . "</td>";
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
    	echo '<td align="left">' . $row['salary'] . ' TK.'."</td>";
    echo '</tr>';
	
  
    echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Overtime Pay</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['overtime'] . ' TK.'. "</td>";
    echo '</tr>';
  
      
    echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Bonus</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['bonus'] . ' TK.'. "</td>";
    echo '</tr>';
  	$net_salary=$row['salary']+$row['overtime']+$row['bonus'];
    echo '<tr>';
    	echo ' <td width="90px"></td>';
    	echo '  <td width="150px">Total Salary</td>';
		echo '<td width="60px">:</td>';
    	echo '<td align="left">' . $net_salary . ' TK.'. "</td>";
    echo '</tr>';
	 
	
/*	echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Overall Salary</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['all_salary'] . "</td>";
    echo '</tr>';*/
  

	echo '<tr>';
    	echo ' <td width="90px"><br><br></td>';
    echo '</tr>';

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
