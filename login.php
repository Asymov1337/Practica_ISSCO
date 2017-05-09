<?php 
$servername = 'localhost';
 $username = 'root';
 $password = '2142043';
 $database = 'accounts';
 $name = $_POST["user"];
 $password = $_POST["pass"];

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


