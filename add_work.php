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

	if(isset($_POST['upload'])) // Has a file been uploaded?
    {
        // See if it is of one of the allowed mime types, change these if you like
        if (($_FILES['uploadedfile']['type'] == "application/doc")||
            ($_FILES['uploadedfile']['type'] == "application/docx") ||
			($_FILES['uploadedfile']['type'] == "application/pdf") ||
			($_FILES['uploadedfile']['type'] == "application/xls") ||
			($_FILES['uploadedfile']['type'] == "application/xlsx") ||
			($_FILES['uploadedfile']['type'] == "text/plain"))
        { 
        require 'db.php';
		if (!$db)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
           
		require 'dbname.php'; 
			
		if ($_FILES["uploadedfile"]["error"] > 0)
    	{
   			echo "Return Code: " . $_FILES["uploadedfile"]["error"] . "<br />";
    	}
  		else
    	{
    		//echo "Temp file: " . $_FILES["uploadedfile"]["tmp_name"] . "<br />";
			
    		if (file_exists("upload/" . $_FILES["uploadedfile"]["name"]))
      		{
      			echo $_FILES["uploadedfile"]["name"] . " already exists. ";
      		}
    		else
      		{
				$test = $_SESSION['username'];
            	$filetype = $_FILES['uploadedfile']['type'];
            	$filesize = $_FILES['uploadedfile']['size'];
            	$filename = $_FILES['uploadedfile']['name'];
    			$p_id = $_POST['p_id'];
				
      			move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],
      			"upload/" . $_FILES["uploadedfile"]["name"]);
      			//echo "Stored in: " . "upload/" . $_FILES["uploadedfile"]["name"];
				
				// Stick it into the database.
				$query = "INSERT INTO work_report (username,filename,p_id,filesize,filetype) VALUES ('$test','$filename','$p_id','$filesize','$filetype')";
           		mysql_query($query);
				header('Location:successful.php');
      		}
    	}
			
			
			
            // Stick it into the database.
			
			mysql_close($db);
        }
        // If it wasn't one of the allowed file types do this:
        else 
        {
            echo "Invalid File type<br>";
        }
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
        <br /><br /><br /><br />
		<form enctype='multipart/form-data' name='fileupload' action='add_work.php' method='POST'>
        
	<table align="center" width="550" border="0" bgcolor="#00CCFF" style="border:ridge; border-color:gray; border-radius:10px;" cellspacing="1" cellpadding="1">
    
  <tr>
	<td height="20px"></td>
  </tr>
	<tr>
	   <th align="center" colspan="5" height="20px" style="font-size:25px"><b><u>Add New File</u></b></th>
  	</tr>
	
  <tr>
	<td height="20px"></td>
  </tr>         
            
  <tr>
	<td height="50px"></td>
    <td></td>
    <td></td>
	<td align="left" height="20"><br> <input type='file' name='uploadedfile'> <br /></td>

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
	
	include 'dbname.php';
	
	$result = mysql_query("SELECT p_id FROM project ORDER BY p_id ASC");
	
	$count=mysql_num_rows($result);
  	
	if($result === FALSE) {
    	die(mysql_error()); // TO DO: better error handling
	}
	
	echo '<tr>';
    	echo ' <td height="50px"></td>';
    	echo '  <td width="80px">Project ID</td>';
		echo '<td width="30px">:</td>';
	
		
		
		
		echo'<td>';
				echo'<select name="p_id" style="width:85px;">';
				$start=1;
				for($start=1;$start<=$count;$start++)
				{
					while($row = mysql_fetch_array($result))
					{
						echo"<option value=" . $row['p_id'] . ">" ;
						echo $row['p_id'] ;
						echo"</option>";
						
					}
				}
				
				echo'</select>';
			
			echo'</td>';
			echo '<td></td>';
    echo '</tr>';
	
	mysql_close($db);
	}
}
	else{
			echo '<tr><td align="center">You are not Logged In</tr></td>';
		}

?>

  
  
  
  
  
  
  <tr>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
      <td><input type='submit' name='upload' value='Upload File'>  &nbsp; &nbsp;
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
