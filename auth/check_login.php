<?php
session_start();
// Database connection details
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'yopal';


// Create database connection
$conn = new mysqli($host, $user, $password, $dbname);

$conn->set_charset("utf8mb4");

// Check for connection errors
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Check for cookie

if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $email = $_COOKIE['email'];
    $pass = $_COOKIE['password'];
    $sql = "SELECT * FROM userAccount WHERE email = '$email'";
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
    
    // Verify the submitted password against the hashed password
        if ($pass != $row['Password']) {
            // Password is correct
            //header('Location: auth/signin.php');
        }
    }
}

elseif (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $pass = $_SESSION['password'];
    $sql = "SELECT * FROM userAccount WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // Get the hashed password from the database
        $row = $result->fetch_assoc();      
    // Verify the submitted password against the hashed password
        if ($pass != $row['Password']) {
            // Password is correct
            $_SESSION["guest"]="x";
           // header('Location: auth/signin.php');
        }
    }
}

else{
            $_SESSION["guest"]="x";
            //header('Location: auth/signin.php');
}

?>
