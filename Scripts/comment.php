<?php
require_once('LoginRegister/check_login.php');
$email=$_SESSION['email'];
$commentInput=$_POST['commentInput'];
$commentInput=addslashes($commentInput);
$postId=$_POST['postId'];
$setCommentId="SELECT ADDTIME(current_timestamp,'0 9:30:0'), PostedBy, CommentsCount from allPosts where PostId='$postId'";
$result1 = $conn->query($setCommentId);
$row1 = $result1->fetch_assoc();
$commentsCount=$row1['CommentsCount'];
$currTime=$row1["ADDTIME(current_timestamp,'0 9:30:0')"];
$commentId=$commentsCount.'_'.$email.$currTime;
$PosterId=$row1["PostedBy"];
$ActionText="Commented on your post";
if($commentInput!=''){
    $setComment="INSERT into comments (CommentId, Comment, PostId, CommentedBy, CommentedOn) VALUES ('$commentId', '$commentInput', '$postId', '$email', '$currTime')";
    $result2 = $conn->query($setComment);
    $updateCommentsCount="UPDATE allPosts set CommentsCount=CommentsCount+1 where postId='$postId'";
    $result3 = $conn->query($updateCommentsCount);
    $_SESSION['commentInputValue']="";
    if($email!=$PosterId){
        $insert_query3= "INSERT INTO notifications (ActionTo, ActionBy, ActionOn, ActionText, PostId) Values ('$PosterId', '$email', '$currTime', '$ActionText', '$postId')";
        mysqli_query($conn, $insert_query3);
    }
    header("location: ../index.php");
    exit;
}
else{
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}
?>