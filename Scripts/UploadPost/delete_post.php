<?php
require_once('../LoginRegister/check_login.php');
$email=$_SESSION['email'];
$postId=$_POST['postId'];
$postAddress="../../".$_POST['postAddress'];
$sql="delete from allPosts where postId='$postId'";
$conn->query($sql);
$sql="update userAccount set PostsCount=PostsCount-1, DeletedPosts=DeletedPosts+1 where email='$email'";
$conn->query($sql);
$sql="delete from likes where PostId='$postId'";
$conn->query($sql);
$sql="delete from comments where PostId='$postId'";
$conn->query($sql);
unlink($postAddress);
header("location:../../index.php");
?>