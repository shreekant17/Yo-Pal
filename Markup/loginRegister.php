<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Styles/loginStyle.css?<?php echo time(); ?>" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css"
    />
    <link rel="icon" href="../Resources/images/icon.png" type="image/x-icon" />
    <title>Yo!Pal</title>
  </head>
  <body>
    <span class="symbol">
      <h2 class="logo">Yo!</h2>
      <h2 class="logo2">Pal</h2>
    </span>
    <div class="wrapper <?php if(isset($_SESSION['activateRegister'])){echo $_SESSION['activateRegister'];}?>">
      <div class="form-box login">
        <h2><label>Login</label></h2>
        <form action="../Scripts/LoginRegister/login.php" method="post">
          <div class="input-box">
            <span class="icon"><i class="uil uil-envelope"></i></span>
            <input
              type="email"
              id="email"
              class="email"
              name="email"
              required
            />
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><i class="uil uil-lock"></i></span>
            <input type="password" id="password" name="password" required />
            <label>Password</label>
          </div>
          <div class="remember-forgot">
            <label
              ><input type="checkbox" name="remember" id="remember" />Remember
              Me</label
            >
            <a href="#">Forgot Password?</a>
          </div>
          <button type="submit" class="btn">Login</button>
          <div class="login-register">
            <p>
              Don't have an account?
              <a href="#" class="register-link">Register</a>
            </p>
          </div>
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
        <form action="../Scripts/LoginRegister/register.php" method="post" >
          <span class="name">
            <div class="input-box">
              <input type="text" id="fname" name="fname" required />
              <label>First Name</label>
            </div>
            <div class="input-box">
              <input type="text" id="lname" name="lname" required />
              <label>Last Name</label>
            </div>
          </span>
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
          <div class="remember-forgot">
            <label
              ><input type="checkbox" />I agree to the terms & conditions</label
            >
          </div>
          <button type="submit" class="btn register">Create New Account</button>
          <div class="login-register">
            <p>
              Already have an account?
              <a href="#" class="login-link">Login</a>
            </p>
          </div>
        </form>
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
    <script src="../Scripts/LoginRegister/loginScript.js"></script>
    <script src="../Scripts/LoginRegister/cookie.js"></script>
    <nav>
      <div class="navigation" id="topNavigation">
        <a href="about.html">About</a>
        <a href="contact.html">Contact Us</a>
      </div>
    </nav>
  </body>
</html>
