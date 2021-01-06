<?php
	
	session_start();

	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$databaseName = "jobportaldatabase";
	$tableName = "jobs";

	$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	$rowId = $_POST['tempWishID'];

	if(!empty($_POST['jobType_name'])){
		$jobCategory = $_POST['jobType_name'];

		$sqlQuery = "update $tableName 
					set JobCategory = '$jobCategory'
					where JobId = '$rowId'";

		if (!mysqli_query($conn, $sqlQuery)) {
	    	echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
		}

	}

	if(!empty($_POST['jobTitle_name'])){
		$jobTitle = $_POST['jobTitle_name'];

		$sqlQuery = "update $tableName 
					set JobTitle = '$jobTitle'
					where JobId = '$rowId'";

		if (!mysqli_query($conn, $sqlQuery)) {
	    	echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
		}

	}

	if(!empty($_POST['jobResponsibilites_name'])){
		$jobResponsibilities = $_POST['jobResponsibilites_name'];

		$sqlQuery = "update $tableName 
					set JobResponsibilities = '$jobResponsibilities'
					where JobId = '$rowId'";

		if (!mysqli_query($conn, $sqlQuery)) {
	    	echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
		}

	}

	if(!empty($_POST['employmentStatus_name'])){
		$employmentStatus = $_POST['employmentStatus_name'];

		$sqlQuery = "update $tableName 
					set EmploymentStatus = '$employmentStatus'
					where JobId = '$rowId'";

		if (!mysqli_query($conn, $sqlQuery)) {
	    	echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
		}

	}

	if(!empty($_POST['educationalRequirements_name'])){
		$educationalRequirements = $_POST['educationalRequirements_name'];

		$sqlQuery = "update $tableName 
					set EducationalRequirements = '$educationalRequirements'
					where JobId = '$rowId'";

		if (!mysqli_query($conn, $sqlQuery)) {
	    	echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
		}

	}

	if(!empty($_POST['experienceRequirements_name'])){
		$experienceRequirements = $_POST['experienceRequirements_name'];

		$sqlQuery = "update $tableName 
					set ExperienceRequirements = '$experienceRequirements'
					where JobId = '$rowId'";

		if (!mysqli_query($conn, $sqlQuery)) {
	    	echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
		}

	}

	if(!empty($_POST['additionalRequirements_name'])){
		$additionalRequirements = $_POST['additionalRequirements_name'];

		$sqlQuery = "update $tableName 
					set AdditionalRequirements = '$additionalRequirements'
					where JobId = '$rowId'";

		if (!mysqli_query($conn, $sqlQuery)) {
	    	echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
		}

	}

	if(!empty($_POST['jobLocation_name'])){
		$jobLocation = $_POST['jobLocation_name'];

		$sqlQuery = "update $tableName 
					set JobLocation = '$jobLocation'
					where JobId = '$rowId'";

		if (!mysqli_query($conn, $sqlQuery)) {
	    	echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
		}

	}

	if(!empty($_POST['salary_name'])){
		$salary = $_POST['salary_name'];

		$sqlQuery = "update $tableName 
					set Salary = '$salary'
					where JobId = '$rowId'";

		if (!mysqli_query($conn, $sqlQuery)) {
	    	echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
		}

	}

	if(!empty($_POST['deadline_name'])){
		$deadline = $_POST['deadline_name'];

		$sqlQuery = "update $tableName 
					set Deadline = '$deadline'
					where JobId = '$rowId'";

		if (!mysqli_query($conn, $sqlQuery)) {
	    	echo "Error: " . $sqlQuery . "<br>" . mysqli_error($conn);
		}

	}

	mysqli_close($conn);

?>




<!DOCTYPE html>
<html>
<head>
	<title></title>


	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleHomePage.css">


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
		<div style="margin-top: 5%; margin-left: 15%; margin-right: 15%; 
		margin-bottom: 100px; padding: 20px; text-align: center;">
			<p>
				Post updated!
			</p>
		</div>
	</div>


	<div style="text-align: center; width: 100%; bottom: 0; position: absolute;">
		<footer style="background-color: #343a40; height: 30px">
		 	<p style="color: white">
		 		&copy; 2020 Copyright: Md Masrafi Rahman
		 	</p>

		</footer>
	</div>

</body>
</html>

