<?php 


    include('../auth/check_login.php');
    require_once('../auth/check_login.php');

    $postId = $_POST["PostId"];

    $clikeSql = "select * from likes where PostId='$postId' limit 3";
    $cresult3 = mysqli_query($conn, $clikeSql);

    $clikeSql2 = "select likesCount from allPosts where PostId='$postId'";
    $cresult4 = mysqli_query($conn,$clikeSql2);
    $crow4 = mysqli_fetch_assoc($cresult4);

    $clikeSql3 = "select Username, DPsrc from likes where PostId='$postId'";
    $cresult7 = mysqli_query($conn,$clikeSql3);
    
    $clikeCount=$crow4['likesCount'];
    if($clikeCount!=0){
        while($crow3=mysqli_fetch_assoc($cresult3)){

        $clikedp=$crow3['DPsrc'];
        
        $clikename=$crow3['Username'];
        ?>
        <span><img src="<?php echo $clikedp; ?>" /></span>
        <?php
        }
        ?>
        <?php if($clikeCount==1){?>
            <p>
            Liked By<b> <?php echo $clikename; ?></b>
            </p>
        <?php
        }
        else{
        ?>
        <p >
            Liked By <b> <?php echo $clikename; ?> </b> and <b> <?php echo $clikeCount-1; ?> others </b>
        </p>
        <?php
        }
    }
    ?>
    