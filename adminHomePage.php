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

				<a href="adminHomePage.php">
					<button class="btn btn-outline-success" type="button" >
						Home
					</button>
				</a>
				
				<a href="jobSeekerListPage.php">
					<button class="btn btn-outline-success" type="button" >
						Job Seekers
					</button>
				</a>


				<a href="employerListPage.php">
					<button class="btn btn-outline-success" type="button" >
						Employeers
					</button>
				</a>

				<!-- <?php if(empty($_SESSION['userName_jobSeeker']) || empty($_SESSION['userName_employer'])){ ?>
					<a href="selectLogInType.php">	
						<button class="btn btn-outline-success" type="button">
							Sign In or Sign up
						</button>
					</a>	

				<?php	} ?> -->

					<!-- <a href="contactPage.php">	
						<button class="btn btn-outline-success" type="button">
							Contact Us
						</button>
					</a> -->



				<?php if(!empty($_SESSION['userName_admin'])){ ?>
						<a href="logOut.php">
							<button class="btn btn-outline-success" type="button">
								Log Out
							</button>
						</a>
				
				<?php	} ?>

			</div>
				
		</nav>

	</div>




	<!-- search bar -->
	<div class="container">
		<div style="margin-left: 20%; margin-right: 20%; margin-top: 7%">
			<form>
				<input type="search" name="search_field" placeholder="Search Jobs" style="width: 100%; padding-left: 10px; padding-right: 10px; padding-top: 3px; padding-bottom: 3px;">

				<input type="submit" name="submit_search" value="Search" style="background-color: gray; color: white; margin-top: 5px">
			</form>	

		</div>
	</div>

	

	<!-- area of the posts for being displayed -->
	<div>
		<div style="border: 0px solid #18a0b5; margin-top: 40px; margin-left: 15%; margin-right: 15%; 
		margin-bottom: 100px; background-color: white; padding: 20px">
			<div>
				<?php

					$serverName = "localhost";
					$userName = "root";
					$password = "";
					$databaseName = "jobportaldatabase";
					$tableName = "jobseeker";
					

					$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

					if (!$conn) {
				    	die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "SELECT * FROM jobInformation";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
				    
					    while($row = mysqli_fetch_assoc($result)) {
					       
					    	$job_title = $row["JobTitle"];
					    	$job_location = $row["JobLocation"];
					    	$education_requirments = $row["EducationalRequirements"];
					    	$experience =  $row["ExperienceRequirements"];
					    	$deadline = $row["Deadline"];

					    	
				?>
					    	<div class="card" style="width: 90%; margin: 40px;">
							  	<div class="card-body">
							    	<h5 class="card-title">
							    		<?php echo $job_title; ?>
							    	</h5>
							    	
							    	<h6 class="card-subtitle mb-2 text-muted">
							    		<?php echo $job_location; ?>
							    	</h6>
							    	
							    	<p class="card-text">
							    		<?php echo $education_requirments; ?>
							    	</p>

							    	<p class="card-text">
							    		<?php echo $experience; ?>
							    	</p>

							    	<p class="card-text">
							    		<?php echo $deadline; ?>
							    	</p>

							    	<p class="card-text">
							    		<?php echo $education_requirments; ?>
							    	</p>
							    
							    <a href="#" class="card-link">View Job</a>


							  </div>
							</div>

					
				<?php
					    }
					} else {
					    echo "0 results";
					}

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