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

	

	if(!empty($_POST) && (isset($_POST['project'])))
		{

		
		require 'db.php';
		
		if (!$db)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		$p_name = $_POST['p_name'];
		//$p_id = $_POST['p_id'];
		//$p_status = $_POST['p_status'];
		$start_date = date('Y-m-d');
		$p_incharge = $_POST['p_incharge'];
    	//$p_member = $_POST['p_member'];
		$client_id = $_POST['client_id'];
		$company = $_POST['company'];
		$co_addr = $_POST['co_addr'];
		
		require 'dbname.php';

		$sql="INSERT INTO project (p_name, start_date, p_incharge, client_id, company, co_addr) VALUES
			('$p_name','$start_date','$p_incharge','$client_id','$company','$co_addr')";
			
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
		<form method="post" action="add_project.php">
        
	<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="3" cellpadding="1">
	 <tr>
	   <th align="center" colspan="5" height="20px" style="font-size:25px"><b><u>Create New Project</u></b></th>
   </tr>
	 <tr> <td width="40px">&nbsp;</td>
    <td  width="60" align="center"></td>
    <td></td>
  </tr>
  
  
  
  <tr>
    <td></td>
	<td width="150px">Project Name</td> 
    <td width="30px">:</td>
    <td><input type="text" size="25" required="required" name="p_name" /></td>
   
  </tr>
  
<!--  <tr>
    <td></td>
	<td width="150px">Project Id</td> 
    <td width="30px">:</td>
    <td><input type="text" size="25" required="required" name="p_id" /></td>
   
  </tr> 
  
  <tr>
    <td></td>
	<td>Project Status</td> 
    <td>:</td>
    <td>
    	<select name="p_status" style="width:175px">
   			<option value="Running">Running</option>
            <option value="Closed">Closed</option>
		</select>
    </td>
  </tr>  -->
 
 
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
	
	include 'dbname.php';
	
	$result = mysql_query("SELECT username,name FROM profile ORDER BY name ASC");
	
	$count=mysql_num_rows($result);
  	
	if($result === FALSE) {
    	die(mysql_error()); // TO DO: better error handling
	}
	
	echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td width="150px">Project Incharge</td>';
		echo '<td width="30px">:</td>';
	
		
		
		
		echo'<td>';
				echo'<select name="p_incharge" style="width:175px">';
				$start=1;
				for($start=1;$start<=$count;$start++)
				{
					while($row = mysql_fetch_array($result))
					{
						echo"<option value=" . $row['username'] . ">" ;
						echo $row['name'] . '(' . $row['username'] . ')' ;
						echo"</option>";
						
					}
				}
				
				echo'</select>';
			
			echo'</td>';
    echo '</tr>';
	
	mysql_close($db);
	}
}
	else{
			echo '<tr><td align="center">You are not Logged In</tr></td>';
		}

?>

 
 
  
 <!-- <tr>
    <td></td>
	<td>Project Member</td> 
    <td>:</td>
    <td><input type="text" size="25" required="required" name="p_member" /></td>
  </tr> -->
  
  
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
	
	include 'dbname.php';
	
	$result = mysql_query("SELECT c_id,c_name FROM client ORDER BY c_name ASC");
	
	$count=mysql_num_rows($result);
  	
	if($result === FALSE) {
    	die(mysql_error()); // TO DO: better error handling
	}
	
	echo '<tr>';
    	echo ' <td></td>';
    	echo '  <td width="150px">Client Name</td>';
		echo '<td width="30px">:</td>';
	
		
		
		
		echo'<td>';
				echo'<select name="client_id" style="width:175px">';
				$start=1;
				for($start=1;$start<=$count;$start++)
				{
					while($row = mysql_fetch_array($result))
					{
						echo"<option value=" . $row['c_id'] . ">" ;
						echo $row['c_name'] . '(' . $row['c_id'] . ')' ;
						echo"</option>";
						
					}
				}
				
				echo'</select>';
			
			echo'</td>';
    echo '</tr>';
	
	mysql_close($db);
	}
}
	else{
			echo '<tr><td align="center">You are not Logged In</tr></td>';
		}

?>

  
  
  <tr>
    <td></td>
	<td>Company Name</td> 
    <td>:</td>
    <td><input type="text" size="25" required="required" name="company" placeholder="Project for the Company" /></td>
  </tr>
  
  
  <tr>
    <td></td>
	<td>Company Address</td> 
    <td>:</td>
    <td><input type="text" size="25" required="required" name="co_addr" /></td>
  </tr>
  
  
  <tr>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	    <td align="left" height="20"><br><input type="submit" name="project" value="Done" />&nbsp; &nbsp;
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
