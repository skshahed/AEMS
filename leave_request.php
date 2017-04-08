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
<?php

	//$subject = $_POST['subject'];
    //$message = $_POST['message'];

	if(isset($_POST['subject']))
		{
		
		require 'db.php';
		
		if (!$db)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
	
		$test=$_SESSION['username'];
		$subject = $_POST['subject'];
    	$message = $_POST['message'];
		
		
		require 'dbname.php';

		$sql="INSERT INTO leave_request (username, subject, message) VALUES
			('$test','$subject','$message')";
		
		header('Location: successful.php');
		
		if (!mysql_query($sql,$db))
  		{
  			die('Error: ' . mysql_error());
  		}
		
		mysql_close($db);
		
		
		}
		
	else
	{

?>
 <div id="header"></div>  <!-- end of header-->
 <div id="navmenu" >
 
 <?php
	
		include 'header.php';	
?>
	
    
</div>
    
		<div id="reg">
        <br /><br />
		<form method="post" action="leave_request.php">
        
	<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="1" cellpadding="1">
	 <tr>
	   <th align="center" colspan="5" height="20px" style="font-size:25px"><b><u>Write Leave Request</u></b></th>
   </tr>
	 <tr> <td width="40px">&nbsp;</td>
    <td  width="60" align="center"></td>
    <td></td>
  </tr>
  
  <tr>
    <td></td>
	<td>Subject :</td> 
    <td></td>
  </tr>
  
  <tr>
    <td></td>
    <td><input type="text" required="required" name="subject" size="72" placeholder="Enter Your Subject Here!"></td> 
    <td></td>
  </tr>
  
 <tr>
    <td></td>
    <td>Message :</td> 
    <td></td>
 </tr>
  	<tr>
	   <td></td>
    	<td><textarea required="required"  name="message" cols="55" rows="15" placeholder="Write Your Message Here !"></textarea></td> 
    	<td></td>
	</tr>
  
  <tr>
	<td>&nbsp;</td>
	    <td align="left" height="20"><br><input type="submit" value="Send">&nbsp; &nbsp;
     <input type="reset"  /><br><br></td>

    <td></td>
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
