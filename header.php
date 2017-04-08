<ul>

			<?php
			
				echo '<li><b><a href="index.php">Home</a></b></li>';
				
				if(isset($_SESSION['username']) && ($_SESSION['type'])=='emp')
				{
					
            		echo '<li><b><a href="#"> Profile </a></b>
							<ul>
								<li><b><a href="view_profile.php">View Profile</a></b></li>
								<li><b><a href="edit_profile.php">Edit Profile</a></b></li>
							</ul>
						</li>';
					echo '<li><b><a href="view_payment.php">Payment</a></b></li>';
					echo '<li><b><a href="#">Message</a></b>
							<ul>
								<li><b><a href="view_announcement.php">Announcement</a></b></li>
								<li><b><a href="view_permission.php">Permission</a></b></li>
							</ul>
					
						</li>';
					echo '<li><b><a href="#">Work Progress</a></b>
							<ul>
								<li><b><a href="view_cur_project.php">Current Project</a></b></li>
								<li><b><a href="add_work.php">Submit Work</a></b></li>
								<li><b><a href="view_pre_project.php">My Work</a></b></li>
							</ul>
						</li>';
					echo '<li><b><a href="leave_request.php">Leave Request</a></b></li>';
					echo '<li><b><a href="view_report.php">My Rating</a></b></li>';
					echo '<li><b><a href="logout.php"> Log Out </a></b></li>';
              		
				}
				else
				{
					
            		echo '<li><b><a href="information.php">Information</a></b></li>';
					echo '<li><b><a href="service.php">Service</a></b></li>';
					echo '<li><b><a href="gallery.php">Gallery</a></b></li>';
					echo '<li><b><a href="contact.php">Contact Us</a></b></li>';
					echo '<li><b><a href="about.php">About Us</a></b></li>';
            		echo '<li><b><a href="login.php"> Log In </a></b></li>';
					echo '<li><b><a href="faq.php">FAQs</a></b></li>';
				}

		?>


				

			</ul>
