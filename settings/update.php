<?php 
require_once("../auth/check_login.php");
$email=$_SESSION['email'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$cont=$_POST['phone'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$dpsrc=$_SESSION['DpSrc'];
if(isset($_POST["phone"])){
    $phone=$_POST['phone'];
}

if(isset($_FILES["uploadNewDp"])){
        $filename = $_FILES["uploadNewDp"]["name"];
        $tempname = $_FILES["uploadNewDp"]["tmp_name"];

    $folder = "users/".$email."/dp"."/".$filename;
    move_uploaded_file($tempname, '../'.$folder);
    if($filename!=null){
        $dpsrc=$folder;
        $sql2 ="UPDATE likes set DPsrc='$folder' WHERE LikedBy='$email'";
        $conn->query($sql2); 
    }
}

$sql = "update useraccount set fname='$fname', lname='$lname', username='$uname', password='$pass', date_of_birth='$dob', gender='$gender', dpsrc='$dpsrc' where email='$email'" ;

try {
    $conn->query($sql);
        
} catch (Exception $e) {
    // Handle other exceptions if needed
    //echo "Error: " . $e->getMessage();
    $_SESSION["uexists"]="Username already taken!";
    
}


if(isset($_POST["phone"])){

    $phone=$_POST['phone'];

    if($phone==""){
        $sql3="update useraccount set contact = NULL where email='$email'";
        $conn->query($sql3);
    }
    else{
        $sql4="update useraccount set contact='$phone' where email='$email'";
        $conn->query($sql4);
    }
}

$curUsername=$_SESSION['username'];
$curDp=$_SESSION['DpSrc'];
$sql5="update likes set username='$uname', dpsrc='$curDp' where username='$curUsername'";
$conn->query($sql5);
$sql6="update friends set following='$uname' where following='$curUsername'";
$conn->query($sql6);
$sql7="update friends set follower='$uname' where follower='$curUsername'";
$conn->query($sql7);



$_SESSION['DpSrc']=$dpsrc;
$_SESSION['username']=$uname;
$_SESSION['password']=$pass;
$_SESSION['name']=$fname;

header("location: ./account.php");

?>