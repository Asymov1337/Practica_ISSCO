<?php

	session_start();

	$servername = "localhost";
	$username = "username";
	$password = "password";
	$database = "bdd";

	$conn = new mysql_connect($servername,$username,$password,$database);

	if($conn->connect_error)
	{
		die("Conectare nereusita: ".conn->connect_error);
	}

	$sql = "SELECT permision,user FROM users WHERE user = $usermane";
	$result = conn->query($sql);

	while($row = $result->fetch_assoc()) {
			if(row[permision] == "ADMIN")
			{
				echo "Sunteti logat ca ADMIN(".row[user]."]";
				//Cod pentru adaugare de optiuni in DASHBOARD
			}
			else
			{
				echo "Sunteti logat ca USER[".row[user]."]";
			}
	}

	if(isset($_POST['logout']))
	{	
		session_destroy();
	}

	if(isset($_POST['posteaza']))
	{
		$target = "documente/";
		$time = date("M D, Y, h:i:s");
		$titlu = $_POST['titlu'];
		$categorie = $_POST['categorie'];
		$mesaj = $_POST['mesaj'];
		//Adaugarea documentelor este incompleta momentan
		$document = $_POST['document'];
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		if ($_FILES["fileToUpload"]["size"] > 500000) {
    		echo "Sorry, your file is too large.";
    		$uploadOk = 0;
		}
		if ($uploadOk == 0) {
   			 echo "Sorry, your file was not uploaded.";
		} else {
    		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    				mysql_query("INSERT INTO Documente (title,owner,registration_date,mesagge) VALUES ('".$title.",".row[user]",".$time.",".$mesaj."') OR die(mysql_error()") ;
        			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    			} else {
       			 echo "A aparut o eroare pe parcursul adaugarii documentului";
    			}
		
	}
}


?>