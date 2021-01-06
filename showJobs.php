<?php
	
	session_start();

	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$databaseName = "jobseekerinfo";

	

	$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM jobInformation";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    
	    while($row = mysqli_fetch_assoc($result)) {
	        echo $row["JobCategory"]. " " . $row["JobTitle"] .  " " . $row["JobResponsibilities"] .  " " . $row["EmploymentStatus"] . 
	         " " . $row["EducationalRequirements"] .  " " . $row["ExperienceRequirements"] .  " " . $row["AdditionalRequirements"] .  " " . $row["JobTitle"] . 
	          " " . $row["JobLocation"] .  " " . $row["Salary"] .   " " . $row["Deadline"] . "<br>";
	    }
	} else {
	    echo "0 results";
	}

	mysqli_close($conn);

?>