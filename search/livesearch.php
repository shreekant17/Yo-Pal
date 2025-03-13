<?php
require_once('../auth/check_login.php');

if(isset($_POST['input'])){
    $input=$_POST['input'];

    ?>
        <?php 
        if(isset($_SESSION['email'])){
            $myUsername=$_SESSION['username'];
        }
        $getPeople="Select * from useraccount where Fname like '{$input}%' or username like '{$input}%' or Lname like '%{$input}%'";
        $getPeopleResult = mysqli_query($conn, $getPeople);
        if(mysqli_num_rows($getPeopleResult) > 0){
        ?>
            
            <div class="people-account">
                <?php
                while($getPeopleRow=mysqli_fetch_assoc($getPeopleResult)){
                if($getPeopleRow['DPsrc']==NULL){
                    $personDp="Resources/images/defaultDp.jpeg";
                }
                else{
                    $personDp=$getPeopleRow['DPsrc'];
                }
                $personName=$getPeopleRow['Fname']." ".$getPeopleRow['Lname'];
                $personUsername=$getPeopleRow['Username'];
                ?>
                <div class="id-tag">
                    <div class="id-data"  onclick="goToProfile('profile.php?username=<?php echo $personUsername;?>')">
                        <img src="<?php echo $personDp;?>" alt="">
                        <div class="id-name" >
                        <h4><?php echo $personName;?></h4>
                        <h6><?php echo $personUsername;?></h6>
                        </div>
                        <script>
                        function goToProfile(url){
                            window.location.href=url;
                        }
                        </script>
                    </div>
                </div>
            <?php
          }
          ?>
          </div>
      <?php
        }
        else{
            echo "<br><h4> No users found </h4><br>";
        }
}
?>

