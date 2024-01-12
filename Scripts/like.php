<?php
require_once('../auth/check_login.php');

if(isset($_SESSION["email"])){

    $postId=$_POST['PostId'];
    $likedBy=$_SESSION['email'];
    $userName=$_SESSION['username'];
    $dp=$_SESSION['DpSrc'];
    $sqltime="select ADDTIME(current_timestamp,'0 9:30:0'), PostedBy from allPosts where PostId='$postId' limit 1";
    $resulttime= $conn->query($sqltime);
    $rowtime = $resulttime->fetch_assoc();
    $ActionOn = $rowtime["ADDTIME(current_timestamp,'0 9:30:0')"];
    $PosterId=$rowtime["PostedBy"];
    $PosterName=$rowtime["Fname"];
    $ActionText="Liked your post";
    $sql="select * from likes where PostId='$postId' and LikedBy='$likedBy'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) == 0) {
            // Insert a new like into the database
            $insert_query = "INSERT INTO likes (PostId, LikedBy, Username, DPsrc) VALUES ('$postId', '$likedBy','$userName','$dp')";
            mysqli_query($conn, $insert_query);
            $insert_query2= "UPDATE allPosts set LikesCount = LikesCount+1 where PostId='$postId'";
            mysqli_query($conn, $insert_query2);
            if($likedBy!=$PosterId){
                $insert_query3= "INSERT INTO notifications (ActionTo, ActionBy, ActionOn, ActionText, PostId) Values ('$PosterId', '$likedBy', '$ActionOn', '$ActionText', '$postId')";
                mysqli_query($conn, $insert_query3);
            }
        } else {
            // Remove the like from the database
            $delete_query = "DELETE FROM likes WHERE PostId = '$postId' AND LikedBy = '$likedBy'";
            mysqli_query($conn, $delete_query);
            $delete_query2="UPDATE allPosts set LikesCount = LikesCount-1 where PostId='$postId'";
            mysqli_query($conn, $delete_query2);
            if($likedBy!=$PosterId){
                $delete_query3="DELETE from notifications where ActionTo='$PosterId' and ActionBy='$likedBy' and ActionText='$ActionText' and PostId='$postId'";
                mysqli_query($conn, $delete_query3);
            }
        }
}
?>