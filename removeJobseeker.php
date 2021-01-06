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


	if(isset($_POST['remove_user'])){

		$rowId = $_POST['wishID'];


		$sql = "delete from $tableName where JobSeekerId = '$rowId'";
		$tempSql = "delete from jobapplication where JobSeekerId = '$rowId'";
		mysqli_query($conn, $tempSql);
		
		if(mysqli_query($conn, $sql)){
			header("Lcation: jobSeekerListPage.php");
			echo "
				<script type=\"text/javascript\">	
					window.alert(\"User removed\")
				</script>
				";
			
			

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
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<style type="text/css">
		.topnav-righ{
			float: right;
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
					$tableName = "jobseeker";
					

					$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

					if (!$conn) {
				    	die("Connection failed: " . mysqli_connect_error());
					}

					$sql = "SELECT * FROM jobseeker";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
				?>
						<table>
					    		<tr>
					    			<th>Name</th>
					    			<th>User Name</th>
					    			<th>Email</th>
					    			<th>Action</th>
					    		</tr>
				<?php
				    
					    while($row = mysqli_fetch_assoc($result)) {
					       
					    	$firstName = $row["FirstName"];
					    	$UserName = $row["UserName"];
					    	$Email = $row["Email"];
					    	$rowId = $row["JobSeekerId"];
					    						    	
				?>
					    		<tr>
					    			<td>
					    				<?php echo $firstName; ?>
					    			</td>
					    			<td>
					    				<?php echo $UserName; ?>
					    			</td>
					    			<td>
					    				<?php echo $Email; ?>
					    			</td>
					    			<td>
					    				<form name="removeButtonForm" action="removeJobseeker.php" method="POST">
					    					<input type="hidden" name="wishID" value="<?php echo $rowId; ?>"/>
					    					<input type="submit" name="remove_user" value="Remove User">
					    					
					    				</form>

					    			</td>
					    		</tr>

					    	

					
				<?php
					    }
				?>	    
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
	<div style="text-align: center; width: 100%; left: 0; bottom: 0;">
		<footer style="background-color: #343a40; height: 30px">
		 	<p style="color: white">
		 		&copy; 2020 Copyright: Md Masrafi Rahman
		 	</p>

		</footer>
	</div>



</body>
</html>

		<!-- echo $row["FirstName"]. " " . $row["UserName"] .  " " . $row["Email"] . "<br>";         -->

