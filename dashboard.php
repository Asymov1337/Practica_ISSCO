<?php

	session_start();
	if(!isset($_SESSION['verif']))
		header('location: index.php');
	error_reporting(E_PARSE | E_ERROR);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "accounts";

	$conn = new mysqli($servername, $username, $password,$database);

	if ($conn->connect_error) {
    	die("Conectare nereusita: " . $conn->connect_error);
} 

	$user = $_SESSION['role'];
	$owner = $_SESSION['user'];




$send = $_GET['click'];
$click2 = $_GET['click2'];
$errorE = $_GET['errorE'];
$errorU = $_GET['errorU'];
$errorP = $_GET['errorP'];
$verif = $_GET['verif'];

if($user == "ADMIN" or $user == "Admin" or $user == "admin")


?>

	<!DOCTYPE html>
<html>
<head> 
		<title>Practica</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
			<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
		<script type="text/javascript" src="javascript/jquery-1.10.2.min.js"></script>
<style type="text/css">
.copyright {
 text-align: center;
 background: rgba(0,0, 0, 0.85);
 padding: 17px;
 color: #9b9b9b;
}
.log_out_icon img {
	width: 100%;
	display: block;
	height: auto;
}
.log_out_icon {
	display: block;
	width: 26px;
	cursor: pointer;
	position: absolute;
	top: auto;
	right: auto;
}
.log_out input {
	display: inline-block;
    font-size: 14px;
    background: #b11954;
    border: 1px solid #b11954;
    color: #fff;
    padding: 4px 19px;
    border-bottom-left-radius: 5px;
    cursor: pointer;
    margin: 0px auto;
    display: block;
    padding-right: 7px;

}
.log_out.active {
 margin-bottom: 0px;
right: 0;}

 
.log_out {
	transition: all 0.5s ease;
	position: fixed;
	top: 25px;
	right: -140px;
	width: 100%;
	display: block;
	overflow: hidden;
	text-align: right;
	background: #b11954;
	width: 177px;
	padding: 9px 5px;
	margin-bottom: 0px;
}
.log_out form{
	margin: 0px;
}

		
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
.hidden_form5{
	display: none;
	width: 100%;
	background: no-repeat;
	border: 1px solid #fff;
	padding: 7px;
	margin: 0px auto;
	color:#fff;
	margin: 5px auto 14px;
}

	.hidden_form4{
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
	
.hidden_form5 input[type=text], input[type=password], input[type=email]
{
	width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 2px solid #ccc;
    box-sizing: border-box;
}
.hidden_form5 input[type=submit]{
	 background-color: #b11954;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 50%;
    text-transform: uppercase;


}
.hidde_form5 h1{
	text-align: center;
	font-size: 65px;
	top: 25px;margin: 45px 0px 0px;
	color: white;
}

.hidden_form5 input[type=submit]:hover{
	 opacity: 0.8;
}
.arrow:hover{ background-image: url('img/arrow2.png')
	 -webkit-transform: scale(1.2);
			}
.arrow {
	background: url('img/arrow.png');
	width: 123px;
	height: 68px;
	display: block;
	background-size: cover !important;
	background-repeat: no-repeat !important;
	background-position: center center !important;
	display: block;
	overflow: hidden;
	margin: 0, auto;
	margin-left: 160px;
	padding-bottom: -22px;
}
.log{
	float: right;
}
body {
	background-image: url(img/header.png);
    height: auto;
/*    overflow: hidden;*/
    background-repeat: no-repeat;

	/*margin-bottom: 150px;*/
}
</style>
</head>
<body>

<div class="log_out">
	<div class="log_out_icon">
		<img src="img/iconita.png" />
	</div>
	<form action="logout.php" method="post">


		<input type="submit" value="Log Out" />
	</form> 
</div>

  
<div class="body" style="position: relative">

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
		<?php
if($user == "USER" or $user == "User" or $user == "user")
	echo '<script>
var element = document.getElementById("edit");
element.parentNode.removeChild(element);
var element = document.getElementById("list");
element.parentNode.removeChild(element);
</script>';

?>
		<div class="content"><p>Alege una dintre optiuni!</p><div class="arrow">            </div>
			<div class="content-support">
		
				<div class="hidden_form">
					 <form action="upload.php" method="POST" enctype="multipart/form-data">
						  <label>Title*: <input type="text" name="title" required>  </label>
						  <label>Categorie*: <input type="text" name="categorie" required> </label>
						  <label>Mesaj: <textarea name="mesaj"> </textarea></label>
						  <div id="ifrm"> </div>
							
								
								Select file to upload:
   							<input type="file" name="fileToUpload" id="fileToUpload" class="file_up">
    						
								<input type="submit" value="UPLOAD" id="sub" name="submit" />
							
							
						  
					</form> 
				</div>

					
							

														<div id="ac-wrapper" class="hidden_form5">
								 <div id="popup" >
								  <center>
								  <h1>Register</h1>
								  <p><span class="error"> * spatiu obligatoriu </span></p>
								  
								    <form action="register.php" method="post">
								    	<input type="text" name="fname" placeholder="Numele complet" required>  * <br>
								    	<input type="text" name="uname" placeholder="Nume utilizator" required> *<br>
								        <input type="email" name="email3" placeholder="Email" required>  * <br>
								        <input type="password" name="pass1" placeholder="Parola" required>  * <br>
								        <input type="password" name="pass2" placeholder="Repatati parola" required />  * <br>
								        <input type="text" name="phone" placeholder="Numar Tel.(format: xxxx-xxx-xxxx)" pattern="^\d{10}$">&nbsp; &nbsp;  <br>
								        <p>Rolul userului</p>
								    <input type="radio" name="role" value="Admin" checked> Admin
								  <input type="radio" name="role" value="User"> User<br>
								   
								      <input type="submit" name="submit" value="Register">
								      

								      		<?php
								      		if (isset($verif)){
								      		if(isset($errorP))
								      			{
								      				echo '<br>'.$errorP;
								      				echo '<script type="text/javascript">';
												echo 'jQuery( ".hidden_form5").fadeIn(500);';
												echo 'jQuery( ".hidden_form2").fadeOut(500);';
												echo 'jQuery( ".hidden_form" ).fadeOut(500);';
												echo '</script>';
								      			}	
								      			if(isset($errorE))
								      			{
								      				echo '<br>'.$errorE;
								      				echo '<script type="text/javascript">';
								  					echo 'jQuery( ".hidden_form5").fadeIn(500);';
												echo 'jQuery( ".hidden_form2").fadeOut(500);';
												echo 'jQuery( ".hidden_form" ).fadeOut(500);';
												echo '</script>';
								      			}	
								      			if(isset($errorU))
								      			{
								      				echo '<br>'.$errorU;
								      				echo '<script type="text/javascript">';
												echo 'jQuery( ".hidden_form5").fadeIn(500);';
												echo 'jQuery( ".hidden_form2").fadeOut(500);';
												echo 'jQuery( ".hidden_form" ).fadeOut(500);';
												echo '</script>';
								      			}	
								      				$verif = "";
								      				$errorP="";
								      				$errorU="";
								      				$errorE="";
								      		}

								      ?>
								      </form>
								  </center>
								  </div>





								</div>
				
						  <?php

						  		$sql = "SELECT userID,name,email,phone,user_role,date_registred FROM users";
			$result = $conn->query($sql);

			echo '<div class="hidden_form2"><form action="dashboard.php" method="get"><br><table><tr>';
			echo '<th> User Id </th><th>   Name   </th><th> Email </th><th>  Phone  </th><th>  User role  </th><th>   Date registered</th></tr>';

			while($row = $result->fetch_assoc())
			{
				echo '<tr>';
				
    			echo '<td>'.$row['userID'].'</td><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td><td>'.$row['user_role'].'</td><td>'.$row['date_registred'].'</td><td><a href="delete_user.php?id='.$row['userID'].'&click=1" class="btn_sterge">Stergere</a></td><td><a href="dashboard.php?id='.$row['userID'].'&name='.$row['name'].'&email='.$row['email'].'&userR='.$row['user_role'].'&phone='.$row['phone'].'&click=1" class="btn_edit">Edit</a></td>';
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
												echo '<form action="edit_user.php" method="POST">';
												
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
												$send ="";
											
											}
											
											
						  		}
						  		if (isset($click2))
						  		{
						  			$id = $_GET['id'];
						  				$title = $_GET['title'];
						  				$category = $_GET['category'];
						  				$registration_date = $_GET['registration_date'];
						  				$mesage = $_GET['mesage'];

						  				if(isset($id,$title,$category,$registration_date,$mesage))
						  				{
						  					echo '<div class="hidden_form3">';
												echo '<form action="edit_document.php" method="POST">';
												
												echo '<strong>Titlu: </strong> <input type="text" name="titlu" value='.$title.'><br>';
												echo '<strong> Categorie: </strong> <input type="text" name="categorie" value='.$category.'><br>';
												echo '<strong> Mesaj: </strong> <input type="memo" name="mesaj" value='.$mesage.'>';
												echo '<input type="Submit" value="Submit">';
												$_SESSION['id2'] = $id;
												unset($id);
											echo '</form></div>';
											echo '<script type="text/javascript">';
												echo 'jQuery( ".hidden_form3").fadeIn(500);';
												echo 'jQuery( ".hidden_form2").fadeOut(500);';
												echo 'jQuery( ".hidden_form" ).fadeOut(500);';
												echo '</script>';
												$click2="";
						  				}
						  				
						  		}


						  ?>
						  <?php

												  	$sql = "SELECT id_doc,title,owner,category,registration_date,mesage,extensie FROM documents";
									$result = $conn->query($sql);

									echo '<div class="hidden_form4"><form action="dashboard.php" method="get"><br><table><tr>';
									echo '<th> Title    </th><th>   Owner     </th><th> Category </th><th> Registration Date  </th><th>    Mesage  </th></tr>';
									while($row = $result->fetch_assoc())
										{
											echo '<tr>';
											
							    			echo '<td>'.$row['title'].'</td><td>'.$row['owner'].'</td><td>'.$row['category'].'</td><td>'.$row['registration_date'].'</td><td>'.$row['mesage'].'</td><td><a href="docs/'.$row['id_doc'].'.'.$row['extensie'].'" download class="btn_sterge">Download</a></td>';
							    			
							 
							   				 if($user == "ADMIN"  or $user == "Admin" or $user == "admin")
							   				 { 	
							   				 	echo '<td><a href="delete_document.php?click2=1&id='.$row['id_doc'].'" class="btn_sterge">Stergere</a></td><td><a href="dashboard.php?click2=1&id='.$row['id_doc'].'&title='.$row['title'].'&category='.$row['category'].'&registration_date='.$row['registration_date'].'&mesage='.$row['mesage'].'"" class="btn_edit" >Edit</a></td>';
							   				 }
							   				 else{
							   				 	if ($row['owner'] == $owner)
							   				 	{
							   				 		$_SESSION['verif_own'] = $row['owner'];
							   				 		echo '<td><a href="delete_document.php?click2=1&id='.$row['id_doc'].'" class="btn_sterge">Stergere</a></td><td><a href="dashboard.php?click2=1&id='.$row['id_doc'].'&title='.$row['title'].'&category='.$row['category'].'&registration_date='.$row['registration_date'].'&mesage='.$row['mesage'].'"" class="btn_edit" >Edit</a></td>';
							   				 	}
							   				 }
							   				  echo '</tr>';
										}

										echo '</table></form></div>';
										
						  ?>

					
			</div>
		</div>
</div>
<script type="text/javascript">
   jQuery( "#new" ).on( "click",  function() {
		jQuery( ".hidden_form" ).fadeIn(500);
		jQuery( ".hidden_form2").fadeOut(500);
		jQuery( ".hidden_form3").fadeOut(500);
		jQuery( ".hidden_form4" ).fadeOut(500);
		jQuery( ".hidden_form5").fadeOut(500);
	});	
   jQuery( "#list" ).on( "click",  function() {
		jQuery( ".hidden_form2" ).fadeIn(500);
		jQuery( ".hidden_form" ).fadeOut(500);
		jQuery( ".hidden_form3").fadeOut(500);
		jQuery( ".hidden_form4" ).fadeOut(500);
		jQuery( ".hidden_form5").fadeOut(500);
	});
	jQuery( "#delete" ).on( "click",  function() {
		jQuery( ".hidden_form4" ).fadeIn(500);
		jQuery( ".hidden_form" ).fadeOut(500);
		jQuery( ".hidden_form3").fadeOut(500);
		jQuery( ".hidden_form2").fadeOut(500);
		jQuery( ".hidden_form5").fadeOut(500);
	});	
		
		jQuery( "#edit" ).on( "click",  function() {
		jQuery( ".hidden_form5" ).fadeIn(500);
		jQuery( ".hidden_form" ).fadeOut(500);
		jQuery( ".hidden_form3").fadeOut(500);
		jQuery( ".hidden_form2").fadeOut(500);
		jQuery( ".hidden_form4").fadeOut(500);
	
		
	});	
		jQuery( ".log_out_icon" ).on( "click",  function() {	
		jQuery( ".log_out" ).addClass("active");
	});

	</script>
	



</div>


</body> 

<br>

</html>