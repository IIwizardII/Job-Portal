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
		<div style="align-content: center; margin-top: 150px; margin-left: 200px;" >
			<div>
				<h3>
					Upload Resume
				</h3>



				<form class="style_form" onsubmit="return validate_info()" action="storeApplication.php" 
						name="applicationForm" method="POST" enctype="multipart/form-data">
					
					<?php	$RowId = $_POST['wishID']; ?>
					<input type="hidden" name="wishID" value="<?php echo $RowId; ?>"/>
					
					<input type="file" name="file_name">
					<br> <br>


					<input type="submit" value="Submit" name="submit">

				</form>
			</div>
					
		</div>
		
	</div>





	<script type="text/javascript">
		
		function validate_info(){

            var file =  document.forms["applicationForm"]["file_name"].value;
          
            var allowedExtensions =  
                    /(\.doc|\.pdf|\.docx)$/i; 
              
            if (!allowedExtensions.exec(file)) { 
                window.alert('Invalid file type. Only file with (.doc, .pdf, .docx) extension are valid.'); 
                file.value = ''; 
                return false; 
            }  


			return true;	
		}




		

	</script>







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