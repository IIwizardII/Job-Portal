<?php
	
	session_start();

?>



<!DOCTYPE html>
<html>
<head>
	<title>Select Log In Type</title>
</head>




	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleHomePage.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<!-- <style type="text/css">
	
		.style_form{
			font-weight: bold;
		}

		input{
			background-color: #ff8000;

		}
		span{

			color: red;

		}
	</style> -->


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

					<a href="employerListPage.php">
						<button class="btn btn-outline-success" type="button" >
							Job Applications
						</button>
					</a>
				<?php	} ?>


			</div>
				
		</nav>

	</div>


	<!-- middle part -->
	<div>
		<div style="margin-top: 15%; margin-left: 0%; margin-right: 15%; 
		margin-bottom: 100px; padding: 20px; text-align: center;">
			<div style="margin-bottom: 20px">
				<h3>
					Job Seekers
				</h3>

				<a href="signinPageOfJobSeekers.php">
					<button class="btn btn-outline-success" type="button">
						Sign In
					</button>
				</a>

				<a href="signupPageOfJobSeekers.php">
					<button class="btn btn-outline-success" type="button">
						Sign Up
					</button>
				</a>
			</div>

			<div>
				<h3>
					Employers
				</h3>

				<a href="signinPageOfEmployers.php">
					<button class="btn btn-outline-success" type="button">
						Sign In
					</button>
				</a>

				<a href="signupPageOfEmployers.php">
					<button class="btn btn-outline-success" type="button">
						Sign Up
					</button>
				</a>
			</div>

	</div>





	<!-- footer -->
	<div style="text-align: center; width: 100%; bottom: 0; position: absolute;">
		<footer style="background-color: #343a40; height: 30px">
		 	<p style="color: white">
		 		&copy; 2020 Copyright: Md Masrafi Rahman
		 	</p>

		</footer>
	</div>




</body>
</html>