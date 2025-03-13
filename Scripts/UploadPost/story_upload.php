<?php
require_once('../LoginRegister/check_login.php');
$email=$_SESSION['email'];
$userName=$_SESSION['username'];

$filename=$_FILES["createUploadStory"]["name"];
$tempname = $_FILES["createUploadStory"]["tmp_name"];
$folder = "users/".$email."/stories"."/".$filename;
move_uploaded_file($tempname, '../../'.$folder);


$sql="SELECT StoriesCount, DeletedStories FROM useraccount WHERE email = '$email'";
$result= $conn->query($sql);
$row = $result->fetch_assoc();
$storiesCount=$row['StoriesCount'];
$deletedStoriesCount=$row['DeletedStories'];
$newStoryCount=$storiesCount+1+$deletedStoriesCount;
$storyFileName="story".$newStoryCount;
$storyAddress="users/".$email."/stories"."/".$storyFileName;
rename("../../".$folder,"../../"."users/".$email."/stories"."/".$storyFileName);
$sql="select ADDTIME(current_timestamp,'0 9:30:0')";
$result= $conn->query($sql);
$row = $result->fetch_assoc();
$storyPostedOn = $row["ADDTIME(current_timestamp,'0 9:30:0')"];
$storyId =$newStoryCount.'_'.$email;
$caption=$_POST['captionTextStory'];
$caption=addslashes($caption);
$sql="INSERT INTO allstories (StoryId, StoryBy, ViewsCount, LikesCount, Caption, StoryAddress, StoryPostedOn) values ('$storyId', '$email', 0,0,'$caption', '$storyAddress', '$storyPostedOn')";
$conn->query($sql);
$sql="UPDATE useraccount set StoriesCount=StoriesCount+1 where email='$email'";
$conn->query($sql);
$conn->close();
header("location:../../index.php");
?>