<?php
$define('DB_HOST' 'localhost');
$define('DB_NAME' 'accounts');
$define('DB_USER' 'root');
$define('DB_PASSWORD' '');

$con=mysql_connect(DB_HOST,DB_NAME,DB_USER,DB_PASSWORD) or die("Conectare nereusita: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Conectare nereusita: " . mysql_error());

function NewUser()
{
	$full_name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$user_role=$_POST['user'];
	$date_registered=$_POST['date'];
	
	$query="INSERT INTO users (full_name,email,phone,user_role,date_registered) VALUES ('$full_name','$email','$phone','$user_role','$date_registered')";
	$data=mysql_query($query) or die(mysql_error());
	if $data{
		echo "Inregistrat cu succes";
	}
}

function SignUp(){
	if(!empty)($_POST['email']) 
	{
		$query=mysql_query ("SELECT * FROM users WHERE $email=$_POST['email']",
		mysql_real_escape_string($email), or die(mysql_error()));
	}
	if(!$row=mysql_fetch_array($query) or die(mysql_error()))
	{
		newuser();
	}
	else
	{
		echo "Sunteti deja inregistrat";
	}
}

if(isset($_POST['submit']))
{
	SignUp();
}
?>