<?php

		session_start();
	$id = $_SESSION['id2'];
	$owner = $_SESSION['user'];
	$role = $_SESSION['role'];
	$ownerVER == $_SESSION['verif_own'];
	if($role == "ADMIN" or $role == "Admin" or $role == "admin" or $owner == $ownerVER)
	{
	if(isset($id))
	{
		$titlu = $_POST['titlu'];
		$categorie = $_POST['categorie'];
		$mesaj = $_POST['mesaj'];
		$data = date("Y-m-d");

		error_reporting(E_PARSE | E_ERROR);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "accounts";

	$conn = new mysqli($servername, $username, $password,$database);

	if ($conn->connect_error) {
    	die("Conectare nereusita: " . $conn->connect_error);
}	
	$sql = "UPDATE documents SET title = '$titlu', category = '$categorie', mesage = '$mesaj', registration_date = '$data' WHERE id_doc='$id'";
		$result = $conn->query($sql);
		header('location: dashboard.php');
		
	}
}header('location: dashboard.php');

?>