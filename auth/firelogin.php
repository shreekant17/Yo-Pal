<?php

require_once('database.php');


$email = $_POST['email'];
if(isset($_GET['email'])){
    $email=$GET['email'];
}


$sql="select username, fname, dpsrc from useraccount where email='$email'";


$result=$conn->query($sql);

if(mysqli_num_rows($result)==0){?>
<script>
    
    alert("Account does't exists! Create a new Account.");
    window.location.href = "signin.php";
</script>
<?php
    
}
else{
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
}

?>