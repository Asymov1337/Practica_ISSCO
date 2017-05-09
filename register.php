<?php
$servername="localhost";
$username="root";
$password="";
$database="accounts";

$con= mysqli_connect($servername,$username,$password)or die(mysqli_error());
$db=mysqli_select_db($con,"accounts") or die(mysqli_error());

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$user_role = $_POST['user_role'];

$name = mysqli_real_escape_string($con,$name);
$email = mysqli_real_escape_string($con,$email);
$phone = mysqli_real_escape_string($con,$phone);
$user_role = mysqli_real_escape_string($con,$user_role);

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    exit("Adresa de email invalida. "); // Use your own error handling ;)
$select = mysqli_query($con,"SELECT email FROM users WHERE email = '".$_POST['email']."'") or exit(mysqli_error($con));
if(mysqli_num_rows($select))
    exit("Email deja existent. ");

$query="INSERT INTO users (name,email,phone,user_role) VALUES ('$name','$email','$phone','$user_role')";

$result=mysqli_query($con,$query) or die(mysqli_error());          
print "<h1>you have registered sucessfully</h1>";


echo "Thank you for your registration to the ";
?>