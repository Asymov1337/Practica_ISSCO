<?php
	
 $id = $_GET['id'];
session_start();
	$owner = $_SESSION['user'];
	$role = $_SESSION['role'];
	$ownerVER == $_SESSION['verif_own'];
	if($role == "ADMIN" or $role == "Admin" or $role == "admin" or $owner == $ownerVER)
	{
	error_reporting(E_PARSE | E_ERROR);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "accounts";

	$conn = new mysqli($servername, $username, $password,$database);

	if ($conn->connect_error) {
    	die("Conectare nereusita: " . $conn->connect_error);
} 

		$sql = "DELETE FROM documents WHERE id_doc='$id'";
												$result = $conn->query($sql);
												
												header('location: dashboard.php');
											}header('location: dashboard.php');
?>