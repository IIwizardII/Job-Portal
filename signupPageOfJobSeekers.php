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

					<a href="employerListPage.php">
						<button class="btn btn-outline-success" type="button" >
							Job Applications
						</button>
					</a>
				<?php	} ?>


			</div>
				
		</nav>

	</div>




	<!-- middle part -->

	<div class="container">
		<div style="align-content: center; margin-top: 150px; margin-left: 200px;" >
			<div>
				<h3>
					Job Seekers Sign Up
				</h3>
				<form class="style_form" onsubmit="return validate_info()" action="handleSignUpDataJobSeeker.php" 
				name="signupForm" method="POST">
					First Name <br>
					<input type="text" name="first_name" placeholder="Enter your first name" >
					<span id="firstNameCheck"></span> 
					<br>

					Last Name <br>
					<input type="text" name="last_name" placeholder="Enter your last name" > 
					<span id="lastNameCheck"></span> 
					<br>

					Gender: <input type="radio" name="radio_button" value="Male">Male
					<input type="radio" name="radio_button" value="Female">Female
					<input type="radio" name="radio_button" value="Other">Other 
					<span id="genderCheck"></span> 
					<br>

					Email Address <br>
					<input type="text" name="mail" placeholder="Enter email" > 
					<span id="emailCheck"></span> 
					<br>

					Mobile Number <br>
					<input type="tel" name="phone_number" placeholder="Phone number" > 
					<span id="phoneCheck"></span> 
					<br>

					User Name <br>
					<input type="text" name="user_name" placeholder="Enter user name"> 
					<span id="userNameCheck"></span> 
					<br>

					Password <br>
					<input type="password" name="password_name" placeholder="Password" > 
					<span id="passCheck"></span> 
					<br>

					Confirm Password <br>
					<input type="password" name="confirm_password" placeholder="Retype password" > 
					<span id="confirmPassCheck"></span> 
					<br>

					<input type="checkbox" name="checkbox" id="checkBoxId"> I agree with the terms and conditions of Job Portal
					<span id="checkBoxCheck"></span> 
					<br>

					<input type="submit" value="Create Account">

				</form>
			</div>
					
		</div>
		
	</div>





	<script type="text/javascript">
		
		function validate_info(){
			var firstName = document.forms["signupForm"]["first_name"].value;
			var lastName = document.forms["signupForm"]["last_name"].value; 
			var gender = document.forms["signupForm"]["radio_button"].value; 
			var email = document.forms["signupForm"]["mail"].value;
			var phone = document.forms["signupForm"]["phone_number"].value;
			var userName = document.forms["signupForm"]["user_name"].value;
			var pass = document.forms["signupForm"]["password_name"].value;
			var con_pass = document.forms["signupForm"]["confirm_password"].value;
			var agree_box = document.forms["signupForm"]["checkbox"].value;


			if(firstName==""){
				document.getElementById("firstNameCheck").innerHTML = "Enter first name";
				return false;
			}
			
			if(lastName==""){
				document.getElementById("lastNameCheck").innerHTML = "Enter last name";
				return false;
			}

			if(gender==""){
				document.getElementById("genderCheck").innerHTML = "Select one" ;
				
				return false;
			}

			if(email==""){
				document.getElementById("emailCheck").innerHTML = "Enter Email";
				return false;
			}else{
				if(!validateEmail(email)){
					document.getElementById("emailCheck").innerHTML = "Invalid Email";
					return false;
				}
			}


			if(phone==""){
				document.getElementById("phoneCheck").innerHTML = "Enter phone number";

				return false;
			}else{
				if(!validatePhone(phone)){
					document.getElementById("phoneCheck").innerHTML = "Invalid phone number";

					return false;
				}
			}


			if(userName==""){
				document.getElementById("userNameCheck").innerHTML = "Enter user name";
				return false;
			}


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

			if(document.getElementById("checkBoxId").checked==false){
				document.getElementById("checkBoxCheck").innerHTML = "You can not leave this field empty";
			 		return false;
			}

			


			return true;	
		}




		function validateEmail(email) {
    		const tempEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    		return tempEmail.test(String(email).toLowerCase());
		}


		function validatePhone(phone){
			var tempPhone = /^(?:\+88|01)?(?:\d{11}|\d{13})$/;

    		return tempPhone.test(phone);
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