<?php

	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$databaseName = "jobseekerinfo";

	$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	$sqlTable = "CREATE TABLE jobInformation(
					JobCategory varchar(50),
					JobTitle varchar(70),
					JobResponsibilities varchar(300),
					EmploymentStatus varchar(20),
					EducationalRequirements varchar(100),
					ExperienceRequirements varchar(50),
					AdditionalRequirements varchar(150),
					JobLocation varchar(30),
					Salary int,
					Deadline date
				)";

	if (!mysqli_query($conn, $sqlTable)) {
    	echo "Table created";
	}else{
		echo "Error: " . $sqlTable . "<br>" . mysqli_error($conn);
	}




	mysqli_close($conn);

?>