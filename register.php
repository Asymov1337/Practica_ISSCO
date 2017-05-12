<?php
     session_start();
     $role = $_SESSION['role'];
     if ($role == "ADMIN" or $role == "Admin" or $role == "admin")
     {
    error_reporting(E_PARSE | E_ERROR);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "accounts";

    $conn = new mysqli($servername, $username, $password,$database);

    if ($conn->connect_error) {
        die("Conectare nereusita: " . $conn->connect_error);
} 
    $fname = $_POST['fname'];
    $email = $_POST['email3'];
    $uname = $_POST['uname'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    $verif=0;

    $errorE="";
    $errorP="";
    $errorU="";
    //verificare email existent
    $sql = "SELECT * FROM users WHERE email = '$email'";
    if (mysql_num_rows($sql) > 0)
    {
        $errorE = "Acest email este deja utilizat";
        $verif = 1;
    }
    //Verificare parole
    if ($pass1 != $pass2)
    {
        $errorP = "Parolele nu corespund";
        $verif = 1;
    }
    //Verificare username existent
    $sql = "SELECT * FROM users WHERE name = '$uname'";
    if (mysql_num_rows($sql) > 0)
    {
        $errorU = "Acest username este deja utilizat";
        $verif = 1;
    }

    if ($verif == 0)
    {
        $pass1 = md5($pass1);
        $data = date("Y-m-d");
        $sql = "INSERT INTO users (full_name,name,password,email,phone,user_role,date_registred) VALUES ('$fname','$uname','$pass1','$email','$phone','$role','$data')";
        $conn->query($sql);
        header('location: dashboard.php');
    }else
    {
        header('location: dashboard.php?verif=1&errorE='.$errorE.'&errorP='.$errorP.'&errorU='.$errorU.'');
    }
}

?>