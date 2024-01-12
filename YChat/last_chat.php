<?php
    include('../auth/check_login.php');
    require_once('../auth/check_login.php');
    $me=$_SESSION['email'];
    $user_email = $_POST['user_data'];
    $u1=$me;
    $u2=$user_email;
    if($u1<$u2){
        $cid = $u1.'-'.$u2;
    }
    else{
         $cid = $u2.'-'.$u1;
    }
?>
    <script>
    
    
    $(document).ready(function(){
              var user1="<?php echo $me;?>";
              var user2="<?php echo $user_email;?>";

              var usersPairId = "<?php echo $cid;?>";
              /*
              var messageCollection;
    
              var chatCollection = db.collection('chats');
              chatCollection.doc(usersPairId).get()
                .then((docSnapshot) => {
                  if (docSnapshot.exists) {
                    messageCollection = docSnapshot.ref.collection('messages');
                  }
                })
                .then( async () => {
  */                if (lastChatListener) {
                        lastChatListener(); 
                    }
                    const lastchatCollectionRef = db.collection("chats").doc(usersPairId);
                    lastChatListener = lastchatCollectionRef.collection("messages")
                    .orderBy("timestamp", "desc").limit(1)// Optionally, you can order the messages by a timestamp or another field
                      .onSnapshot(function (querySnapshot) {
                        querySnapshot.docChanges().forEach(function (change) {
                          if (change.type === "added" ) {
                            // A new message was added
                            var data_last = change.doc.data();
                            
                            var sent_receive_box_last = document.createElement("div");
                            var msg_container_last = document.createElement("div");
                            var p1_last = document.createElement("p");
                            var p2_last = document.createElement("p");
                        

                            // Get the timestamp data
                            
                            var timestamp_last = data_last.timestamp;
                            var date_last = timestamp_last.toDate();
                            var formattedTime_last = date_last.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
                            p2_last.className = "timestamp";
                            p1_last.textContent = data_last.message;
                            p2_last.textContent = formattedTime_last;
                            
                            var ground = document.getElementById("ground");
                            
                            msg_container_last.appendChild(p1_last);
                            msg_container_last.appendChild(p2_last);
                            sent_receive_box_last.appendChild(msg_container_last);

                            // Assuming "ground" is the container for messages

                            if (data_last.email == user1) {
                            msg_container_last.className = "msg-content-right";
                            sent_receive_box_last.className = "sent-text";
                            p1_last.className = "sent";
                            } else {
                            msg_container_last.className = "msg-content-left";
                            sent_receive_box_last.className = "received-text";
                            p1_last.className = "received";
                            }
                            
                            ground.appendChild(sent_receive_box_last);
                            ground.scrollTop = ground.scrollHeight;
                            
                          }
                        })
                        
                      });
                    });
             // });

            </script>
            <?php
?>