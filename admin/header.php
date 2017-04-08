				
                <a href="admin.php" class="one">Home</a>
    			<a href="view_profile.php" class="two">Profile</a>
    			<a href="add_emp.php" class="three">Manage Employee</a>
    			<a href="permission.php" class="four">Administrative Permissions</a>
                <a href="announcement.php" class="five">Announcement</a>
    			<a href="view_project.php" class="six">Projects</a>
                <a href="report.php" class="seven">Work Reports</a>
    			<!--<a href="#" class="seven">Log Out</a>-->
                <?php
				if(isset($_SESSION['username']))
				{
					
            		echo '<a href="logout.php" class="eight"> Log Out </a>';
              
				}
				else
				{
					
            		echo '<a href="login.php" class="eight"> Log In </a>';
            
				}
		?>
                
                