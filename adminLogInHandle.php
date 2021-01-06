<?php
	
	session_start();

	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$databaseName = "jobportaldatabase";
	$tableName = "admin";

	$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}


	$userName = $_POST['userName_name'];
	$password = $_POST['password'];


	$sql = "select * from $tableName where UserName = '$userName' and Password = '$password'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);

		if($row['UserName']==$userName && $row['Password']==$password){
			$_SESSION['userName_admin'] = $userName;
			header("Location: homePage.php");
		}else{
			header("Location: adminLogIn.php");
		}
	}else{
		header("Location: adminLogIn.php");
	}


?>