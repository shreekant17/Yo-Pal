<?php
    require_once('../LoginRegister/check_login.php');
    $email=$_SESSION['email'];
    $sql="SELECT PostsCount, DeletedPosts FROM useraccount WHERE email = '$email'";
    $result= $conn->query($sql);
    $row = $result->fetch_assoc();
    $postCount=$row['PostsCount'];
    $deletedPostsCount=$row['DeletedPosts'];
    $newPostCount=$postCount+1+$deletedPostsCount;
    $sql="select ADDTIME(current_timestamp,'0 9:30:0')";
    $result= $conn->query($sql);
    $row = $result->fetch_assoc();
    $postedOn = $row["ADDTIME(current_timestamp,'0 9:30:0')"];
    $postId =$newPostCount.'_'.$email;
    $caption=$_POST['textPost'];
    $stringlength=strlen($caption)-substr_count($caption,' ');
    if($stringlength>3){
        $caption=addslashes($caption);
        $sql="INSERT INTO allposts (PostID, PostedBy, LikesCount, CommentsCount, Caption, PostedOn) values ('$postId', '$email', 0,0, '$caption', '$postedOn')";
        $conn->query($sql);
        $sql="UPDATE useraccount set PostsCount=PostsCount+1 where email='$email'";
        $conn->query($sql);
    }
    header("location:../../index.php");
?>