<?php


require_once('database.php');



// Check for cookie

if (isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
    //$pass = $_COOKIE['password'];
    $sql = "SELECT * FROM useraccount WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // Get the hashed password from the database

        $row = $result->fetch_assoc();
        $_SESSION['username']=$row['Username'];
        $_SESSION['email']=$email;
        $_SESSION['name']=$row['Fname'];
        if($row['DPsrc']!=NULL){
            $_SESSION['DpSrc']=$row['DPsrc'];
        }
        else{
            $_SESSION['DpSrc']="Resources/images/defaultDp.jpeg";
        }
    }
}


else{
            $_SESSION["guest"]="x";
            //header('Location: auth/signin.php');
}

?>
