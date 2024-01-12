<?php

include('../auth/check_login.php');
require_once('../auth/check_login.php');

$postId=$_POST["PostId"];

$clikeSql3 = "select Username, DPsrc from likes where PostId='$postId'";
$cresult7 = mysqli_query($conn,$clikeSql3);

    if(mysqli_num_rows($cresult7)!=0){
        while($row5=mysqli_fetch_assoc($cresult7)){
        $likedByDp=$row5['DPsrc'];
        $likedByName=$row5['Username'];?>
        <div class="peopleLiked-tag">
            <img src="<?php echo $likedByDp ?>">
            <a href="profile.php?username=<?php echo $likedByName; ?>"><b><?php echo $likedByName ?></b></a>
        </div>
        <?php
    }
    }
?>