<?php

	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$databaseName = "myDB";

	$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

	if(!$conn){
		echo "success";
	}

	$sql = "INSERT INTO person(FirstName, LastName, Age)

			VALUES ('dsa', 'sa', '2')";

	if(mysqli_query($conn, $sql)){
		echo "table insert new";
	}

	mysqli_error($conn);
?>