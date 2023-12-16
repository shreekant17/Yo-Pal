<?php
require_once('../auth/check_login.php');

if(isset($_POST['user_data2'])){
    $user_mail=$_POST['user_data2'];
$query_deep="select username, fname, lname, dpsrc from useraccount where email='$user_mail'";
$result_deep=$conn->query($query_deep);
$row_deep=mysqli_fetch_assoc($result_deep);
$user_email=$user_mail;
$userName = $row_deep['username'];
$user_name = $row_deep['fname']." ".$row_deep['lname'];
$dpsrc=$row_deep['dpsrc'];
if($row_deep['dpsrc']==null){
    $dpsrc="../Resources/images/defaultDp.jpeg";
}

$me=$_SESSION['email'];

?>

<div class="user-tag" id="user<?php echo $userName;?>">
    <div class="profile-picture">
        <img src="../<?php echo $dpsrc ?>" alt="dp" />
    </div>
    <div class="name-last-text" id="last-text<?php echo $userName;?>">
        <p><?php echo $user_name; ?></p>
        <!--
        <div class="last-text">
        
        <small>last-text</small>
        <p class="timestamp">timestamp</p>

        </div>
        -->
    </div>
</div>
<script>          
          $(document).ready(function(){
            $('#user<?php echo $userName;?>').click(function(){
                  var user_data = "<?php echo $user_email; ?>";
                  $.ajax({
                      url:"current_chat.php",
                      method: "POST",
                      data: {user_data : user_data},

                      success:function(data){
                        
                          if (window.innerWidth > 992) {
                            $("#ground").html("");
                            $("#container-right").html("");
                            $("#container-right").html(data);
                            $("#container-right").css("display", "flex");
                          } else {
                            $("#ground").html("");
                            $("#left").css("display", "none");
                            $("#container-right").html("");
                            $("#container-right").html(data).css("display", "flex");
                          }
                          $.ajax({
                            url:"last_chat.php",
                            method: "POST",
                            data: {user_data : user_data},

                            success:function(response){

                              $("#ground").append(response);
                            }
                          });
                        }
                      });
                });
           });

            
    </script>
    <script>
              $(document).ready(function(){
              var user1="<?php echo $me;?>";
              var user2="<?php echo $user_mail;?>";
              var usersPairId = user1 < user2 ? `${user1}-${user2}` : `${user2}-${user1}`;

                    const chatCollectionRef = db.collection("chats").doc(usersPairId);
                    last_listener = chatCollectionRef.collection("messages")
                      .orderBy("timestamp", "desc").limit(1)// Optionally, you can order the messages by a timestamp or another field
                      .onSnapshot(function (querySnapshot) {
                        querySnapshot.docChanges().forEach(function (change) {
                          if (change.type === "added" ) {
                            // A new message was added
                            var data = change.doc.data();
                            
                            var user_list = document.getElementById("user-list");
                            var user_tag = document.getElementById("user<?php echo $userName;?>");

                            var last_text_container = document.getElementById("last-text<?php echo $userName;?>");
                            var last_text = document.createElement("div");
                            last_text.setAttribute("class","last-text last-text<?php echo $userName;?>");
                            
                            
                            var p3 = document.createElement("p");
                            var small1=document.createElement("small");
                            p3.className = "timestamp";
                            var timestamp2 = data.timestamp;
                            var date2 = timestamp2.toDate();
                            var formattedTime2 = date2.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
                            p3.textContent = formattedTime2;
                            if(data.email==user1){
                              small1.textContent=("you: "+data.message);
                            }
                            else{
                              small1.textContent=(data.message);
                            }
                            $(".last-text<?php echo $userName;?>").html("");
                            last_text.appendChild(small1);
                            last_text.appendChild(p3);
                            last_text_container.appendChild(last_text);

                            user_list.insertBefore(user_tag, user_list.firstChild);
                          }
                        })
                      });
                    
                });
            
            
          </script>



<?php
}
?>