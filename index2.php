<?php
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
	
	
	$id = $_GET['id'];
	$name = $_GET['name'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$user_role = $_GET['userR'];

	
	if(isset($id,$name,$email,$phone,$user_role))
	{
		echo '<form action="index3.php" method="POST">';
		
		echo '<strong>Utilizator: </strong> <input type="text" name="name2" value='.$name.'>';
		echo '<strong> Email: </strong> <input type="text" name="email2" value='.$email.'>';
		echo '<strong> Phone: </strong> <input type="text" name="phone2" value='.$phone.'>';
		echo '<strong> User role: </strong> <input type="text" name="role2" value='.$user_role.'>';
		
		$_SESSION['id'] = $id;
		unset($id);
		echo '<input type="Submit" value="Submit">';
		echo '</form>';

	
	}
	
	if(isset($id))
	{
		$sql = "DELETE FROM users WHERE userID=$id";
		$result = $conn->query($sql);
		header('location: index.php');
	}
	
	
		
		
	
