<!-- <?php

	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$databaseName = "jobportaldatabase";

	$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	$sqlTable = "CREATE TABLE jobSeekers(
					FirstName varchar(20),
					LastName varchar(20),
					Gender varchar(10),
					Email varchar(20),
					Mobile varchar(15),
					Password char(30)
				)";

	if (!mysqli_query($conn, $sqlTable)) {
    	echo "Table created";
	}else{
		echo "Error: " . $sqlTable . "<br>" . mysqli_error($conn);
	}




	mysqli_close($conn);

?> -->