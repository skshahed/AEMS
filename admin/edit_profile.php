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
	<div id="header"> </div> <!-- end of header-->
	  	<div id="navmenu">
    							
                <?php	
					include 'header2.php';
				?>
        </div>    
       <div id="reg">
		<form method="post" action="edit_profile_data.php">
        <br /><br /><br />
	<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="2" cellpadding="3">
	 <tr>
	   <th align="center" colspan="5" height="40px" style="font-size:18px"><b><u>Edit My Profile</u></b></th>
   </tr>
	 <tr> <td width="15px">&nbsp;</td>
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
	
	$test=$_SESSION['username'];
	
	include 'dbname.php';
	
	$result = mysql_query("SELECT * FROM login,profile WHERE login.username = '$test' AND login.username=profile.username"); 
  	
	if($result === FALSE) {
    	die(mysql_error()); // TODO: better error handling
	}
	
	while($row = mysql_fetch_array($result))
	{
		
		
 	echo '<tr>';
    	echo ' <td width="60px"></td>';
    	echo '  <td width="130px">Username</td>';
		echo '<td align="center">:</td>';
    	//echo '<td align="left" width="180px">' . $row['username'] . "</td>";
		echo '<td align="left">' . $row['username'] . "</td>";
    echo '</tr>';
	
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Full Name</td>';
		echo '<td align="center">:</td>';
    	//echo '<td align="left">' . $row['name'] . "</td>";
		echo '<td align="left"><input type="text" name="name" required="true" value="' . $row['name'] . '"/></td>';
		echo ' <td width="15px"></td>';
    echo '</tr>';
	
	
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Password</td>';
		echo '<td align="center">:</td>';
    	//echo '<td align="left">' . $row['password'] . "</td>";
		echo '<td align="left"><input type="password" name="password" required="true" value="' . $row['password'] . '"/></td>';
    echo '</tr>';
	
	
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>E-Mail</td>';
		echo '<td width="60px" align="center">:</td>';
    	//echo '<td align="left">' . $row['email'] . "</td>";
		echo '<td align="left"><input type="email" name="email" required="true" value="' . $row['email'] . '"/></td>';
    echo '</tr>';
	
  
    echo '<tr>';
    	echo ' <td></td>';
    	echo ' <td>Permanent Address</td>';
		echo '<td align="center">:</td>';
    	//echo '<td align="left">' . $row['p_addr'] . "</td>";
		echo '<td align="left"><input type="text" name="p_addr" required="true" value="' . $row['p_addr'] . '"/></td>';
    echo '</tr>';
  
    
  
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Current Address</td>';
		echo '<td align="center">:</td>';
    	//echo '<td align="left">' . $row['c_addr'] . "</td>";
		echo '<td align="left"><input type="text" name="c_addr" required="true" value="' . $row['c_addr'] . '"/></td>';
    echo '</tr>';
  
    echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Phone No.</td>';
		echo '<td align="center">:</td>';
    	//echo '<td align="left">' . $row['phone'] . "</td>";
		echo '<td align="left"><input type="text" name="phone" required="true" value="' . $row['phone'] . '"/></td>';
    echo '</tr>';
	
	echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Home Phone No.</td>';
		echo '<td align="center">:</td>';
    	//echo '<td align="left">' . $row['h_phone'] . "</td>";
		echo '<td align="left"><input type="text" name="h_phone" required="true" value="' . $row['h_phone'] . '"/></td>';
    echo '</tr>';
	
	echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td>Bank A/C No.</td>';
		echo '<td align="center">:</td>';
    	//echo '<td align="left">' . $row['bank_ac'] . "</td>";
		echo '<td align="left"><input type="text" name="bank_ac" required="true" value="' . $row['bank_ac'] . '"/></td>';
    echo '</tr>';
	
/*	echo '<tr>';
    	echo ' <td width="15px"></td>';
    	echo '  <td>Gender</td>';
		echo '<td align="center">:</td>';
    	echo '<td align="left">' . $row['gender'] . "</td>";
		echo '<td align="left"><input type="radio" name="gender" value="Male" checked="checked" />Male <input type="radio" name="gender" value="Female"/>Female </td>';
    echo '</tr>';
  */
    
	
}

	mysql_close($db);
}

	else{
			echo '<tr><td align="center">You are not Logged In</tr></td>';
		}

?>

<tr>
<td></td>
<td></td>
<td></td>
<td align="right"><br><input type="submit" value="Save"><br><br></td>
<td></td>
</tr>

</table>

</form>


		
		</div>
		<!-- end of reg-->
<div id="footer">
	<?php

	include 'footer.php';

?>
</div>
	
</body>
</html>
