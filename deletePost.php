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


	if(isset($_POST['delete_post'])){

		$rowId = $_POST['wishID'];


		$sql = "delete from $tableName where JobId = '$rowId'";
		
		if(mysqli_query($conn, $sql)){
			// header("Location: homePage.php");
			echo "
				<script type=\"text/javascript\">	
					window.alert(\"Post removed\")
				</script>
				";
			
			

		}


	}


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




	<!-- search bar -->
	<div class="container">
		<div style="margin-left: 20%; margin-right: 20%; margin-top: 7%">
			<form action="homePage.php" name="search_job" method="POST">

				<input type="search" name="search_field" placeholder="Search by location or job category" style="width: 100%; padding-left: 10px; padding-right: 10px; padding-top: 3px; padding-bottom: 3px;">

				<input type="submit" name="submit_search" value="Search" style="background-color: gray; color: white;
					margin-top: 5px">
			</form>	

		</div>
	</div>

	

	<!-- area of the posts for being displayed -->
	<div>
		<div style="border: 0px solid #18a0b5; margin-top: 40px; margin-left: 15%; margin-right: 15%; 
		margin-bottom: 100px; background-color: white; padding: 20px">
			<div>

				<?php if(!isset($_POST['submit_search']) || empty($_POST['search_field'])){ ?>

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

						$sql = "SELECT * FROM jobs";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
					    
						    while($row = mysqli_fetch_assoc($result)) {
						       
						    	$job_title = $row["JobTitle"];
						    	$job_location = $row["JobLocation"];
						    	$education_requirments = $row["EducationalRequirements"];
						    	$experience =  $row["ExperienceRequirements"];
						    	$deadline = $row["Deadline"];
						    	$rowId = $row["JobId"];
						    	$job_category = $row["JobCategory"];
						    	
					?>
						    	<div class="card" style="width: 90%; margin: 40px;">
								  	<div class="card-body">
								    	<h5 class="card-title">
								    		<?php echo "Job Title: " . $job_title; ?>
								    	</h5>
								    	
								    	<h6 class="card-subtitle mb-2 text-muted">
								    		<?php echo "Category: " . $job_category; ?>
								    	</h6>

								    	<h6 class="card-subtitle mb-2 text-muted">
								    		<?php echo "Location: " . $job_location; ?>
								    	</h6>
								    	
								    	<p class="card-text">
								    		<?php echo "Education Requirments: " . $education_requirments; ?>
								    	</p>

								    	<p class="card-text">
								    		<?php echo "Required Experience: " . $experience; ?>
								    	</p>

								    	<p class="card-text">
								    		<?php echo "Deadline: " . $deadline; ?>
								    	</p>
								    
								    <form name="viewJobForm" action="jobDescription.php" method="POST">
						    			<input type="hidden" name="wishID" value="<?php echo $rowId; ?>"/>
						    			<input type="submit" name="view_job" value="View Job">
						    					
						    		</form>


								  </div>
								</div>

						
					<?php
						    }
						} else {
						    echo "0 results";
						}

						mysqli_close($conn);

					?>



				<?php	} ?>


				<?php if(isset($_POST['submit_search']) && !empty($_POST['search_field'])){ ?>

					<?php

						$searchValue = $_POST['search_field'];

						$serverName = "localhost";
						$userName = "root";
						$password = "";
						$databaseName = "jobportaldatabase";
						$tableName = "jobs";
						

						$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

						if (!$conn) {
					    	die("Connection failed: " . mysqli_connect_error());
						}

						$sqlLocation = "SELECT * 
								FROM jobs
								where JobLocation = '$searchValue'";
						
						$result = mysqli_query($conn, $sqlLocation);

						if(mysqli_num_rows($result) == 0){
							
							$sqlCategory = "SELECT * 
								FROM jobs
								where JobCategory = '$searchValue'";
						
							$result = mysqli_query($conn, $sqlCategory);
						}

						if (mysqli_num_rows($result) > 0) {
					    
						    while($row = mysqli_fetch_assoc($result)) {
						       
						    	$job_title = $row["JobTitle"];
						    	$job_location = $row["JobLocation"];
						    	$education_requirments = $row["EducationalRequirements"];
						    	$experience =  $row["ExperienceRequirements"];
						    	$deadline = $row["Deadline"];
						    	$rowId = $row["JobId"];
						    	$job_category = $row["JobCategory"];
						    	
					?>
						    	<div class="card" style="width: 90%; margin: 40px;">
								  	<div class="card-body">
								    	<h5 class="card-title">
								    		<?php echo "Job Title: " . $job_title; ?>
								    	</h5>

								    	<h6 class="card-subtitle mb-2 text-muted">
								    		<?php echo "Category: " . $job_category; ?>
								    	</h6>

								    	<h6 class="card-subtitle mb-2 text-muted">
								    		<?php echo "Location: " . $job_location; ?>
								    	</h6>
								    	
								    	<p class="card-text">
								    		<?php echo "Education Requirments: " . $education_requirments; ?>
								    	</p>

								    	<p class="card-text">
								    		<?php echo "Required Experience: " . $experience; ?>
								    	</p>

								    	<p class="card-text">
								    		<?php echo "Deadline: " . $deadline; ?>
								    	</p>
								    
								    <form name="viewJobForm" action="jobDescription.php" method="POST">
						    			<input type="hidden" name="wishID" value="<?php echo $rowId; ?>"/>
						    			<input type="submit" name="view_job" value="View Job">
						    					
						    		</form>


								  </div>
								</div>

						
					<?php
						    }
						} else {
						    echo "0 results";
						}

						mysqli_close($conn);

					?>

				<?php } ?>

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