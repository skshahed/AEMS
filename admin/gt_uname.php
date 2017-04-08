<?php 
 include("db.php");
 include("dbname.php");
 echo "string";
$value = $_POST['value'];
					$query3="SELECT * FROM profile WHERE username='$value'";
						$result3=mysql_query($query3);
						$num_rows=mysql_num_rows($result3);
						if ($num_rows!=0) 
						{
							echo "Username allready exists!";						
						}				
?>