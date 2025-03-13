<?php

require_once('database.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $fname."_".$lname."".$dob;
$email = $_POST['email'];
//$dob = $_POST['dob'];


$sql = "INSERT INTO useraccount(Fname, Lname, Username, Email, Followers, Followings, PostsCount, DeletedPosts, StoriesCount, DeletedStories) VALUES ('$fname', '$lname','$uname','$email',0,0,0,0,0,0)";
if (mysqli_query($conn, $sql)) {
    mkdir("../users/$email");
    mkdir("../users/$email/dp");
    mkdir("../users/$email/posts");
    mkdir("../users/$email/stories");
    $sql2="select username, fname, dpsrc from useraccount where email='$email'";
    $result=$conn->query($sql2);
    $row=mysqli_fetch_assoc($result);
    
    $_SESSION['email']=$email;
    $_SESSION['username']=$row['username'];
    $_SESSION['name']=$row['fname'];
    if($row['dpsrc']!=NULL){
        $_SESSION['DpSrc']=$row['dpsrc'];
    }
    else{
        $_SESSION['DpSrc']="../Resources/images/defaultDp.jpeg";
    }
    setcookie('email', $email, time() + (86400 * 30), "/");
    setcookie('username', $username, time() + (86400 * 30), "/");
    header('location: ../index.php');

} else {
    header('location: ./signin.php');
}

// close database connection
mysqli_close($conn);
?>

