<script src="fireauth.js"></script>
<script>
    firebase.auth().signOut()
    .then(() => {
      // User signed out
      
      console.log("Signed out successfully");
    })
    .catch((error) => {
      console.error("Sign-out error:", error);
    });
    </script>
<?php
// unset the cookie variables



unset($_COOKIE['username']);
unset($_COOKIE['password']);
unset($_COOKIE['email']);
unset($_COOKIE['PHPSESSID']);
// set the cookies to expire
setcookie('username', null, -1, '/');
setcookie('password', null, -1, '/');
setcookie('email', null, -1, '/');
setcookie('PHPSESSID', null, -1, '/');
// redirect to the login page
header('Location: ../../index.php');
?>


