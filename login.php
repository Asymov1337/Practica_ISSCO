<?php 
session_start();
$servername = "localhost";
 $username = "root";
 $password = "";
 $database = "#";

 $con=mysql_connect($servername,$username,$password,$database);
 $db=mysql_select_db($servername,$con);
     if ($name == '' || $password == '') {
        echo "You must enter all fields";
     } else {
        $sql = "SELECT * FROM members WHERE name = '$name' AND password = '$password'";
        $query = mysql_query($sql);
        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            require_once("login.php");
            exit;
        }
        if (mysql_num_rows($query) > 0) {
            require_once("home.php");
            exit;
        }
        echo "Username and password do not exist.";
        require_once("login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title><form action="/action_page.php"></title>
    <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript">
function PopUp(){
        document.getElementById('ac-wrapper').style.display="none"; 
}
</script> 
</head>
<body>
 <div id="ac-wrapper">




  <div id="popup" >
  <center>
  <h1>Login</h1>
    <form action="login.php" method="post">
        <input type="text" name="user" placeholder="Username" required="required" />
      <input type="password" name="pass" placeholder="Password" required="required" />
      <input type="submit" name="submit" value="Login" />

      <?php

        if(isset($_POST['submit']))
        {
             $name = $_POST["user"];
                $password = $_POST["pass"];
            if ($name == '' || $password == '') {
        echo "You must enter all fields";
     } else {
        $sql = "SELECT * FROM members WHERE name = '$name' AND password = '$password'";
        $query = mysql_query($sql);
        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            require_once("login.php");
            exit;
        }
        if (mysql_num_rows($query) > 0) {
            require_once("home.php");
            exit;
        }
        echo "Username and password do not exist.";
        require_once("login.php");
    }
        }

      ?>
    </form>
  </center>
  </div>





</div>

<p>continut pagina</p>
</body>
</html>