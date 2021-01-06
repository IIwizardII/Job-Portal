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

	$result= mysql_query( "SELECT File FROM jobapplications ORDER BY ID desc" ) 
	or die("SELECT Error: ".mysql_error()); 

	print "<table border=1>\n"; 
	while ($row = mysql_fetch_array($result)){ 
	$files_field= $row['File'];
	$files_show= "fileUploadDownload/uploads//$files_field";
	
	print "<tr>\n"; 
	print "\t<td>\n"; 
	echo "<font face=arial size=4/>$descriptionvalue</font>";
	print "</td>\n";
	print "\t<td>\n"; 
	echo "<div align=center><a href='$files_show'>$files_field</a></div>";
	print "</td>\n";
	print "</tr>\n"; 
	} 
	print "</table>\n"; 

?> 
