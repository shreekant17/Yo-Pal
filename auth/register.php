<?php
session_start();
require_once('database.php');

// get username and age from form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$email = $_POST['email'];
$upassword = $_POST['password'];
$dob = $_POST['dob'];
$gender=$_POST['gender'];


// insert username and age into users table
$sql = "INSERT INTO useraccount(Fname, Lname, Username, Email, Password, Date_of_birth, Gender, Followers, Followings, PostsCount, DeletedPosts, StoriesCount, DeletedStories) VALUES ('$fname', '$lname','$uname','$email','$upassword','$dob', '$gender',0,0,0,0,0,0)";
if (mysqli_query($conn, $sql)) {
    mkdir("../users/$email");
    mkdir("../users/$email/dp");
    mkdir("../users/$email/posts");
    mkdir("../users/$email/stories");
    header('location: ../index.php');

} else {
    $error = mysqli_error($conn);

    $_SESSION["duplicateError"]="";
    $error1="Duplicate entry '$uname' for key 'useraccount.Username'";
    $error2="Duplicate entry '$email' for key 'useraccount.PRIMARY'";
    
    
    if($error==$error1){
        $_SESSION["duplicateError"]="Username already exists! Fill again";
    }
    else if($error==$error2){
        $_SESSION["duplicateError"]="Email Id already exists! Fill again";
    }
    else{
        $_SESSION["duplicateError"]="Something went wrong! Fill again";
    }
    header('location: ./signin.php');
}

// close database connection
mysqli_close($conn);
?>
