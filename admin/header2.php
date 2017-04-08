<ul>

			<?php
			
					echo '<li><b><a href="admin.php">Home</a></b></li>';
					
            		echo '<li><b><a href="#"> Profile </a></b>
							<ul>
								<li><b><a href="view_profile.php">View Profile</a></b></li>
								<li><b><a href="edit_profile.php">Edit Profile</a></b></li>
							</ul>
						</li>';
					echo '<li><b><a href="#">Manage Employee</a></b>
							<ul>
								<li><b><a href="add_emp.php">Add Employee</a></b></li>
								<li><b><a href="log_details.php">Log Details</a></b></li>
								<li><b><a href="attendance.php">Attendance</a></b></li>
								<li><b><a href="permission.php">Permissions</a></b></li>
								<li><b><a href="employee.php">View Current Emp.</a></b></li>
								<li><b><a href="ex-employee.php">View Ex-Employee</a></b></li>
							</ul>
					
						</li>';
					echo '<li><b><a href="payment.php">Payment</a></b></li>';

					echo '<li><b><a href="report.php">Work Report</a></b> </li>';
					/*echo '<li><b><a href="#">Work Progress</a></b>
							<ul>
								<li><b><a href="view_report.php">View Work</a></b></li>
								<li><b><a href="#">Rate Work</a></b></li>
							</ul>
						</li>';*/
					echo '<li><b><a href="#">Announcement</a></b>
							<ul>
								<li><b><a href="announcement.php">Write New</a></b></li>
								<li><b><a href="view_announcement.php">View All</a></b></li>
							</ul>
					
					</li>';
					echo '<li><b><a href="#">Projects</a></b>
							<ul>
								<li><b><a href="add_client.php">Add Client</a></b></li>
								<li><b><a href="view_client.php">View Client</a></b></li>
								<li><b><a href="add_project.php">Add Project</a></b></li>
								<li><b><a href="view_project.php">View Project</a></b></li>
							</ul>
					
						</li>';
					echo '<li><b><a href="logout.php"> Log Out </a></b></li>';
              		
						?>
</ul>