

<?php

    require_once("../../auth/check_login.php");
    $email=$_SESSION['email'];
    
    $filename=$_FILES["DpUpload"]["name"];
    $tempname = $_FILES["DpUpload"]["tmp_name"];

    $folder = "users/".$email."/dp"."/".$filename;
    move_uploaded_file($tempname, '../../'.$folder);

    //change Database Location
    $sql ="UPDATE useraccount set DPsrc='$folder' WHERE Email='$email'";
    $sql2 ="UPDATE likes set DPsrc='$folder' WHERE LikedBy='$email'";
    $conn->query($sql); 
    $conn->query($sql2); 
    $_SESSION['DpSrc']=$folder;
    header('location:../../index.php');
?>
