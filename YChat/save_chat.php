<?php
    include('../auth/check_login.php');
    require_once('../auth/check_login.php');

    $u1=$_POST['email'];
    $u2=$_POST['receiver'];
    $message=$_POST['message'];

    date_default_timezone_set('Asia/Kolkata');

    $Date = date('Y-m-d');
    $Time = date('H:i');

    if($u1<$u2){
        $cid = $u1.'-'.$u2;
    }
    else{
         $cid = $u2.'-'.$u1;
    }
    
    $save_chat="insert into chats(PairId,sender,receiver,message, date, time) values('$cid', '$u1', '$u2', '$message', '$Date','$Time')";
    $res=$conn->query($save_chat);
?>