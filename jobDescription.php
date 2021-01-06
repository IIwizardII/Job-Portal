<?php
	
	session_start();

	// if(!isset($_SESSION['userName'])){
	// 	header('Location: signinPageOfJobSeekers.php');
	// }

?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Job Portal</title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleHomePage.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
		<div style="border: 0px solid #18a0b5; margin-top: 100px; margin-left: 15%; margin-right: 15%; 
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

					if(isset($_POST['view_job'])){

						$rowId = $_POST['wishID'];
					

						$sql = "select * from jobs where JobId = '$rowId'";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
					    
						    while($row = mysqli_fetch_assoc($result)) {
						        
						        $job_Category = $row["JobCategory"];
						        $Job_Title = $row["JobTitle"];
						        $job_responsibilities = $row["JobResponsibilities"];
						        $employment_status = $row["EmploymentStatus"];
						        $educational_requirements = $row["EducationalRequirements"]; 
						        $experience_requirements = $row["ExperienceRequirements"];
						    	$additional_requirements = $row["AdditionalRequirements"];
						    	$job_location = $row["JobLocation"];
						    	$salary = $row["Salary"];
						    	$deadline = $row["Deadline"];
						    	$employer_Id = $row["EmployerId"];
 							}

 							$tempSql = "select * from employer where EmployerId = '$employer_Id'";
 							$tempResult = mysqli_query($conn, $tempSql);
 							$tempRow = mysqli_fetch_assoc($tempResult);

 							$company_name = $tempRow["CompanyName"];


					    	
				?>
					    	
					<h5>
						Job Title
					</h5>
						<p>
							<?php echo $Job_Title ?>
						</p>

					<h5>
						Company Name
					</h5>
						<p>
							<?php echo $company_name ?>
						</p>

					<h5>
						Job Responsibilities
					</h5>
						<p>
							<?php echo $job_responsibilities ?>
						</p>

					<h5>
						Employment Status
					</h5>
						<p>
							<?php echo $employment_status ?>
						</p>

					<h5>
						Educational Requirements
					</h5>
						<p>
							<?php echo $educational_requirements ?>
						</p>

					<h5>
						Experience Requirements
					</h5>
						<p>
							<?php echo $experience_requirements ?>
						</p>

					<h5>
						Additional Requirements
					</h5>
						<p>
							<?php echo $additional_requirements ?>
						</p>


					<h5>
						Job Location
					</h5>
						<p>
							<?php echo $job_location ?>
						</p>

					<h5>
						Salary
					</h5>
						<p>
							<?php echo $salary ?>
						</p>

					<h6>
						Deadline
					</h6>
						<p>
							<?php echo $deadline ?>
						</p>
					


				<?php
					    }
					} else {
					    echo "0 results";
					}
					

				?>

					<?php if(!empty($_SESSION['userName_jobSeeker']) && empty($_SESSION['userName_employer'])){ ?>
						
						<?php	$RowId = $_POST['wishID']; ?>
					
						<form name="editPost" action="applyToJobPage.php" method="POST" style="margin-bottom: 10px;">
							<input type="hidden" name="wishID" value="<?php echo $RowId; ?>"/>
							<input type="submit" name="job_post" value="Apply">
							    					
						</form>

					<?php	} ?>


					<?php
						$current_job_id = $rowId;
					?>

					<!-- <?php 
						$current_employer_userName = $_SESSION['userName_employer'];
						$get_employer_id = "select * from employer where UserName = '$current_employer_userName'";
						$result_emplyer_id = mysqli_query($conn, $get_employer_id);
						$row_emplyer_id = mysqli_fetch_assoc($result_emplyer_id);
						$current_employer_id = $row_emplyer_id["EmployerId"];

						$get_selected_jobId = "select * from jobs where EmployerId = '$current_employer_id'";
						$result_selected_jobId = mysqli_query($conn, $get_selected_jobId);
						$row_selected_jobId = mysqli_fetch_assoc($result_selected_jobId);
						$selected_jobId = $row_selected_jobId["JobId"];


					?> -->

					<?php 
						if(empty($_SESSION['userName_admin']) && !empty($_SESSION['userName_employer'])){
							$current_employer_userName = $_SESSION['userName_employer'];
							$get_company_name = "select * from employer where UserName = '$current_employer_userName'";
							$result_company_name = mysqli_query($conn, $get_company_name);
							$row_company_name = mysqli_fetch_assoc($result_company_name);
							$current_employer_company_name = $row_company_name["CompanyName"];


							$get_selected_job_employerId = "select * from jobs where JobId  = '$current_job_id'";
							$result_selected_job_employerId = mysqli_query($conn, $get_selected_job_employerId);
							$row_selected_job_employerId = mysqli_fetch_assoc($result_selected_job_employerId);
							$selected_job_employerId = $row_selected_job_employerId["EmployerId"];

							$get_selected_job_company_name = "select * from employer where EmployerId = '$selected_job_employerId'";
							$result_selected_job_company_name = mysqli_query($conn, $get_selected_job_company_name);
							$row_selected_job_company_name = mysqli_fetch_assoc($result_selected_job_company_name);
							$selected_job_company_name = $row_selected_job_company_name["CompanyName"];

						}
					?>




					<?php if(empty($_SESSION['userName_jobSeeker']) && !empty($_SESSION['userName_employer'])
							&& empty($_SESSION['userName_admin']) && ($current_employer_company_name==$selected_job_company_name)){ ?>
						
						<?php	$editRowId = $_POST['wishID']; ?>
					
						<form name="editPost" action="editPost.php" method="POST" style="margin-bottom: 10px;">
							<input type="hidden" name="wishID" value="<?php echo $editRowId; ?>"/>
							<input type="submit" name="edit_post" value="Edit">
							    					
						</form>

					<?php	} ?>








					<?php if(empty($_SESSION['userName_jobSeeker']) && !empty($_SESSION['userName_employer'])
								&& ($current_employer_company_name==$selected_job_company_name) 
								|| !empty($_SESSION['userName_admin'])){ ?>

					<?php	$deleteRowId = $_POST['wishID']; ?>
					
						<form name="deletePost" action="deletePost.php" method="POST">
							<input type="hidden" name="wishID" value="<?php echo $deleteRowId; ?>"/>
							<input type="submit" name="delete_post" value="Delete">
							    					
						</form>

					<?php	} ?>





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