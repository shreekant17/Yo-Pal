
<!---
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File_Upload</title>
</head>
<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadfile">
        <input type="submit" name="Submit" value="Upload File">
    </form>
</body>
</html>
--->

<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'yopal';

    // Create database connection
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
    }
    
    $filename=$_FILES["DpUpload"]["name"];
    $tempname = $_FILES["DpUpload"]["tmp_name"];

    $folder = "users/".$_SESSION['email']."/dp"."/".$filename;
    move_uploaded_file($tempname, '../../'.$folder);

    $email=$_SESSION['email'];
    //change Database Location
    $sql ="UPDATE userAccount set DPsrc='$folder' WHERE Email='$email'";
    $sql2 ="UPDATE likes set DPsrc='$folder' WHERE LikedBy='$email'";
    $conn->query($sql); 
    $conn->query($sql2); 
    $conn->close();
    $_SESSION['DpSrc']=$folder;
    header('location:../../index.php');
?>
