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
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$user_role=$_POST['user'];
	$date_registered=$_POST['date'];
	
	$query="INSERT INTO accounts (full_name,phone,email,password,user_role,date_registered) VALUES ('$fullname','$phone','$email','$password','$user_role','$date_registered')";
	$data=mysql_query($query) or die(mysql_error());
	if $data{
		echo "Inregistrat cu succes";
	}
}

function SignUp(){
	if(!empty)($_POST['email']) 
	{
		$query=mysql_query ("SELECT * FROM accounts WHERE $email=$_POST['email'] and password=$_POST['password']",
		mysql_real_escape_string($email), mysql_real_escape_string($password) or die(mysql_error()));
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