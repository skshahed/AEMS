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
<?php

	if(isset($_POST['client']))
		{

		
		require 'db.php';
		
		if (!$db)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		//$c_id = $_POST['c_id'];
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
    	$c_phone = $_POST['c_phone'];
		$c_gender = $_POST['c_gender'];
		
		require 'dbname.php';

		$sql="INSERT INTO client (c_name, c_email, c_phone, c_gender) VALUES
			('$c_name','$c_email','$c_phone','$c_gender')";
			
		$result=mysql_query($sql, $db) or die(mysql_error($db));
	
		mysql_close($db);
		
		header('Location: successful.php');
		
		}
		
	else
	{

?>
 <div id="header"></div>  <!-- end of header-->
 <div id="navmenu" >
 
 <?php
	
		include 'header2.php';	
?>
	
    
</div>
    
		<div id="reg">
        <br /><br />
		<form method="post" action="add_client.php">
        
	<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="1" cellpadding="1">
	 <tr>
	   <th align="center" colspan="5" height="20px" style="font-size:25px"><b><u>Add New Client</u></b></th>
   </tr>
	 <tr> <td width="40px">&nbsp;</td>
    <td  width="60" align="center"></td>
    <td></td>
  </tr>
  
 
  
  <tr>
    <td></td>
	<td width="150px">Client Name</td> 
    <td width="30px">:</td>
    <td><input type="text" size="25" required="required" name="c_name" /></td>
   
  </tr>
  
  <tr>
    <td></td>
	<td>Client Email</td> 
    <td>:</td>
    <td><input type="email" size="25" required="required" name="c_email" /></td>
  </tr>

  
  
  <tr>
    <td></td>
	<td>Client Phone</td> 
    <td>:</td>
    <td><input type="text" size="25" required="required" name="c_phone" /></td>
  </tr>
  
  
  <tr>
    <td></td>
	<td>Client Gender</td> 
    <td>:</td>
    <td><input type="radio" name="c_gender" value="Male" checked="checked" />Male <input type="radio" name="c_gender" value="Female" />Female </td>
  </tr>
  
  <!--<tr>
    <td></td>
	<td>Net Salary</td> 
    <td>:</td>
    <td><input type="text" size="25" required="required" name="net_salary" /></td>
  </tr>-->
  
  <tr>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	    <td align="left" height="20"><br><input type="submit" name="client" value="Done" />&nbsp; &nbsp;
     <input type="reset"  /><br><br></td>

    <td></td>
  </tr>
  
  <tr>
    <td width="90px"><br><br></td>
  </tr>
    
</table>
</form>

	</div>	
	
    <div id="footer">
<?php

	include 'footer.php';

?>
</div>
<?php
	}
	
?>


</body>
</html>
