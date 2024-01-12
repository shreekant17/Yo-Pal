<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../search/searchstyle.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="./style.css?<?php echo time(); ?>" />
    <link rel="icon" href="../Resources/images/icon.png" type="image/icon type">
    <title>Y - Chat</title>
    
  </head>
  <body>
    <?php 
      include('../auth/check_login.php');
      require_once('../auth/check_login.php');
      if(isset($_SESSION['email'])){
      $me=$_SESSION['email'];
    }
    else{
      header('Location: ../auth/signin.php');
    }
    ?>
    <script>
      let chatsLoaded=false;
    </script>
    <div class="container left" id="left">
      <div class="top">
        <a href="../">
        <div class="logo">
          <h2 class="logo1">Yo!</h2>
          <h2 class="logo2">Pal</h2>
        </div>
        </a>
        <div class="add">
          <img id="add" src="../Resources/images/useradd.png" alt="">
        </div>
        <script>
          var add = document.getElementById("add");
          add.addEventListener("click", function(){
            var search=document.getElementById("search");
            if( search.style.display=="flex"){
              search.style.display="none";
              add.src="../Resources/images/useradd.png";
            }
            else{
              search.style.display="flex";
              add.src="../Resources/images/cross.png";
            }
            
            
          });
        </script>
      </div>
      <div class="add-user">
        <div class="search" id="search">
          <input type="search" placeholder="Search to add new chat..." id="chat-search"/>
        </div>
      </div>
      <div class="search-chat-result" id="search-chat-result">
        
      </div>
          <script>
            $(document).ready(function(){
                  $("#chat-search").keyup(function(){
                      var input = $(this).val();

                      if(input != ""){
                          $("#user-list").css("display","none");
                          $.ajax({
                              url:"../search/searchtochat.php",
                              method: "POST",
                              data: {input : input},

                              success:function(data){
                                  $("#search-chat-result").html(data);
                                  $("#search-chat-result").css("display","flex");
                                  $("#user-list").css("display", "none");
                              }
                          });
                      }
                      else{
                          $("#search-chat-result").html("");
                          $("#search-chat-result").css("display","none");
                          $("#user-list").css("display","flex");
                      }
                  });
              });
              $("#chat-search").click(function(){
                
                 $("#search-chat-result").css("display","none");
                  $("#user-list").css("display","flex");
                  $("#nochats").css("display","none");
              })
            
          </script>
      <div class="user-list" id="user-list">
        <?php
       // $query_id = "SELECT DISTINCT PairId from chats where sender='$me' or receiver='$me'"; 
        $query_id = "SELECT PairId, MAX(timestamp) AS latest_timestamp FROM chats WHERE sender = '$me' OR receiver ='$me' GROUP BY pairId order by latest_timestamp desc "; 
        $result_id = $conn->query($query_id);
        //$query= "select Following from friends, chats where Follower=(select username from useraccount where email='$me')"; 
        if (mysqli_num_rows($result_id) >= 1) {
        while($row_id = mysqli_fetch_assoc($result_id)){
          $pair_id=$row_id["PairId"];
          $query_data = "select sender, receiver from chats where PairId='$pair_id' limit 1";
          $res_data = $conn->query($query_data);
          $row_data = mysqli_fetch_assoc($res_data);
          $user=$row_data['sender'];
          if($user==$me){
            $user=$row_data['receiver'];
          }
          $query_deep="select username, fname, lname, dpsrc from useraccount where email='$user'";
          $result_deep=$conn->query($query_deep);
          $row_deep=mysqli_fetch_assoc($result_deep);
          $user_email=$user;
          $userName = $row_deep['username'];
          $user_name = $row_deep['fname']." ".$row_deep['lname'];
          $dpsrc=$row_deep['dpsrc'];
          if($row_deep['dpsrc']==null){
            $dpsrc="../Resources/images/defaultDp.jpeg";
          }
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
          <script id="script<?php echo $userName;?>">
              $(document).ready(function(){

                let isFirstLoad = true;
              var user1="<?php echo $me;?>";
              var user2="<?php echo $user_email;?>";
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
                            
                            var curDate= new Date();
                            var curTime=curDate.getTime();


                            
                            var date2 = timestamp2.toDate();

                            
                            var formattedTime2 = date2.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
                            var formattedTime3 = date2.toLocaleTimeString('en-US', {
                              hour: '2-digit',
                              minute: '2-digit',
                              second: '2-digit'
                            });
                            
                            if(curDate!=date2){
                              
                              if((curDate-date2)>86400000){
                                var fetchedDate= new Date(date2);
                                var day = fetchedDate.getDate();
                                var month = fetchedDate.getMonth() + 1;
                                var year = fetchedDate.getFullYear();
                                var formattedDate = (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' + year;
                                formattedTime2=formattedDate;

                              }
                              else if((curDate-date2)<86400000){
                                var fetchedDate= new Date(date2);
                                var day = fetchedDate.getDate();
                                var month = fetchedDate.getMonth() + 1;
                                var year = fetchedDate.getFullYear();
                                var fetchedformattedDate = (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' + year;
                                
                                
                                var curDate= new Date();
                                var day = curDate.getDate();
                                var month = curDate.getMonth() + 1;
                                var year = curDate.getFullYear();
                                var currentformattedDate = (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' + year;
                                

                                if(fetchedformattedDate!=currentformattedDate){
                                  formattedTime2='Yesterday';
                                }
                              }
                              
                            }

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
                            
                            var firstChildElement = user_list.firstElementChild;
                            var pElement = firstChildElement.querySelector("p.timestamp");
                            var textContent = pElement.textContent;

                            var inputTime = textContent;

                            // Split the time into hours and minutes
                            var [time, meridian] = inputTime.split(' ');

                            // Split the hours and minutes
                            var [hours, minutes] = time.split(':');

                            // Add seconds to the time
                            var formattedTime4 = `${hours}:${minutes}:00 ${meridian}`;

                            
                              if(!isFirstLoad){

                                user_list.insertBefore(user_tag, user_list.firstChild);
                              
                              
                            }

                            var senderName="<?php echo $userName;?> ";
                            var sentMessage=data.message;
                            var profilePic="<?php echo '../'.$dpsrc;?>";
                            var iAm="<?php echo $me;?>";
                            if (!isFirstLoad && data.email!=iAm) {
                                // Send notification using your preferred method (e.g., Web Push Notifications)
                                sendNotification(senderName, sentMessage);
                              }
                              isFirstLoad = false;

                            
                          }
                        });
                      });
                });

                              function sendNotification(profileName, messageBody) {
                                if ('serviceWorker' in navigator && 'Notification' in window) {
                                  navigator.serviceWorker.ready.then((registration) => {
                                    Notification.requestPermission().then((permission) => {
                                      if (permission === 'granted') {
                                        registration.showNotification(`${profileName} sent a message:`, {
                                          body: messageBody,
                                        });
                                      }
                                    });
                                  });
                                } else if ('Notification' in window) {
                                  // Fallback for browsers that support Notification but not service workers
                                  Notification.requestPermission().then((permission) => {
                                    if (permission === 'granted') {
                                      new Notification(`${profileName} sent a message:`, {
                                        body: messageBody,
                                      });
                                    }
                                  });
                                }
                              }


          </script>

          
          <?php
        }
      }else{?>
      <center id="nochats"><h2>No Chats</h2></center>
        <?php
      }
        ?>
      </div>
    </div>
    <script>
    /*
    document.addEventListener("DOMContentLoaded", function() {
      var user_list2 = document.getElementById("user-list");
      
      user_list2.insertBefore(user_list2.lastChild, user_list2.firstChild);
      console.log("done");
    });
    */
    </script>
    <div class="container right" id="container-right">
     
       <h1>Welcome to Yo!Pal-Messenger</h1> 
       
   
      <!--
      <nav>
        
        <div class="user-info">
          <img src="../Resources/images/defaultDp.jpeg" alt="" />
          <div class="user-name-status">
            <p>name</p>
            <small>online</small>
          </div>
        </div>
    
      </nav>
      <div class="chat-ground">
        
        <div class="received-text">
          <p class="msg received">received-msg</p>
          <p class="timestamp">timestamp</p>
        </div>
        <div class="sent-text">
          <p class="msg sent">sent-msg</p>
          <p class="timestamp">timestamp</p>
        </div>
        
      </div>
      <div class="write-msg">
        <form id="data-form">
          <input
            type="text"
            placeholder="write a message..."
            id="messageInput"
          />
          <input type="hidden" name="user1" value="<?php echo $me; ?>" />
          <input type="hidden" name="user2" value="<?php echo $you; ?>" />
          <input id="send-button" type="submit" />
        </form>
      </div>
      -->
    </div>
    
    <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.7.0/firebase-firestore.js"></script>
    
    
    <!-- Add other Firebase services you need (e.g., authentication) -->

    <script type="module">
      // Import the functions you need from the SDKs you need
      import { initializeApp } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-app.js";
      import {
        doc,
        setDoc,
      } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-firestore.js";

      // TODO: Add SDKs for Firebase products that you want to use
      // https://firebase.google.com/docs/web/setup#available-libraries

      // Your web app's Firebase configuration
      /*
      const firebaseConfig = {
        apiKey: "AIzaSyCsnb39vMV3RtZ6Idn5eLM-MSj0EtNr9PA",
        authDomain: "y-chat-9a8cb.firebaseapp.com",
        projectId: "y-chat-9a8cb",
        storageBucket: "y-chat-9a8cb.appspot.com",
        messagingSenderId: "701312386297",
        appId: "1:701312386297:web:e3d613e9789d8e1b758e28",
      };

      // Initialize Firebase
      const app = initializeApp(firebaseConfig);
      */
    </script>
   
    <script type="module">
      // Import the functions you need from the SDKs you need
      import { initializeApp } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-app.js";
      import {
        doc,
        setDoc,
      } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-firestore.js";
      import { Timestamp } from "https://www.gstatic.com/firebasejs/10.5.2/firebase-firestore.js";
    </script>
    
    <script src="./index.js?<?php echo time(); ?>"></script>
    <script>
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('service-worker.js')
          .then((registration) => {
            console.log('Service Worker registered with scope:', registration.scope);
          })
          .catch((error) => {
            console.error('Service Worker registration failed:', error);
          });
      }
</script>
  </body>
</html>
