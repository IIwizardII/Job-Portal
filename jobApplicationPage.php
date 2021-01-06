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

		}
		span{

			color: red;

		}
		table {
		    font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
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



	<div>
		<div style="border: 0px solid #18a0b5; margin-top: 120px; margin-left: 15%; margin-right: 15%; 
		margin-bottom: 100px; background-color: white; padding: 20px">
			<div>
				<?php

					$serverName = "localhost";
					$userName = "root";
					$password = "";
					$databaseName = "jobportaldatabase";
					$tableName = "jobs";
					

					$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

					if (!$conn) {
				    	die("Connection failed: " . mysqli_connect_error());
					}

					$currentEmployer = $_SESSION['userName_employer'];

					$currentEmployerId_sql = "select * from employer where UserName = '$currentEmployer'";
					$result_employerId = mysqli_query($conn, $currentEmployerId_sql);
					$row_employerId = mysqli_fetch_assoc($result_employerId);

					$currentEmployerId = $row_employerId["EmployerId"];

					$sql_get_employer_posted_jobs = "SELECT * FROM $tableName where EmployerId='$currentEmployerId'";
					$result_get_employer_posted_jobs = mysqli_query($conn, $sql_get_employer_posted_jobs);

					if (mysqli_num_rows($result_get_employer_posted_jobs) > 0) {
				?>
						
				<?php
				    
					    while($row = mysqli_fetch_assoc($result_get_employer_posted_jobs)) {
					       

					    	$jobId_current_employer = $row["JobId"];
					    	$job_title = $row["JobTitle"];
				?>			
							<!-- <h5>
								Job Title: <?php echo $job_title; ?>

							</h5> -->


							<table>
								<!-- <caption>Job Title: <?php echo $job_title; ?></caption> -->
								<h5>
									Job Title: <?php echo $job_title; ?>

								</h5>
					    		<tr>
					    			<th>Applicant Name</th>
					    			<th>Email</th>
					    			<th>Resume</th>
					    			<th>Action</th>
					    		</tr>

				<?php
					    	$getJobSeekerId_sql = "select * from jobapplication where JobId = '$jobId_current_employer'";
					    	$result_get_job_seeker_id = mysqli_query($conn, $getJobSeekerId_sql);
					    	



					    	while($row_job_seeker_Id = mysqli_fetch_assoc($result_get_job_seeker_id)){
					    		$jobSeekerId_current = $row_job_seeker_Id["JobSeekerId"];

					    		$sql_job_seeker = "select * from jobseeker where JobSeekerId = '$jobSeekerId_current'";
						    	$result_job_seeker = mysqli_query($conn, $sql_job_seeker);
						    	$row_job_seeker = mysqli_fetch_assoc($result_job_seeker);



						    	$firstName = $row_job_seeker["FirstName"];
						    	$Email = $row_job_seeker["Email"];
						    	$file_resume = $row_job_seeker_Id["File"];


						    	$rowId_job = $row_job_seeker_Id["JobId"];
						    	$rowId_jobSeeker = $row_job_seeker_Id["JobSeekerId"];







				?>

						    	<tr>
					    			<td>
					    				<?php echo $firstName; ?>
					    			</td>
					    			<td>
					    				<?php echo $Email; ?>
					    			</td>
					    			<td>
					    				<?php
					    					$files_field= $row_job_seeker_Id["File"];
											$files_show= "fileUploadDownload/uploads/$files_field";
					    					echo "<div align=center><a href='$files_show'>$files_field</a></div>";

					    				?>
					    			</td>
					    			<td>
					    				<form name="removeButtonForm" action="removeApplication.php" method="POST" 
					    							style="margin-bottom: 10px;">
					    					<input type="hidden" name="job_id" value="<?php echo $rowId_job; ?>"/>
					    					<input type="hidden" name="jobseeker_id" value="<?php echo $rowId_jobSeeker; ?>"/>
					    					<input type="submit" name="remove_application" value="Remove Application">
					    					
					    				</form>
					    				<!-- <form name="removeButtonForm" action="removeApplication.php" method="POST">
					    					<input type="hidden" name="job_id" value="<?php echo $rowId_job; ?>"/>
					    					<input type="hidden" name="jobseeker_id" value="<?php echo $rowId_jobSeeker; ?>"/>
					    					<input type="submit" name="remove_application" value="Remove Application">
					    					
					    				</form> -->
					    				
					    			</td>
					    		</tr>
					    
					    <?php	} ?>

					    	
					    	


					    	
					    	

					    	
					    	

					<?php	} ?>   						    	
							
					    		

					    	

					
				    
					    	</table>
				
				<?php	} else {
					    echo "0 results";
					}

					mysqli_close($conn);

				?>

			</div>
			
		</div>
	</div>










	<!-- footer -->
	<div style="text-align: center; width: 100%; left: 0; bottom: 0; position: absolute;">
		<footer style="background-color: #343a40; height: 30px">
		 	<p style="color: white">
		 		&copy; 2020 Copyright: Md Masrafi Rahman
		 	</p>

		</footer>
	</div>

</body>
</html>