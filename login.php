<?php
	session_start();
	$f=0;
	if(isset($_SESSION['error']))
	{
		$f=1;
		$message=$_SESSION['error'];
		unset($_SESSION['error']);
	}
?>


<html>
<head>
<title>AEMS</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div id="leftpart">
    </div>
    
    <div id="midpart">
		<div id="header"></div>
    	<div id="navmenu">
        	<?php	
					include 'header.php';
			?>
        </div>
    	<div id="bodypart">
			
        	<div id="log">	
            
            <form action="trans_login.php" method="post">
				<table align="center" width="50%" border="0" bgcolor="#00CCFF" style="border:groove; border-color:#6699FF; border-radius:15px;" cellspacing="3" cellpadding="3">
	 			
	   			<th align="center" colspan="4" height="40px" style="font-size:24px"><b><u>Log In</u></b></th>
   				
 				<tr> 
                	<td width="50">&nbsp;</td>
				</tr>
                
				<tr>
    				<td></td>
    				<td>User Name</td>
   	 				<td align="center" width="50">:</td>
    				<td><input type="text" name="username" required placeholder="Your User Name"/></td>
  				</tr>
                
                <tr>
    				<td></td>
    				<td>Password</td>
    				<td align="center">:</td>
    				<td><input type="password" name="password" required placeholder="Your Password"/></td>
                </tr>
                
  				<tr>
					<td></td>
    				<td></td>
	  				<td></td>
    				<td align="left" height="20"><br><input type="Submit" name="ok" value="Log In"></td>
  				</tr>
                
   				<tr>
					<td colspan="4" align="center">
				<?php
				if($f==1)
				{
					$f=0;
					echo '<strong style="color:red; font-size:24px;">'.$message.'</strong>';
				}
				?></td>
  				</tr>
				<tr>
				
				</tr>
			</table>
			
			</form>
			
            
            </div>
            
        </div>
    	<div id="footer">
        	<?php	
					include 'footer.php';
			?>
        
        </div>
    </div>
    
    <div id="rightpart">
    </div>    

</body>

</html>