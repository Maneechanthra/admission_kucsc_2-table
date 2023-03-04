<?php
	//Connect database
	$servername = "localhost";
	$username = "root";
	$password = "oof123456";
	$dbname = "admission_kucsc";

	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($mysqli->connect_error) {
		die("DB Connection failed: " . $conn->connect_error);
	}
	mysqli_set_charset($mysqli,"utf8");	

	function sqlval($conn, $var){
		return mysqli_real_escape_string($conn, $var);
	}

	function backticks($var){
		return "`".$var."`";
	}
	
?>
