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
			width: 500px;
			outline: none;

		}
		span{

			color: red;

		}
		textarea{
			background-color: #ff8000;
			width: 350px;
			height: 100px;
			outline: none;

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




	<div class="container">

		<div style="align-content: center; margin-top: 150px; margin-left: 200px; margin-bottom: 100px" >

			<div>

				<h3>
					Employer Sign Up
				</h3>

				<form class="style_form" onsubmit="return validate_info()" action="handleSignUpDataEmployer.php" 
					name="signupForm" method="POST">
					
					Company Email <br>
					<input type="text" name="mail" placeholder="Enter email"> 
					<span id="emailCheck"></span> 
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

					Company Name <br>	
					<input type="text" name="company_name" placeholder="Enter Company Name"> 
					<span id="companyNameCheck"></span> 
					<br>

					<h5>
						Company Address
					</h5>
					Country
					<br>
					<input type="text" name="country_name" placeholder="Enter Country"> 
					<span id="countryCheck"></span> 
					<br>

					District <br>
					<input type="text" name="district_name" placeholder="Enter District">
					<span id="districtCheck"></span>  
					<br>

					Thana <br>
					<input type="text" name="thana_name" placeholder="Enter Thana"> 
					<span id="thanaCheck"></span>
					<br>
					<br>
					<textarea placeholder="Write Address" name="wholeAddress_name"></textarea>
					<span id="wholeAddressCheck"></span>
					<br>

					Industry Type <br>
					<input type="text" name="industryType_name" placeholder="Enter Industry Type"> 
					<span id="industryTypeCheck"></span>
					<br>

					Business Description <br>
					<textarea placeholder="Write Description" name="businessDescription_name"></textarea>
					<span id="businessDescriptionCheck"></span>
					<br>

					Company Mobile Number <br>
					<input type="tel" name="phone_number" placeholder="Phone number" > 
					<span id="phoneCheck"></span> 
					<br>

					<input type="checkbox" name="checkbox" id="checkBoxId" style="width: 15px"> I agree with the terms and conditions of Job Portal
					<span id="checkBoxCheck"></span> 
					<br>
					<br>
					
					<input type="submit" value="Create Account">


				</form>
			</div>
		</div>

	</div>



	<script type="text/javascript">
		
		function validate_info(){
		
			var email = document.forms["signupForm"]["mail"].value;
			var userName = document.forms["signupForm"]["user_name"].value;
			var pass = document.forms["signupForm"]["password_name"].value;
			var con_pass = document.forms["signupForm"]["confirm_password"].value;
			var companyName = document.forms["signupForm"]["company_name"].value;
			var country = document.forms["signupForm"]["country_name"].value;
			var district = document.forms["signupForm"]["district_name"].value;
			var thana = document.forms["signupForm"]["thana_name"].value;
			var wholeAddress = document.forms["signupForm"]["wholeAddress_name"].value;
			var industryType = document.forms["signupForm"]["industryType_name"].value;
			var businessDescription = document.forms["signupForm"]["businessDescription_name"].value;
			var mobile = document.forms["signupForm"]["phone_number"].value;
			var agree_box = document.forms["signupForm"]["checkbox"].value;



			if(email==""){
				document.getElementById("emailCheck").innerHTML = "Enter Email";
				return false;
			}else{
				if(!validateEmail(email)){
					document.getElementById("emailCheck").innerHTML = "Invalid Email";
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


			if(companyName==""){
				document.getElementById("companyNameCheck").innerHTML = "Can not leave empty";
				return false;
			}

			if(country==""){
				document.getElementById("countryCheck").innerHTML = "Can not leave empty";
				return false;
			}

			if(district==""){
				document.getElementById("districtCheck").innerHTML = "Can not leave empty";
				return false;
			}

			if(thana==""){
				document.getElementById("thanaCheck").innerHTML = "Can not leave empty";
				return false;
			}

			if(wholeAddress==""){
				document.getElementById("wholeAddressCheck").innerHTML = "Can not leave empty";
				return false;
			}

			if(industryType==""){
				document.getElementById("industryTypeCheck").innerHTML = "Can not leave empty";
				return false;
			}

			if(businessDescription==""){
				document.getElementById("businessDescriptionCheck").innerHTML = "Can not leave empty";
				return false;
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

			if(document.getElementById("checkBoxId").checked==false){
				document.getElementById("checkBoxCheck").innerHTML = "You can not leave this field empty";
			 		return false;
			}


		}

		function validateEmail(email) {
    		const tempEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    		return tempEmail.test(String(email).toLowerCase());
		}

		function validatePassword(password){
			var tempPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    		return tempPassword.test(password);
		}

		function validatePhone(phone){
			var tempPhone = /^(?:\+88|01)?(?:\d{11}|\d{13})$/;

    		return tempPhone.test(phone);
		}

	</script>








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