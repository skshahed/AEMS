<?php
	session_start();
	//ob_start();
	$f=0;
	if(isset($_SESSION['error']))
	{
		$f=1;
		$message=$_SESSION['error'];
		unset($_SESSION['error']);
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AEMS</title>
<link rel="stylesheet" href="css/styles.css" />
<script type="text/javascript">
// function gt_uname(){
              // var name=document.getElementById('username').value;
              // alert(name);
              // $.ajax({
                // type: "POST", 
                // url: "gt_uname.php",
                // data: "value="+name,
                // success: function(message){ 
                  // $("#ajax").html(message);
                // }       
              // });
            // }
</script>
</head>

<body>
<?php

	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );
	if(isset($_POST['name']))
		{
			
		include 'db.php';
		
		if (!$db)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
		include 'dbname.php';
		$username = $_POST['username'];
		///////
		$query3="SELECT * FROM profile WHERE username='$username'";
		$result3=mysql_query($query3, $db);
		$num_rows=mysql_num_rows($result3);
		//mysql_close($db);
		if ($num_rows!=0) 
		{
			//$f=1;
			//$message="Username allready exists!";
			echo "<script>alert('Username allready exists!');</script>";
			$_SESSION['error']="Username allready exists!";
			header('Location:add_emp.php');
			//ob_end_flush();			
		}	
		////////////
		else
		{
    	$password = $_POST['password'];
		$date = date('Y-m-d');
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$h_phone = $_POST['h_phone'];
		$gender = $_POST['gender'];
		$type = $_POST['type'];
		$birth_date = $_POST['birth_date'];
		$p_addr = $_POST['p_addr'];
		$c_addr = $_POST['c_addr'];
		$bank_ac = $_POST['bank_ac'];
		
		

		$sql="INSERT INTO login (username, password, type, date) VALUES
			('$username','$password','$type','$date')";
			
		
			
		$sqrl="INSERT INTO profile (username, name, email, phone, h_phone, gender, birth_date, p_addr, c_addr, bank_ac) VALUES
			('$username','$name','$email','$phone','$h_phone','$gender','$birth_date','$p_addr','$c_addr','$bank_ac')";
			
			
		$result2=mysql_query($sqrl, $db) or die(mysql_error($db));
		$result=mysql_query($sql, $db) or die(mysql_error($db));
	
		mysql_close($db);
		
		header('Location: successful.php');
		}
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
		<form method="post" action="add_emp.php">
        
	<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="1" cellpadding="1">
	 <tr>
	   <th align="center" colspan="5" height="20px" style="font-size:25px"><b><u>Create Account</u></b></th>
	   
   </tr>
	 <tr> <td width="40px">&nbsp;</td>
    <td  width="60" align="center"></td>
    <td></td>
  </tr>
  
  <tr>
    <td></td>
	<td width="150px">Full Name</td> 
    <td width="30px">:</td>
    <td><input type="text" size="40" required="required" name="name" placeholder="Enter User Full Name Here!" /></td>
  </tr>
  
  <tr>
    <td></td>
	<td>Username</td> 
    <td>:</td>
    <td><input type="text" size="40" id="username" required="required" name="username" placeholder="Enter User's Username Here!" /></td>
    <td></td>
  </tr>
  
  <tr>
    <td></td>
	<td></td> 
    <td></td>
    <td>
    	<?php
				if($f==1)
				{
					$f=0;
					echo '<strong style="color:red; font-size:14px;">'.$message.'</strong>';
				}
		?>
    </td>
  </tr>
  
  <tr>
    <td></td>
	<td>Password</td> 
    <td>:</td>
    <!--td><input type="password" size="40" required="required" name="password" placeholder="Enter User's Passworrd Here!" onClick="gt_uname();"/></td-->
    <td><input type="password" size="40" required="required" name="password" placeholder="Enter User's Passworrd Here!"/></td>
  </tr>

  
  
  <tr>
    <td></td>
	<td>Email</td> 
    <td>:</td>
    <td><input type="email" size="40" required="required" name="email" placeholder="Enter User's E-mail Here!" /></td>
  </tr>
  
  <tr>
    <td></td>
	<td>Permanent Address</td> 
    <td>:</td>
    <td><input id="password"  type="text" size="40" required="required" name="p_addr" placeholder="Enter User's Permanent Address Here!" /></td>
  </tr>
  
  <tr>
    <td></td>
	<td>Current Address</td> 
    <td>:</td>
    <td><input type="text" size="40" required="required" name="c_addr" placeholder="Enter User's Current Address Here!" /></td>
  </tr>
  
    
  <tr>
    <td></td>
	<td>Phone No.</td> 
    <td>:</td>
    <td><input type="text" size="40" pattern="[0-9]*" required="required" name="phone" placeholder="Enter User's Phone Number Here!" /></td>
  </tr>
  
  <tr>
    <td></td>
	<td>Home Phone No.</td> 
    <td>:</td>
    <td><input type="text" size="40" pattern="[0-9]*" required="required" name="h_phone" placeholder="Enter User's Home Phone Number Here!" /></td>
  </tr>
  
 <tr>
    <td></td>
    <td>Bank Account No.</td> 
    <td>:</td>
    <td><input type="text" size="40" required="required"  name="bank_ac" placeholder="Enter User's Bank Account Number Here!" /></td> 
 </tr>
 
 <tr>
    <td></td>
	<td>User Type</td> 
    <td>:</td>
    <td><select name="type" style="width:153px">
   			<option value="admin">Admin</option>
            <option value="emp">Employee</option>
		</select></td>
  </tr>
 
 <tr>
    <td></td>
	<td>Birth Date</td> 
    <td>:</td>
    <td><input type="date" min="1900-01-01" max="2000-01-01"  size="35" required="required" name="birth_date" /></td>
  </tr>
 
 
 <tr>
    <td></td>
	<td>Gender</td> 
    <td>:</td>
    <td><input type="radio" name="gender" value="Male" checked="checked" />Male <input type="radio" name="gender" value="Female" />Female </td>
  </tr>
  
  <tr>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	    <td align="left" height="20"><br><input type="submit" value="Done" />&nbsp; &nbsp;
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
