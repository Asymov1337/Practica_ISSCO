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
	//Delogare
	if(isset($_POST['logout']))
	{	
		session_destroy();
	}
	//Adauga document
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
		$sql = "SELECT MAX(register_number) FROM documente";
		$result = conn->query($sql);
		// Momentan nu sunt sigur ca functioneaza
		$row = $result->fetch_assoc()
		$nume = row[id] + 1;
		$target_file = $target_dir . basename($_FILES["fileToUpload"][$nume]);
		$uploadOk = 1;
		if ($_FILES["fileToUpload"]["size"] > 500000) {
    		echo "Documentul este mult prea mare.";
    		$uploadOk = 0;
		}
		if ($uploadOk == 0) {
   			 echo "Ne pare rau, dar fisierul nu s-a putut incarca";
		} else {
    		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    				mysql_query("INSERT INTO Documente (title,owner,registration_date,mesagge) VALUES ('".$title.",".row[user]",".$time.",".$mesaj."') OR die(mysql_error()") ;
        			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    			} else {
       			 echo "A aparut o eroare pe parcursul adaugarii documentului";
    			}
		
	}
}
	//Listeaza toate documentele adaugate
	if (isset($_POST['listeaza']))
	{
		
			$sql = "SELECT registration_number,title,owner,registration_date,category,message FROM documents";
			$result = conn->query($sql);

			while($row = $result->fetch_assoc())
			{
				//Afisare date intr-un tabel
				echo row[registration_number]."  ".row[title]."  ".row[owner]."  ".row[registration_date]."  ".row[category]."  ".row[message];
			}
		
		
	}
	//Stergerea unui document (trebuie terminata)
	if(isset($_POST['sterge']))
	{
		if (row[permision] == "ADMIN")
		{
		$sql = "DELETE FROM documents WHERE registration_number='$registration_number'";
		if ($conn->query($sql) === TRUE) {
    			echo "Documentul a fost sters cu succes!";
		} else {
   			echo "S-a intampinat o eroare in stergerea documentului: " . $conn->error;
		}
	}else
	{
		$sql = "DELETE FROM documents WHERE registration_number='$registration_number' AND owner = $_POST['username']";
		if ($conn->query($sql) === TRUE) {
    			echo "Documentul a fost sters cu succes!";
		} else {
   			echo "S-a intampinat o eroare in stergerea documentului: " . $conn->error;
		}
	}
	}
	//Afisarea tuturor utilizatorilor din bd
	if(isset($_POST['afisare_utilizatori']))
	{
		if (row[permision] == "ADMIN")
		{
		$sql = "SELECT ID,User,email,phone,admin,data_crearii FROM Users";
		$result = conn->query($sql);
		while($row = $result->fetch_assoc())
		{
			//Afisare date intr-un tabel
			echo row[ID]."  ".row[User]."  ".row[email]."  ".row[phone]."  ".row[admin]."  ".row[data_crearii];
		}
		}
		else
		{
			echo "Ne pare rau, dar nu aveti suficiente privilegii pentru a realiza acest lucru";
		}
	}
	//Eliminarea unui utilizator din bd
	if(isset($_POST['stergere_user']))
	{
		if(row[permision] == "ADMIN")
		{
			//Trebuie salvata intr-o variabila id-ul userului
			$sql = "DELETE FROM users WHERE ID = $id"
			if($conn->query($sql) === TRUE)
			{
				//Trebuie salvata intr-o variabila numele userului
				echo "Userul a fost sters cu succes";
			}else
			{
				echo "A fost intampinata o eroare in stergerea userului";
			}
		}else
		{
			echo "Ne pare rau, dar nu aveti suficiente privilegii pentru a realiza acest lucru";
		}
	}
	//Editarea unui user din bd
	if(isset($_POST['editare_useri'])){
		if (row[permision] == "ADMIN")
		{
		$sql = "SELECT ID,User,password,email,phone,admin,data_crearii FROM Users";
		$result = conn->query($sql);
		while($row = $result->fetch_assoc())
		{
			//Afisarea datelor in input-uri
			echo "<input type='text' name='username1' value='"row[User]."'  <input type='text' name='email1' value=' ".row[email]."' <input type='text' name='phone1' value=' ".row[phone]."' <input type='text' name='admin1' value='".row[admin]."' <input type='text' name='pass1' value='".row[password]."'";
			//Codul pentru editare

		}

		$sql = "UPDATE users SET User = $_POST['username1'], email = $_POST['email1'], phone = $_POST['phone1'], admin = $_POST['admin1'], password = $_POST['pass1']";
		if(mysql_query($conn,$sql))
		{
			echo "Contul a fost modificat cu succes";

		}
		else
		{
			echo "A fost intampinata o eroare pe parcursul modificarii";
		}
		}
	}


?>