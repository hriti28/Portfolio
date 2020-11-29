<?php
	$server = "localhost";
	$user = "root";
	$password = "";
	$db = "user-info";

// Create connection
	$conn = mysqli_connect($server, $user, $password, $db);

// Check connection
	if ($conn) {
	echo '<script>alert("Successfully connected)</script>';;
	}
	else{
		echo ("not successful");
	}
?>