<?php
require_once('../auth/check_login.php');
$stalker=$_SESSION['username'];
$profileusername=$_POST['userId'];
$sql="select * from friends where Follower='$stalker' and Following='$profileusername'";
$result = $conn->query($sql);
$sql2="select ADDTIME(current_timestamp,'0 9:30:0'), Email from useraccount where Username='$profileusername'";
$result2=$conn->query($sql2);
$row2 = $result2->fetch_assoc();
$ActionTo=$row2['Email'];
$ActionBy=$_SESSION['email'];
$ActionOn=$row2["ADDTIME(current_timestamp,'0 9:30:0')"];
$ActionText="Started following you";
if (mysqli_num_rows($result) == 0) {
    // Insert a new follow into the database
    $insert_query = "INSERT INTO friends VALUES ('$stalker', '$profileusername')";
    mysqli_query($conn, $insert_query);
    $insert_query2= "UPDATE useraccount set Followers = Followers+1 where Username='$profileusername'";
    mysqli_query($conn, $insert_query2);
    $insert_query3= "UPDATE useraccount set Followings = Followings+1 where Username='$stalker'";
    mysqli_query($conn, $insert_query3);
    $insert_query4= "INSERT INTO notifications (ActionTo, ActionBy, ActionOn, ActionText) Values ('$ActionTo', '$ActionBy', '$ActionOn', '$ActionText')";
    mysqli_query($conn, $insert_query4);

}
else{
    $delete_query = "DELETE FROM friends WHERE Follower='$stalker' AND Following = '$profileusername'";
    mysqli_query($conn, $delete_query);
    $delete_query2="UPDATE useraccount set Followers = Followers-1 where Username='$profileusername'";
    mysqli_query($conn, $delete_query2);
    $delete_query3="UPDATE useraccount set Followings = Followings-1 where Username='$stalker'";
    mysqli_query($conn, $delete_query3);
    $delete_query4="DELETE FROM notifications where ActionTo='$ActionTo'and ActionBy='$ActionBy' and ActionText='$ActionText'";
    mysqli_query($conn, $delete_query4);
}
?>