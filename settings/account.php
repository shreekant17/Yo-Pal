<?php
require_once("../auth/check_login.php");

if(!(isset($_SESSION["email"]))){
    header("location:../auth/signin.php");
}

$dplocation="../".$_SESSION['DpSrc'];
$email=$_SESSION['email'];
$sql="select fname, lname, username, password, dpsrc, date_of_birth, gender, contact from useraccount where email='$email'";
$result=$conn->query($sql);
$row=mysqli_fetch_assoc($result);
$fname=$row['fname'];
$lname=$row['lname'];
$uname=$row['username'];
$pass=$row['password'];
$dob=$row['date_of_birth'];
$gender=$row['gender'];
$phone=$row['contact'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css"
    />
    <title>Account - Settings</title>
</head>
<body>
    <nav>
        <a href="../settings.php"><h1><i class="uil uil-arrow-left"></i></h1></a>
        <h1>Account - Settings</h1>
    </nav>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <div class="top">
            <div class="displaypic">
                <div class="picture">
                    <img src="<?php echo $dplocation;?>" id="dppre">
                </div>
                <label for="uploadNewDp"><i class="uil uil-edit"></i>Change picture</label>
                <input type="file" id="uploadNewDp" name="uploadNewDp"  accept="image/*" onchange= "previewImage(this)"/>
            </div>
            <div class="deactivate"> 
                <a href="../auth/logout.php"><label>Log-out</label></a>
            </div>
            <script>
                function previewImage(input) {
                    var preview = document.getElementById("dppre");
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            preview.src = e.target.result;
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
            </script>

        </div>
        <div class="fname">
            <label for="fname">First name:</label>
            <input type="text" id="fname" name="fname" value="<?php echo $fname ?>" required>
        </div>
        <div class="lname">

            <label for="lname">Last name:</label>
            <input type="text" id="lname" name="lname" value="<?php echo $lname ?>" required>
        </div>
        </div>
        <div class="uname">
            <label for="uname">Username:</label>
            <input type="text" id="uname" name="uname" value="<?php echo $uname ?>"  required>
        </div>
        
        
        <div class="pass">
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pass" value="<?php echo $pass ?>" required>
        </div>
        <div class="dob">
            <label for="dob">Date of birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $dob ?>" >
        </div>
        <div class="gender">
            <label>Gender:</label>
            <div class="option">
                <input type="radio" id="male" name="gender" value="M" required <?php if($gender=='M'){echo "checked";}?>/>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="F" <?php if($gender=='F'){echo "checked";}?> />
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="O" <?php if($gender=='O'){echo "checked";}?>/>
                <label for="other">Other</label>
            </div>
        </div>
        <div class="phone">
            <label for="phone">Contact:</label>
            <input type="tel" name="phone" id="phone" value="<?php echo $phone ?>">
        </div>
        
        <div class="submit">
            <button class="btn" type="submit">Save</button>
        </div>
    </form>
</body>
</html>

<?php

if(isset($_SESSION['uexists'])){
    echo"<script>alert('Username already taken');</script>";
    unset($_SESSION['uexists']);
}

?>