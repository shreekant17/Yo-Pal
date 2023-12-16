<?php
require_once('../LoginRegister/check_login.php');
$sql="delete from comments where CommentId='$commentId'";
$conn->query($sql);
$sql="update allPost set CommentsCount=CommentsCount-1 where postId='$postId'";
$conn->query($sql);
header("location:../../index.php");
?>