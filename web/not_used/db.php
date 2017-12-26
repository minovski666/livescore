<?php

		$servername = "localhost";
		$username = "c3livescore";
		$password = "BYrsxRBm1z#";
		$dbname = "c3livescore";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    
    die("Connection failed: " . mysqli_connect_error());
	
	}
?>

