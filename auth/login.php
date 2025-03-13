
<?php
session_start();
require_once('database.php');

// Check if email address is present in table
$email = $_POST['email'];
$pass = $_POST['password'];

//$sanitized_email = mysqli_real_escape_string($conn, $email);
//$sanitized_password = mysqli_real_escape_string($conn, $pass);

$sql = "SELECT * FROM useraccount WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Get the hashed password from the database
  $row = $result->fetch_assoc();
  $username = $row['Username'];
  // Verify the submitted password against the hashed password
  if ($pass == $row['Password']) {
    // Password is correct

    $_SESSION['username']=$row['Username'];
    $_SESSION['email']=$row['Email'];
    $_SESSION['password']=$pass;
    $_SESSION['name']=$row['Fname'];
    if($row['DPsrc']!=NULL){
      $_SESSION['DpSrc']=$row['DPsrc'];
    }
    else{
      $_SESSION['DpSrc']="Resources/images/defaultDp.jpeg";
    }
    if (isset($_POST['remember'])) {
        setcookie('email', $email, time() + (86400 * 30), "/");
        setcookie('username', $username, time() + (86400 * 30), "/");
        setcookie('password', $pass, time() + (86400 * 30), "/");
    }
    header('location: ../Markup/loading.html');
  } else {
    // Password is incorrect
    $_SESSION['passError']="Password Incorrect!";
    header('location: ./signin.php');
  }
} else {
  // Account not found in the database
  $_SESSION['emailNotFoundError']="Email not found!";
  header('location: ./signin.php');
}
// Close database connection
$conn->close();
?>
