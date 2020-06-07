<?php
function connect(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "carrentalDB";
	$con = new mysqli($servername, $username, $password, $database);
	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	return $con;
	echo "Connected successfully";
}
?>
