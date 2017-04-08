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

function spamcheck($field)
  {
  //filter_var() sanitizes the e-mail
  //address using FILTER_SANITIZE_EMAIL
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }

if (isset($_REQUEST['email']))
  {
  $mailcheck = spamcheck($_REQUEST['email']);
  if ($mailcheck==FALSE)
    {
    echo "Invalid input";
    }
  else
    {
	
	$name = $_REQUEST['name'] ;
    $email = $_REQUEST['email'] ;
    $subject = $_REQUEST['subject'] ;
    $message = $_REQUEST['message'] ;
    mail("shahed007cse@gmail.com", "Name: $name","Subject: $subject","Massage: $message", "From: $email");
    include 'successful.php';
	
    }
  }
else
  {//if "email" is not filled out, display the form
 // session_start();
  
  ?>

 <div id="header"></div>  <!-- end of header-->
 <div id="navmenu" >
 
 <?php
	
		include 'header.php';	
?>
	
    
</div>
    
		<div id="reg">
        <br /><br />
		<form method="post" action="contact.php">
        
	<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="1" cellpadding="1">
	 <tr>
	   <th align="center" colspan="5" height="20px" style="font-size:25px"><b><u>Contact Us</u></b></th>
   </tr>
	 <tr> <td width="40px">&nbsp;</td>
    <td  width="60" align="center"></td>
    <td></td>
  </tr>
  <tr>
     <td width="30px"></td>
    <td width="200px">Name :</td> 
    <td></td>
  </tr>
   <tr>
      <td></td>
    <td><input type="text" required="required" size="60" placeholder="Enter Your Name ! " name="name"/></td>
    <td></td>
  </tr>
  <tr>
     <td></td>
    <td>E-Mail :</td> 
    <td></td>
  </tr>
  <tr>
     <td></td>
    <td><input type="text" required="required" size="60" placeholder="Enter Your E-Mail ID !" name="email"/></td> 
    <td></td>
  </tr>
   <tr>
     <td></td>
    <td>Subject :</td> 
    <td></td>
  </tr>
  <tr>
     <td></td>
    <td><input type="text" required="required" size="60" placeholder="Enter Your Subject Here!" name="subject"></td> 
    <td></td>
  </tr>
  
 <tr>
    <td></td>
    <td>Message :</td> 
    <td></td>
  </tr>
  <tr>
	   <td></td>
    <td><textarea required="required" cols="55" rows="10" placeholder="Write Your Message Here !"  name="massage"></textarea></td> 
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
