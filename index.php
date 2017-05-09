<?php
error_reporting(E_PARSE | E_ERROR);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "accounts";

	$conn = new mysqli($servername, $username, $password,$database);

	if ($conn->connect_error) {
    	die("Conectare nereusita: " . $conn->connect_error);
} else {
echo "Conectarea s-a realizat cu succes"; }

	$sql = "SELECT userID,name,email,phone,user_role,date_registred FROM users";
			$result = $conn->query($sql);

			echo '<br><table><tr>';
			echo '<th> User Id </th><th> Name </th><th> Email </th><th> Phone </th><th> User role </th><th> Date registered</th></tr>';

			while($row = $result->fetch_assoc())
			{
				echo '<tr>';
				
    			echo '<td>'.$row['userID'].'</td><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td><td>'.$row['user_role'].'</td><td>'.$row['date_registred'].'</td><td><a href="index2.php?id='.$row['userID'].'">Stergere</a></td><td><a href="index2.php?id='.$row['userID'].'&name='.$row['name'].'&email='.$row['email'].'&userR='.$row['user_role'].'&phone='.$row['phone'].'">Edit</a></td>';
   				 echo '</tr>';
			}
			echo '</table>';
			
			



?>