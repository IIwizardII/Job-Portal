<?php

	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$databaseName = "jobseekerinfo";

	$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	$sqlTable = "CREATE TABLE jobAppication(
					File BLOB
				)";

	if (!mysqli_query($conn, $sqlTable)) {
    	echo "Table created";
	}else{
		echo "Error: " . $sqlTable . "<br>" . mysqli_error($conn);
	}




	mysqli_close($conn);

?>