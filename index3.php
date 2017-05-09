<?php 
	session_start();
	$name2 = $_POST['name2'];
	$id2 = $_SESSION['id'];
	$email2 = $_POST['email2'];
	$phone2 = $_POST['phone2'];
	$user_role2 = $_POST['role2'];
	
	error_reporting(E_PARSE | E_ERROR);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "accounts";

	$conn = new mysqli($servername, $username, $password,$database);

	if ($conn->connect_error) {
    	die("Conectare nereusita: " . $conn->connect_error);
}	
	echo "Conectare reusita<br>";
	echo $id2.$name2.$email2.$phone2.$user_role2;
	$sql = "UPDATE users SET name = '$name2', email = '$email2', phone = '$phone2', user_role = '$user_role2' WHERE userID='$id2'";
		$result = $conn->query($sql);

		header('location: index.php');

?>