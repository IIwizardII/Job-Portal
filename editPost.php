<?php
	
	session_start();

?>



<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleHomePage.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<style type="text/css">
	
		.style_form{
			font-weight: bold;
		}

		input{
			background-color: #ff8000;
			width: 500px;
			outline: none;

		}
		span{

			color: red;

		}
		textarea{
			background-color: #ff8000;
			width: 350px;
			height: 100px;
			outline: none;

		}

	</style>

</head>



<body>


	<!-- navigation bar -->
	<div>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top navbar-right" style="padding-left: 
			40px; padding-right: 40px;">
			
			<div >
				<a class="navbar-brand" href="homePage.php">Job Portal</a>
			</div>
			
			<div class="navbar-right">

				<a href="homePage.php">
					<button class="btn btn-outline-success" type="button" >
						Home
					</button>
				</a>
				
				<?php if(empty($_SESSION['userName_jobSeeker']) && empty($_SESSION['userName_employer']) 
						&& empty($_SESSION['userName_admin'])){ ?>

					<a href="selectLogInType.php">	
						<button class="btn btn-outline-success" type="button">
							Sign In or Sign up
						</button>
					</a>	

				<?php	} ?>


					<a href="contactPage.php">	
						<button class="btn btn-outline-success" type="button">
							Contact Us
						</button>
					</a>



				<?php if(!empty($_SESSION['userName_jobSeeker']) || !empty($_SESSION['userName_employer'])
							 || !empty($_SESSION['userName_admin'])){ ?>

						<a href="logOut.php">
							<button class="btn btn-outline-success" type="button">
								Log Out
							</button>
						</a>
				
				<?php	} ?>


				<?php if(empty($_SESSION['userName_jobSeeker']) && !empty($_SESSION['userName_employer'])
							&& empty($_SESSION['userName_admin'])){ ?>

					<a href="postJob.php">	
						<button class="btn btn-outline-success" type="button">
							Post a Job
						</button>
					</a>
				<?php	} ?>


				<?php if(!empty($_SESSION['userName_jobSeeker']) && empty($_SESSION['userName_employer']) 
								&& empty($_SESSION['userName_admin'])){ ?>

					<a href="jobSeekerProfile.php">	
						<button class="btn btn-outline-success" type="button">
							Profile
						</button>
					</a>
				<?php	} ?>


				<?php if(empty($_SESSION['userName_jobSeeker']) && !empty($_SESSION['userName_employer'])
								&& empty($_SESSION['userName_admin'])){ ?>

					<a href="employerProfile.php">	
						<button class="btn btn-outline-success" type="button">
							Profile
						</button>
					</a>
				<?php	} ?>

				<?php if(empty($_SESSION['userName_jobSeeker']) && empty($_SESSION['userName_employer'])
								&& !empty($_SESSION['userName_admin'])){ ?>

					<a href="jobSeekerListPage.php">
						<button class="btn btn-outline-success" type="button" >
							Job Seekers
						</button>
					</a>
				<?php	} ?>


				<?php if(empty($_SESSION['userName_jobSeeker']) && empty($_SESSION['userName_employer'])
								&& !empty($_SESSION['userName_admin'])){ ?>

					<a href="employerListPage.php">
						<button class="btn btn-outline-success" type="button" >
							Employeers
						</button>
					</a>
				<?php	} ?>


				<?php if(empty($_SESSION['userName_jobSeeker']) && !empty($_SESSION['userName_employer'])
								&& empty($_SESSION['userName_admin'])){ ?>

					<a href="jobApplicationPage.php">
						<button class="btn btn-outline-success" type="button" >
							Job Applications
						</button>
					</a>
				<?php	} ?>


			</div>
				
		</nav>

	</div>

	<!--  -->





	<div class="container">
		<div style=" margin-top: 150px; margin-left: 200px; margin-bottom: 150px" >
			<div>
				<h3>
					Enter updated information
				</h3>
				<form class="style_form" action="updateJobDescription.php" name="postJobForm" method="POST">
					<?php

						$tempRowId = $_POST['wishID'];
					?>

					<input type="hidden" name="tempWishID" value="<?php echo $tempRowId; ?>"/>
					
					Job Category <br>
					<input type="text" name="jobType_name" placeholder="Enter job category" >
					<span id=""></span> 
					<br>

					Job Title <br>
					<input type="text" name="jobTitle_name" placeholder="Enter job title" > 
					<span id=""></span> 
					<br>

					Job Responsibilities <br>
					<textarea name="jobResponsibilites_name" placeholder="Enter job responsibilities" ></textarea>
					<span id=""></span>
					<br>

					Employment Status <br>
					<input type="text" name="employmentStatus_name" placeholder="Enter employment status" > 
					<span id=""></span> 
					<br>

					Educational Requirements <br>
					<input type="text" name="educationalRequirements_name" placeholder="Enter educational requirements" > 
					<span id=""></span> 
					<br>

					Experience Requirements <br>
					<input type="text" name="experienceRequirements_name" placeholder="Enter experience requirements" > 
					<span id=""></span> 
					<br>

					Additional Requirements <br>
					<textarea name="additionalRequirements_name" placeholder="Enter additional requirements" ></textarea>
					<span id=""></span>
					<br>
					

					Job Location <br>
					<input type="text" name="jobLocation_name" placeholder="Enter job location" > 
					<span id=""></span> 
					<br>

					Salary <br>
					<input type="number" name="salary_name" placeholder="Enter salary" > 
					<span id=""></span> 
					<br>

					Deadline <br>
					<input type="date" name="deadline_name" >
					<span id=""></span> 
					<br> <br>

					<input type="submit" value="Save">

				</form>
			</div>
					
		</div>
		
	</div>



	<!-- footer -->
	<div style="text-align: center; width: 100%; left: 0; bottom: 0;">
		<footer style="background-color: #343a40; height: 30px">
		 	<p style="color: white">
		 		&copy; 2020 Copyright: Md Masrafi Rahman
		 	</p>

		</footer>
	</div>

</body>
</html>