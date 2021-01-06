<?php
	
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Job Portal</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleHomePage.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<style type="text/css">
		.topnav-righ{
			float: right;
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

	

	<!-- area of the posts for being displayed -->
	<div>
		<div style="border: 0px solid #18a0b5; margin-top: 120px; margin-left: 15%; margin-right: 15%; 
		margin-bottom: 100px; background-color: white; padding: 20px">
			<div>

				<?php

					$serverName = "localhost";
					$userName = "root";
					$password = "";
					$databaseName = "jobportaldatabase";
					$tableName = "employer";
					

					$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

					if (!$conn) {
				    	die("Connection failed: " . mysqli_connect_error());
					}

					
					$sql = "select * from $tableName";

					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) != 0) {
				    
					    $row = mysqli_fetch_assoc($result);
					        
					        $company_email = $row["CompanyEmail"];
					        $user_name = $row["UserName"];
					        $password = $row["Password"];
					        $company_name = $row["CompanyName"];
					        $country = $row["Country"]; 
					        $district = $row["District"];
					    	$thana = $row["Thana"];
					    	$whole_Address = $row["WholeAddress"];
					    	$industry_type = $row["IndustryType"];
					    	$business_description = $row["BusinessDescription"];
					    	$company_mobile = $row["CompanyMobile"];
					    	$employerId = $row["EmployerId"];
						

				?>	
					

					    	
					<h6>
						Company Email
					</h6>
						<p>
							<?php echo $company_email ?>
						</p>

					<h6>
						User Name
					</h6>
						<p>
							<?php echo $user_name ?>
						</p>

					<h6>
						Password
					</h6>
						<p>
							<?php echo $password ?>
						</p>

					<h6>
						Company Name
					</h6>
						<p>
							<?php echo $company_name ?>
						</p>

					<h5>
						Address
					</h5>
					<h6>
						Country
					</h6>
						<p>
							<?php echo $country ?>
						</p>

					<h6>
						District
					</h6>
						<p>
							<?php echo $district ?>
						</p>

					<h6>
						Thana
					</h6>
						<p>
							<?php echo $thana ?>
						</p>

					<h6>
						
					</h6>
						<p>
							<?php echo $whole_Address ?>
						</p>

					<h6>
						Industry Type
					</h6>
						<p>
							<?php echo $industry_type ?>
						</p>

					<h6>
						Business Description
					</h6>
						<p>
							<?php echo $business_description ?>
						</p>

					<h6>
						Company Mobile
					</h6>
						<p>
							<?php echo $company_mobile ?>
						</p>
					
					<form name="jobSeekerEditPassword" action="employerEditPassword.php" method="POST">
		    			<input type="hidden" name="wishID" value="<?php echo $employerId; ?>"/>
		    			<input type="submit" name="employer_edit_password" value="Edit Password">
		    					
		    		</form>


		    	<?php }else {
					    echo "0 results";
					}


				?>

				<?php
					mysqli_close($conn);

				?>

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