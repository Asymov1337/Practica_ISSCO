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
            $sql=( "SELECT id_doc FROM documents");
            
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc())
            {
                $id = $row['id_doc'];
            }
            $id++;
$owner = $_SESSION['user'];
$title =$_POST['title'];
$categorie = $_POST['categorie'];
$mesaj = $_POST['mesaj'];
 $data = date('Y-m-d');
$target_dir = "docs/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$newName=$target_dir.$id.".".$imageFileType;

// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 15000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "doc" && $imageFileType != "pdf" && $imageFileType != "docx"
&& $imageFileType != "ppt" && $imageFileType != "pptx" && $imageFileType != "xls" && $imageFileType != "xlsx" && $imageFileType != "txt"){
    echo "Sorry, only PDF,DOC,XLS,PPT,TXT files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
        rename($target_file, $newName);
        
         $sql = "INSERT INTO documents (title,owner,category,registration_date,mesage,extensie) VALUES ('$title','$owner','$categorie','$data','$mesaj','$imageFileType')";
            $conn->query($sql);
        header('location: dashboard.php'); 
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>