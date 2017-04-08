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

	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );

	/*if(!empty($_POST) && isset($_POST['payment']))
	{
			
		if(!empty($_POST) && isset($_POST['rank']))
		{

		
		require 'db.php';
		
		if (!$db)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		require 'dbname.php';
	
		$username = $_POST['username'];
		$rank = $_POST['rank'];
		//$salary = $_POST['salary'];
    	$overtime = $_POST['overtime'];
		//$date = date('Y-m-d');
		$bonus = $_POST['bonus'];
		
		if($overtime<0)
			{
				$overtime=0;
			}
			
		if($bonus<0)
			{
				$bonus=0;
			}
		
		if($_POST['rank']=='CTO')
			$salary = 100000;
		elseif($_POST['rank']=='Project Manager')
			$salary = 85000;
		elseif($_POST['rank']=='System Analyst')
			$salary = 75000;
		elseif($_POST['rank']=='Human Resources')
			$salary = 65000;
		elseif($_POST['rank']=='Marketing')
			$salary = 65000;
		elseif($_POST['rank']=='Accounts')
			$salary = 60000;
		elseif($_POST['rank']=='Sr. Software Engineer')
			$salary = 60000;
		elseif($_POST['rank']=='Sr. Graphics Designer')
			$salary = 55000;
		elseif($_POST['rank']=='Sr. QC/QA')
			$salary = 50000;
		elseif($_POST['rank']=='Software Engineer')
			$salary = 45000;
		elseif($_POST['rank']=='Graphics Designer')
			$salary = 40000;	
		elseif($_POST['rank']=='QC/QA')
			$salary = 35000;
		elseif($_POST['rank']=='Junior Software Engineer')
			$salary = 25000;
		//elseif($_POST['rank']=='Others')
			//$salary = 15000;
			
		//$net_salary = $salary + $overtime + $bonus;
		
		

		$sql="INSERT INTO payroll (username, rank, salary, overtime, bonus) VALUES
			('$username','$rank','$salary','$overtime','$bonus')";
			
		$result=mysql_query($sql, $db) or die(mysql_error($db));
		
		}
		else
		{
			require 'db.php';
		
			if (!$db)
  			{
  				die('Could not connect: ' . mysql_error());
  			}
			require 'dbname.php';
			
			$username = $_POST['username'];
    		$overtime = $_POST['overtime'];
			$bonus = $_POST['bonus'];
			
			if($overtime<0)
			{
				$overtime=0;
			}
			
			if($bonus<0)
			{
				$bonus=0;
			}
			
			$sql="UPDATE payroll SET overtime='$overtime',bonus='$bonus' WHERE username='$username'";
			
			$result=mysql_query($sql, $db) or die(mysql_error($db));
			
		}
		
	
		mysql_close($db);
		
		header('Location: successful.php');
		
		}
		
	else
	{
*/
?>
 <div id="header"></div>  <!-- end of header-->
 <div id="navmenu" >
 
 <?php
	
		include 'header2.php';	
?>
	
    
</div>
    
		<div id="reg">
        <br /><br />
		<form method="post" action="add_payment.php">
        
	<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="1" cellpadding="1">
	 <tr>
	   <th align="center" colspan="5" height="20px" style="font-size:25px"><b><u>Add Employee payment</u></b></th>
   </tr>
	 <tr> <td width="40px">&nbsp;</td>
    <td  width="60" align="center"></td>
    <td></td>
  </tr>

  <tr>
    <td></td>
	<td width="150px">UserName</td> 
    <td width="30px">:</td>
    <?php
    	echo"<td>" . $_POST['username'] . "</td>";
	?>
  </tr>
  
  
  <tr>
    <?php
		/*$user = $_POST['username'];
    	echo"<td>";
			echo"<input type=hidden name=username value='$user' />";
		echo"</td>";*/
    ?>
  </tr>

<?php  
  		/*require 'db.php';
		
		if (!$db)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		require 'dbname.php';
		//$showone=1;
		//$nomore=1;
		$noneed=1;
		
		$result = mysql_query("SELECT username FROM payroll");
		$count=mysql_num_rows($result);
		
		while($row = mysql_fetch_array($result))
		{
			//for($start=1;$start<=$count;$start++)
			//$showone=1;
			//$nomore=1;
				$miss=$row['username'];
				if($user == $miss)
				{
					$noneed=5;
				}
				if($user != $miss)
				{
					$showone=11;
				}
				
		}
				
				if($showone==11 && $noneed!=5)
				{
					//$nomore=$nomore+1;
  echo'<tr>
    <td></td>
	<td>Rank</td> 
    <td>:</td>
    <td>
    
        <select name="rank" style="width:145px">
   			<option value="CTO">Chief Technology Officer(CTO)</option>
            <option value="Project Manager">Project Manager</option>
            <option value="System Analyst">System Analyst</option>
            <option value="Human Resources">Human Resources</option>
            <option value="Marketing">Marketing</option>
            <option value="Accounts">Accounts</option>
            <option value="Sr. Software Engineer">Sr. Software Engineer</option>
            <option value="Sr. Graphics Designer">Sr. Graphics Designer</option>
            <option value="Sr. QC/QA">Sr. QC/QA</option>
            <option value="Software Engineer">Software Engineer</option>
            <option value="Graphics Designer">Graphics Designer</option>
            <option value="QC/QA">QC/QA</option>
            <option value="Junior Software Engineer">Junior Software Engineer</option>
		</select>
    </td>
   
  </tr>';
*/
//			}

?>  
<!--  <tr>
    <td></td>
	<td>Salary</td> 
    <td>:</td>
    <td><input type="text" size="25" required="required" name="salary" /></td>
   
  </tr>
 --> 
 
 
 <?php  
  	/*	require 'db.php';
		
		if (!$db)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		require 'dbname.php';
		$user = $_POST['username'];
		
		$result2 = mysql_query("SELECT * FROM payroll WHERE username='$user'");
		$count2=mysql_num_rows($result2);
		
		
	if($count2>0)
	{
		while($row = mysql_fetch_array($result2))
		{
 
 echo' <tr>
    <td></td>
	<td>Overtime</td> 
    <td>:</td>';
    echo'<td>';
		echo'<input type="number" min="0" size="25" required="true" name="overtime" value="'.$row['overtime'].'" /></td>';
  echo'</tr>';

  
  
  echo'<tr>
    <td></td>
	<td>Bonus</td> 
    <td>:</td>';
    echo'<td><input type="number" min="0" size="25" required="true" name="bonus" value="'.$row['bonus'].'" /></td>';
  echo'</tr>';
		}
	}
	
	else
	{
		*/
	$date = date('Y-m-d');	
	echo'<tr>
    	<td></td>
		<td width="100px">Date</td> 
    	<td>:</td>
    	<td><input type="date" min="2013-01-01" max="'.$date.'"  size="35" required="required" name="edit_date" /></td>
  	</tr>';
	
	echo'<tr>
    	<td></td>
		<td>Additional Bonus</td>
    	<td>:</td>';
    	echo'<td><input type="number" min="0" size="25" required="required" name="add_bonus" placeholder="Number Only" ></td>';
  	echo'</tr>';
  	
	echo' <tr>
    	<td></td>
		<td>Working Day</td> 
    	<td>:</td>';
    	echo'<td>';
		echo'<input type="number" min="0" max="27" size="35" required="required" name="work_day" placeholder="0-27" ></td>';
  	echo'</tr>';
		
	echo' <tr>
    	<td></td>
		<td>Present Day</td> 
    	<td>:</td>';
    	echo'<td>';
		echo'<input type="number" min="0" max="27" size="35" required="required" name="pre_day" placeholder="0-27" ></td>';
  	echo'</tr>';

  
  
  echo'<tr>
    <td></td>
	<td>Bonus day</td>
    <td>:</td>';
    echo'<td><input type="number" min="0" max="10" size="35" required="required" name="bonus_day" placeholder="0-10" ></td>';
  echo'</tr>';
  
  
	//}
  
  ?>
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
	    <td align="left" height="20"><br><input type="submit" name="payment" value="Done" />&nbsp; &nbsp;
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
//	}
	
?>


</body>
</html>
