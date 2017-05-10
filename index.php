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

	$send = $_GET['click'];


	if(isset($_POST['submit']))
	{
						$updir = 'upload';    // Directorul pt. upload
				$max_size = 500;      // Marimea maxima, in KiloBytes, care este permisa

				// Seteaza matricea cu tipurile de fisiere permise
				$allowtype = array('pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx');

				// Creaza directorul din $updir (cu CHMOD 077), daca nu exista
				if(!is_dir($updir)) mkdir($updir, 0777);

				/** Incarcarea imaginii pe server **/

				$rezultat = array();
				// Daca este primit din formular un fisier valid
				if(isset ($_FILES['file'])){
				  // Seteaza pt. upload fisierele primite (pot fi primite din mai multe campuri 'file_up')
				  for($f=0; $f<count($_FILES['file']['name']); $f++){
				    // Verifica daca fisierul are tipul de extensie permis
				    $ar_ext = explode(".", strtolower($_FILES['file']['name'][$f]));
				    $type = end($ar_ext);
				    if(in_array($type, $allowtype)){
				      // Verifica daca fisierul are marimea permisa
				      if($_FILES['file']['size'][$f]<=$max_size*1000){
				        // Daca nu sunt erori in procesul de copiere
				        if($_FILES['file']['error'][$f]==0){
				        // Seteaza locatia si numele pt. incarcare pe server
				          $thefile = $updir . "/" . $_FILES['file']['name'][$f];
				          // Daca fisierul nu poate fi incarcat, returneaza mesaj
				          if(!move_uploaded_file ($_FILES['file']['tmp_name'][$f], $thefile)) $rezultat[$f] = ' Fisierul nu a putut fi copiat, incercati din nou';
				          else $rezultat[$f] = '<b>'.$_FILES['file']['name'][$f].'</b>';  // Retine numele fisierului incarcat
				        }
				      }
				    else { $rezultat[$f] = 'Fisierul <b>'. $_FILES['file']['name'][$f]. '</b> depaseste marimea permisa de maxim <i>'. $max_size. 'KB</i>'; }
				    }
				    else { $rezultat[$f] = 'Fisierul <b>'. $_FILES['file']['name'][$f]. '</b> nu are tipul de extensie permis'; }
  }
}

   // Returneaza rezultatul
  $rezultat2 = implode('<br> ', $rezultat);
  echo '<h4>Fisiere incarcate:</h4>'.$rezultat2;
	}
	/*$sql = "SELECT userID,name,email,phone,user_role,date_registred FROM users";
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
			*/
			



?>
 <!DOCTYPE html>
<html>
<head> 
		<title>Practica</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<style type="text/css">
	.hidden_form2{
	display: none;
	width: 100%;
	background: no-repeat;
	border: 1px solid #fff;
	padding: 7px;
	margin: 0px auto;
	color:#fff;
	margin: 5px auto 14px;
}

	.hidden_form3{
	display: none;
	width: 100%;
	background: no-repeat;
	border: 1px solid #fff;
	padding: 7px;
	margin: 0px auto;
	color:#fff;
	margin: 5px auto 14px;
}
	.btn_edit{
	   
    text-decoration: none;
    border: 1px solid #fff;
    padding: 4px 6px;
    line-height: 1;
    border-radius: 3px;
    display: block;
    background: #fff;
    color: #505050;
}
.btn_edit:hover{
	 background: #505050;
    color: #fff;
}
.btn_sterge:hover{
	 background: #fff;
    color: #b11954;
}
.btn_sterge{
	
display: block;
    background: #b11954;
color: #fff;
text-decoration: none;
padding: 4px 11px;
line-height: 1;
border-radius: 3px;
}
	 .hidden_form3 input{
	display: block;
	 width: 100%;
	background: no-repeat;
	border: 1px solid #fff;
	padding: 7px;
	margin: 0px auto;
	color:#fff;
	margin: 5px auto 14px;
}
.hidden_form,.hidden_form2,.hidden_form3{width:100%;overflow:hidden;margin:0px auto;color: #ccc;display:none;}



</style>
</head>
<body>
<div class="header">
<div class="body">
<h1>Bun venit la </h1><h2>aplicatia noastra web</h2>
<div class="content-site">
		<div class="dashboard">
			<div class="dashboard-support">
			  <div class="dashboard-title">Dashboard</div>
			  <ul class="list">		 
				<li id="new" class="command">New document</li>
				<li id="edit" class="command">New user</li>
				<li id="list" class="command">List users</li>
				<li id="delete" class="command">List documents</li>
			  </ul>
			</div>
		</div>
		<div class="content"><p>Alege una din optiuni!</p><div class="arrow">            </div>
			<div class="content-support">
		
				<div class="hidden_form">
					 <form action="index.php" method="POST" enctype="multipart/form-data">
						  <label>Title*: <input type="text" name="title" required>  </label>
						  <label>Categorie*: <input type="text" name="categorie" required> </label>
						  <label>Mesaj: <textarea name="mesaj"> </textarea></label>
						  <div id="ifrm"> </div>
							<form id="uploadform" action="uploader.php" method="post" enctype="multipart/form-data" target="uploadframe" onsubmit="uploading(this); return false">
								<input type="file" class="file_up" name="file" />
								<input type="submit" value="UPLOAD" id="sub" name="submit" />
							</form>
							<script type="text/javascript" src="upload.js"></script> 
						  
					</form> 
				</div>
				
						  <?php

						  		$sql = "SELECT userID,name,email,phone,user_role,date_registred FROM users";
			$result = $conn->query($sql);

			echo '<div class="hidden_form2"><form action="/action_page.php" method="get"><br><table><tr>';
			echo '<th> User Id </th><th>   Name   </th><th> Email </th><th>  Phone  </th><th>  User role  </th><th>   Date registered</th></tr>';

			while($row = $result->fetch_assoc())
			{
				echo '<tr>';
				
    			echo '<td>'.$row['userID'].'</td><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td><td>'.$row['user_role'].'</td><td>'.$row['date_registred'].'</td><td><a href="index.php?id='.$row['userID'].'" class="btn_sterge">Stergere</a></td><td><a href="index.php?id='.$row['userID'].'&name='.$row['name'].'&email='.$row['email'].'&userR='.$row['user_role'].'&phone='.$row['phone'].'&click=1" class="btn_edit">Edit</a></td>';
   				 echo '</tr>';
			}
			echo '</table></form></div>';


						  ?>

						  <?php

						  		if(isset($send))
						  		{
						  			$id = $_GET['id'];
											$name = $_GET['name'];
											$email = $_GET['email'];
											$phone = $_GET['phone'];
											$user_role = $_GET['userR'];

											
											if(isset($id,$name,$email,$phone,$user_role))
											{
												echo '<div class="hidden_form3">';
												echo '<form action="index3.php" method="POST">';
												
												echo '<strong>Utilizator: </strong> <input type="text" name="name2" value='.$name.'><br>';
												echo '<strong> Email: </strong> <input type="text" name="email2" value='.$email.'><br>';
												echo '<strong> Phone: </strong> <input type="text" name="phone2" value='.$phone.'><br>';
												echo '<strong> User role: </strong> <input type="text" name="role2" value='.$user_role.'>';
												
												$_SESSION['id'] = $id;
												unset($id);
												echo '<input type="Submit" value="Submit">';
												echo '</form>';
												echo '</div>';
												echo '<script type="text/javascript">';
												echo 'jQuery( ".hidden_form3").fadeIn(500);';
												echo 'jQuery( ".hidden_form2").fadeOut(500);';
												echo 'jQuery( ".hidden_form" ).fadeOut(500);';
												echo '</script>';
											
											}
											
											if(isset($id))
											{
												$sql = "DELETE FROM users WHERE userID=$id";
												$result = $conn->query($sql);
												header('location: index.php');
											}
						  		}


						  ?>
						  
					
			</div>
		</div>
</div>
<script type="text/javascript">
   jQuery( "#new" ).on( "click",  function() {
		jQuery( ".hidden_form" ).fadeIn(500);
		jQuery( ".hidden_form2").fadeOut(500);
		jQuery( ".hidden_form3").fadeOut(500);
	});	
   jQuery( "#list" ).on( "click",  function() {
		jQuery( ".hidden_form2" ).fadeIn(500);
		jQuery( ".hidden_form" ).fadeOut(500);
		jQuery( ".hidden_form3").fadeOut(500);
	});	

</script>
</div>
</div>
</body> 
</html>