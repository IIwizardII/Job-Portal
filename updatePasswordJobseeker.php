<?php
	
	session_start();

	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$databaseName = "jobportaldatabase";
	$tableName = "jobseeker";

	$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}




	$rowId = $_POST['wishID'];
	$newPassword = $_POST['password_name'];

	$sql = "update $tableName
			set Password = '$newPassword'
			where JobSeekerId = '$rowId'";
	
	if(mysqli_query($conn, $sql)){
		// header("Lcation: homePage.php");
		echo "
			<script type=\"text/javascript\">	
				window.alert(\"Password Changed\")
			</script>
			";
		
		

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
					$tableName = "jobseeker";
					

					$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

					if (!$conn) {
				    	die("Connection failed: " . mysqli_connect_error());
					}

					
					$sql = "select * from $tableName";

					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) != 0) {
				    
					    while($row = mysqli_fetch_assoc($result)) {
					        
					        $first_name = $row["FirstName"];
					        $last_name = $row["LastName"];
					        $gender = $row["Gender"];
					        $email = $row["Email"];
					        $mobile = $row["Mobile"]; 
					        $user_name = $row["UserName"];
					    	$password = $row["Password"];
					    	$jobSeekerId = $row["JobSeekerId"];
					    	
						}

				?>	
					

					    	
				
					    	
					<h6>
						First Name
					</h6>
						<p>
							<?php echo $first_name ?>
						</p>

					<h6>
						Last Name
					</h6>
						<p>
							<?php echo $last_name ?>
						</p>

					<h6>
						Gender
					</h6>
						<p>
							<?php echo $gender ?>
						</p>

					<h6>
						Email
					</h6>
						<p>
							<?php echo $email ?>
						</p>

					<h6>
						Mobile
					</h6>
						<p>
							<?php echo $mobile ?>
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
					
					<form name="jobSeekerEditPassword" action="jobSeekerEditPassword.php" method="POST">
		    			<input type="hidden" name="wishID" value="<?php echo $jobSeekerId; ?>"/>
		    			<input type="submit" name="jobSeeker_edit_password" value="Edit Password">
		    					
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