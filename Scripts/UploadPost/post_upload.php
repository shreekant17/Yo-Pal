<?php
    require_once('../LoginRegister/check_login.php');

    if(isset($_FILES["createUpload"])){
        $filename = $_FILES["createUpload"]["name"];
        $tempname = $_FILES["createUpload"]["tmp_name"];
    }
    else{
        $filename = $_FILES["createUploadVideo"]["name"];
        $tempname = $_FILES["createUploadVideo"]["tmp_name"];
    }
    $folder = "users/".$_SESSION['email']."/posts"."/".$filename;
    move_uploaded_file($tempname, '../../'.$folder);

    $email=$_SESSION['email'];
    $userName=$_SESSION['username'];
    
    $sql="SELECT PostsCount, DeletedPosts FROM userAccount WHERE email = '$email'";
    $result= $conn->query($sql);
    $row = $result->fetch_assoc();
    $postCount=$row['PostsCount'];
    $deletedPostsCount=$row['DeletedPosts'];
    $newPostCount=$postCount+1+$deletedPostsCount;
    $postFileName="post".$newPostCount;
    $postAddress="users/".$email."/posts"."/".$postFileName;
    rename("../../".$folder,"../../"."users/".$email."/posts"."/".$postFileName);
    $sql="select ADDTIME(current_timestamp,'0 9:30:0')";
    $result= $conn->query($sql);
    $row = $result->fetch_assoc();
    $postedOn = $row["ADDTIME(current_timestamp,'0 9:30:0')"];
    $postId =$newPostCount.'_'.$email;
    $caption=$_POST['captionText'];
    $caption=addslashes($caption);
    if(isset($_FILES["createUpload"])){
        $sql="INSERT INTO allPosts (PostID, PostedBy, LikesCount, CommentsCount, Caption, PostAddress, PostedOn) values ('$postId', '$email', 0,0, '$caption', '$postAddress', '$postedOn')";
        $conn->query($sql);
    }
    else{
        $sql="INSERT INTO allPosts (PostID, PostedBy, LikesCount, CommentsCount, Caption, VideoAddress, PostedOn) values ('$postId', '$email', 0,0, '$caption', '$postAddress', '$postedOn')";
        $conn->query($sql);
    }
    $sql="UPDATE userAccount set PostsCount=PostsCount+1 where email='$email'";
    $conn->query($sql);
    $conn->close();
    header("location:../../index.php");
?>