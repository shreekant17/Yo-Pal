<?php
    include('../auth/check_login.php');
    require_once('../auth/check_login.php');
    $me=$_SESSION['email'];
    $user_data=$_POST['user_data'];
    if($me<$user_data){
        $userPairId = $me.'-'.$user_data;
    }
    else{
        $userPairId = $user_data.'-'.$me;
    }
    $current_user_data="select dpsrc, fname, lname, username from useraccount where email='$user_data'";
    $current_result=$conn->query($current_user_data);
    $curr_row=mysqli_fetch_assoc($current_result);
    $curr_dpsrc=$curr_row['dpsrc'];
    if($curr_row['dpsrc']==null){
        $curr_dpsrc="../Resources/images/defaultDp.jpeg";
    }
    $curr_user_name=$curr_row['fname'].' '.$curr_row['lname'];
    $curr_username=$curr_row['username'];
    ?>
    
      <nav>
        <img src="../Resources/images/left-arrow.png" id="back"></a>
                        <script>
                        var backButton = document.getElementById("back");
                        var left = document.getElementById("left");
                        var right = document.getElementById("container-right");
                        backButton.addEventListener('click', () => {
                          if(window.innerWidth<786){
                            right.style.display = "none";
                            
                          }
                          else{
                            right.innerHTML="<h1>Welcome to Yo!Pal-Messenger</h1>";
                            
                          }
                          left.style.display = "flex";
                            
                        });
                      </script>
        <div class="user-info">
            <div class="profile-picture">
                <img src="../<?php echo $curr_dpsrc; ?>" alt="" />
            </div>
            <div class="user-name-status">
            <p><?php echo $curr_user_name; ?></p>
            <small></small>
            </div>
        </div>
      </nav>
      <div class="chat-ground" id="ground">
        <?php 
        $fetch_old_chats = "select * from chats where PairId='$userPairId' and timestamp < (select max(timestamp) from chats where PairId='$userPairId')";
        $result_old_chats = $conn->query($fetch_old_chats);
        if(mysqli_num_rows($result_old_chats)>=1){
          while($row_old_chat=mysqli_fetch_assoc($result_old_chats)){
            $mes = $row_old_chat['message'];
            $sender = $row_old_chat['sender'];
            $receiver = $row_old_chat['receiver'];
            $timestampp = $row_old_chat['timestamp'];
            $SQLformattedTime = date("h:i A", strtotime($timestampp));

            if($sender==$user_data){
              ?>
              <div class="received-text">
                <div class="msg-content-left">
                  <p class="msg received"><?php echo $mes;?></p>
                  <p class="timestamp"><?php echo $SQLformattedTime;?></p>
                </div>
              </div> 
              <?php
            }
            else{?>
              <div class="sent-text">
                <div class="msg-content-right">
                  <p class="msg sent"><?php echo $mes;?></p>
                  <p class="timestamp"><?php echo $SQLformattedTime;?></p>
                </div>
              </div>
              <?php
            }
         }
        }
        ?>
        <!--
        -->
      </div>
      <div class="write-msg">
        <form id="data-form" method="POST" target="invisibleFrame">
          <input
            type="text"
            placeholder="write a message..."
            id="messageInput"
            name="message"
            required
          />
          <input type="hidden" name="u1", value="<?php echo $me;?>">
          <input type="hidden" name="u2", value="<?php echo $user_data;?>">
          <input id="send-button" type="submit" style="display : none"/>
          <label for="send-button" id="send-button-button">
            <img src="../Resources/images/send.png" alt="">
          </label>
        </form>
        <iframe name="invisibleFrame" style="display:none;"></iframe>
      </div>
    
    </div>
          
      <script>
        var form_id = document.getElementById('data-form');
        var form = document.getElementById('data-form');
        var u1 = "<?php echo $me;?>";
        var userPairId = "<?php echo $userPairId;?>";
        var messagesCollection;
        var user2 = "<?php echo $user_data;?>";

        if(messagesCollection){
          messagesCollection();
        }

        // Add an event listener for form submission
        form.addEventListener('submit', (e) => {
          //e.preventDefault(); // Prevent the default form submission
          // Get the form data
            var email = u1;
            var message =  document.getElementById('messageInput').value;
            var timestamp = firebase.firestore.Timestamp.now();

            /*
            var chatsCollection = db.collection('chats');

            // Check if the user pair document exists and get a reference to it
             chatsCollection.doc(userPairId).get()
              .then((docSnapshot) => {
                if (docSnapshot.exists) {
                  messagesCollection = docSnapshot.ref.collection('messages');
                } else {
                  // If the document doesn't exist, create it and then get the messages collection reference
                  return chatsCollection.doc(userPairId).set({});
                }
              })
              .then(  () => {
                // Now, messagesCollection is set, you can add the message
                
                  if (messagesCollection) {
                     messagesCollection.add({
                      email: email,
                      message: message,
                      timestamp: timestamp
                    });
                    form.reset();
                
                 
                }
              })
              .catch((error) => {
                console.error("Error: ", error);
              });
              */
             e.preventDefault();
             db.collection("chats")
            .doc(userPairId)
            .collection("messages")
            .add({
              email: email,
              message: message,
              timestamp: timestamp
              })
              .then(function () {
              // The Firestore data is stored, now make an AJAX request to script.php
              $.ajax({
                  type: 'POST',
                  url: 'save_chat.php',
                  data: {
                      email: email,
                      message: message,
                      receiver: user2
                  }
                  });
              });
              form.reset();
          });

        </script>
   
        

