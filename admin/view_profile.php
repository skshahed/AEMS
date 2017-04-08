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
	   <th align="center" colspan="5" height="40px" style="font-size:18px"><b><u>My Profile</u></b></th>
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
	
	$result = mysql_query("SELECT * FROM login,profile WHERE login.username = '$test' AND login.username=profile.username");
  	
	if($result === FALSE) {
    	die(mysql_error()); // TODO: better error handling
	}
	
	while($row = mysql_fetch_array($result))
	{
		
		
 	echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Username</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['username'] . "</td>";
    echo '</tr>';
	
    echo '<tr>';
    	echo ' <td width="30px"></td>';    
    	echo '  <td width="150px">Full Name</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['name'] . "</td>";
    echo '</tr>';
	
	
    echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Password</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['password'] . "</td>";
    echo '</tr>';
	
	
    echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Email</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['email'] . "</td>";
    echo '</tr>';
	
  
    echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Gender</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['gender'] . "</td>";
    echo '</tr>';
  
      
    echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Permanent Address</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['p_addr'] . "</td>";
    echo '</tr>';
  
    echo '<tr>';
    	echo ' <td width="90px"></td>';
    	echo '  <td width="150px">Current Address</td>';
		echo '<td width="60px">:</td>';
    	echo '<td align="left">' . $row['c_addr'] . "</td>";
    echo '</tr>';
	 
	
	echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Phone No.</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['phone'] . "</td>";
    echo '</tr>';
  
    echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Home Phone No.</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['h_phone'] . "</td>";
    echo '</tr>';
	
	echo '<tr>';
    	echo ' <td width="30px"></td>';
    	echo '  <td width="150px">Bank A/C No.</td>';
		echo '<td align="left">:</td>';
    	echo '<td align="left">' . $row['bank_ac'] . "</td>";
    echo '</tr>';

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
