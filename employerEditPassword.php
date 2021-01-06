<?php
	
	session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>


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



	<!-- form -->
	<div class="container">
		<div style="align-content: center; margin-top: 200px; margin-left: 200px;">

			<div>
				<h3>
					Change Password
				</h3>

			<form class="style_form" name="sign_in_form" method="POST" action="updatePasswordEmployer.php">
				
				<?php $rowId = $_POST['wishID']; ?>

				<input type="hidden" name="wishID" value="<?php echo $rowId; ?>"/>

				Password <br>
				<input type="password" name="password_name" placeholder="Password" > 
				<span id="passCheck"></span> 
				<br>

				Confirm Password <br>
				<input type="password" name="confirm_password" placeholder="Retype password" > 
				<span id="confirmPassCheck"></span> 
				<br>
				

				<br>
				<input type="submit" value="Save">


			</form>
		</div>	
	</div>

	<script type="text/javascript">
		function validate_info(){
			var pass = document.forms["signupForm"]["password_name"].value;
			var con_pass = document.forms["signupForm"]["confirm_password"].value;

			if(pass==""){
				document.getElementById("passCheck").innerHTML = "Enter password";

				return false;
			}else{
				if(!validatePassword(pass)){
					document.getElementById("passCheck").innerHTML = "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";

					return false;
				}
			}


			if(con_pass==""){
				document.getElementById("confirmPassCheck").innerHTML = "Password do not match";
				return false;
			}else{
				if(pass!==con_pass){
					document.getElementById("confirmPassCheck").innerHTML = "Password do not match";
					return false;
				}
			}

		}


		function validatePassword(password){
			var tempPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    		return tempPassword.test(password);
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