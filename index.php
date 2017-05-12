
<!DOCTYPE html>
<html>
   
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="css/login.css">
      <form action="" method="post">
    <script type="text/javascript">
function PopUp(){
        document.getElementById('ac-wrapper').style.display="none"; 
}
</script>
      
   </head>
   
   <body >
	<div id="ac-wrapper">




  <div id="popup" >
      
         <center>
  <h1>Login</h1>
    <form method="post">
        <input type="text" name="username" placeholder="username" required="required" />
        <input type="password" name="password" placeholder="password" required="required" />

    
    </form>
      <input type="submit" name="submit" value="Login" onClick="PopUp()" />
  </center>
  <center>
  
  <input type="checkbox" name="remember" value="true"> Remember Me
  </center>
  </div>
  
</div>
				
         </div>
			
      </div>

   </body>
</html>
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

	if(isset($_SESSION['user']) and isset($_SESSION['pass'])){
		$uname = $_SESSION['user'];
		$pass = $_SESSION['pass'];
		echo "<script>
			document.getElementById('user').value = '$uname';
			document.getElementById('pass').value = '$pass';

		</script>";
	}
	$uname = $_POST['username'];
	$pass = $_POST['password'];



	$myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      $mypassword = md5($mypassword);


      $sql = "SELECT * FROM users WHERE name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
         
         $sql = "SELECT userID,name,email,phone,user_role,date_registred FROM users WHERE name = '$myusername' and password = '$mypassword'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					$_SESSION['role'] = $row['user_role'];
				}
				$_SESSION['user'] = $uname;
         if(isset($_POST['remember'])){
				$_SESSION['pass'] = $pass;
				$_SESSION['user'] = $uname;
				
				


	}
		$_SESSION['verif'] = "1";
         header("location: dashboard.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
?>