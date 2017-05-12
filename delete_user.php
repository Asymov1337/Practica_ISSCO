<?php

 $id = $_GET['id'];
session_start();
	error_reporting(E_PARSE | E_ERROR);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "accounts";

	$conn = new mysqli($servername, $username, $password,$database);

	if ($conn->connect_error) {
    	die("Conectare nereusita: " . $conn->connect_error);
} 

		$sql = "DELETE FROM users WHERE userID='$id'";
												$result = $conn->query($sql);
												
												header('location: dashboard.php');
?>
