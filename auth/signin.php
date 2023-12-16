<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Signup to Yo!Pal</title>
    <link rel="stylesheet" href="./signin.css" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css"
    />
    <link rel="icon" href="../Resources/images/icon.png" type="image/x-icon" />
  </head>
  <body>
    
      <script>
      alert("Attention! If you are unable to login to your account it might be because your account has been deactivated or deleted due to inactivity, Please create a new account!");
    </script>

    <div class="container">
        <input type="radio" name="switch-form" id="switch-to-register" hidden/>
        <input type="radio" name="switch-form" id="switch-to-login" hidden checked />
        <label for="switch-to-login" id="log-toggle">Already Have an Account? Login</label>
        <label for="switch-to-register" id="reg-toggle">Dont have an Account? Register</label>
      <div class="form-box login">
        <h2>Login</h2>
        <form
          class="form"
          action="./login.php"
          method="post"
        >
          <div class="input-box">
            <span class="icon"><i class="uil uil-envelope"></i></span>
            <input type="email" name="email" required />
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><i class="uil uil-lock"></i></span>
            <input type="password" name="password" required />
            <label>Password</label>
          </div>
          <div class="remember-forgot">
            <div class="rememberMe">
              <input type="checkbox" name="remember" id="rememberme" />
              <label for="rememberme">Remember Me</label>
            </div>
            <a href="#">Forgot Password?</a>
          </div>
          <button type="submit" class="btn">Login</button>
        </form>
      </div>

      <?php
      if (isset($_SESSION['passError'])){ 
        echo "<script type='text/javascript'>alert('Incorrect Password!');</script>";
        unset($_SESSION['passError']);
      }
      if (isset($_SESSION["emailNotFoundError"])){
        echo "<script type='text/javascript'>alert('Account Not Found!');</script>";
        unset($_SESSION["emailNotFoundError"]);
      }
      ?>

      <div class="form-box register">
        <h2>Register</h2>
        <form action="./register.php" method="post" >
          <div class="name">
            <div class="input-box">
              <input type="text" id="fname" name="fname" required />
              <label>First Name</label>
            </div>
            <div class="input-box">
              <input type="text" id="lname" name="lname" required />
              <label>Last Name</label>
            </div>
        </div>
          <div class="input-box">
            <span class="icon"><i class="uil uil-user"></i></span>
            <input type="text" id="uname" name="uname" required />
            <label>Username</label>
          </div>
          <div class="input-box">
            <span class="icon"><i class="uil uil-envelope"></i></span>
            <input type="email" id="email" name="email" required />
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><i class="uil uil-lock"></i></span>
            <input type="password" id="password" name="password" required />
            <label>Password</label>
          </div>
          <div class="input-box">
            <span class="icon"><i class="uil uil-calender"></i></span>
            <input type="date" id="dob" name="dob" required />
            <label>Date of Birth</label>
          </div>
          <div class="gender">
            <input type="radio" id="male" name="gender" value="M" required />
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="F" />
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="O" />
            <label for="other">Other</label>
          </div>
          <div class="error">
            <?php if (isset($_SESSION["duplicateError"])){ ?>
              <p><?php echo $_SESSION["duplicateError"]; ?><p>
                <?php
            }?>
          </div>
          <div class="terms">
            <input type="checkbox" id="tnc"/>
            <label for="tnc">I agree to the terms & conditions</label
            >
          </div>
          <button type="submit" class="btn">Create New Account</button>
        </form>
      </div>
    </div>
    </div>
    <?php
    if(isset($_SESSION['duplicateError'])){
      $alertError=$_SESSION['duplicateError'];
      echo "<script type='text/javascript'>alert('$alertError');</script>";
      unset($_SESSION['duplicateError']);
      unset($_SESSION['activateRegister']);
    }
    ?>
    <footer>
      <nav>
        <a href="../Markup/about.html">About</a>
        <a href="../Markup/contact.html">Contact</a>
      </nav>
    </footer>
    <script src="./cookie.js"></script>
  </body>
</html>
