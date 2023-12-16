<?php  
 include('Scripts/LoginRegister/check_login.php');
 require_once('Scripts/LoginRegister/check_login.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4805262983069415"
     crossorigin="anonymous"></script>
     <meta name="google-adsense-account" content="ca-pub-4805262983069415">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yo!Pal</title>
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css"
    />
    <link rel="stylesheet" href="Styles/style.css?<?php echo time(); ?>" />
    <style>
    .left {
        display: none;
    }
    .profileInfo{
        display: flex;
        justify-content: center; 
    }
    .middle{
    margin-top: -1rem;
    }
      .commentsView {
        background: rgba(0, 0, 0, 0.13);
        width: 100%;
        height: fit-content;
        position: relative;
        top: 0;
        left: 0;
        text-align: center;
        place-items: center;
        font-size: 0.9rem;
        transform: none;
        display: flex;
        align-items: center;
        border-radius: 10px;
        margin-bottom: 4rem;
        z-index: 0;
        
    }
    .comments-card {
        background: var(--color-white);
        padding: 2rem;
        border-radius: 0;
        box-shadow: none;
        width: 100%;
        height: 100%;
        position: relative;
        top: 0;
        left: 0;
        transform: none;
        display: flex;
        flex-direction: column-reverse;
        justify-content: center;
        align-items: center;
        margin-top:0;
        border-radius: 10px;
        z-index: 0;
    }

    .comments-card .head-comment {
        color: black;
        position: absolute;
        top: 0;
        margin: 1em;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: right;
        padding-right: 2em;
        padding-left: 2em;
        width: 100%;
    }
    .comments-card h2 {
        position: relative;
        width: 100%;
        left: 0;
    }

    .comments-card .uil-times {
        font-size: 25px;
        right: 0;
        cursor: pointer;


    }

    .comments-card .commentContent {
        height: 100%;
        margin-top: 2em;
        overflow: hidden;
    }

    .commentTag {
        display: flex;
        flex-direction: row;
        margin-bottom: 1rem;
    }

    .commentTextContent {
        padding: .5em;
        background: var(--color-light);
        border-radius: 10px;
    }


    .commentText p {
        text-align: left;
        font-size: 10px;
    }
    .commentText .timestamp p {
        font-size: 8px;
        margin-left: 5px;
    }

    .commentPic img {
        height: 30px;
        width: 30px;

    }

    .commentPic {
        margin-right: 1em;
        padding: .5em;
    }

    .commentatorName {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    .writeComment {
        background: var(--color-light);
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        border-radius: var(--btn-padding);
        margin-top: 2em;
    }

    .writeComment form {
        background: var(--color-light);
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: .5em;
        border-radius: 4rem;
    }

    .writeComment input[type="text"] {
        background: var(--color-light);
        width: 100%;
    }
      .right{
          display: none;
      }
      .notificationspage{
        display:flex;
      }
      .content{
        display: flex;
        flex-direction: column;
        width: 100%;
        align-items: center;
        justify-content: flex-start;
      }

      .content a{
        display: flex;
        width: 100%;
        flex-direction: row;
        align-items: center;
        padding: .8em;
        justify-content: flex-start;
        background-color: white;
        font-size: 20px;
        margin: 1px;
        user-select: none;
      }
      .content a:hover{
        background-color: -var(--color-light);
      }
      .content a img{
        width: 30px;
        height: 30px;
        margin-right: .8em;
        user-select: none;
      }
      main{
        top:3.6rem;
      }
      nav .container{
        display: flex;
        justify-content: center;
      }

      @media screen and (max-width: 992px) {
        .commentsView{
            border-radius: 0;
            margin-bottom: 5rem;
            
        }
        .comments-card{
            border-radius: 0;
            margin-top: 0;
            
            
        }
        .feeds{
            margin-bottom:0;
        }
        main .container .middle{
           margin-top: -2rem;
        }
        .left{
            display: flex;
        }
        main{
        top:3.05rem;
      }
      nav .container{
        display: flex;
        justify-content: center;
      }
      }
        
      </style>
  </head>
  <nav>
      <div class="container">
        <h2>Settings</h2>
      </div>
    </nav>
  <body>
    <!----------------------------------MAIN---------------------------------->
    <main>
      <div class="container">
        <!----------------------------------Left---------------------------------->
        <div class="left">
          <a href="profile.php?username=<?php echo$_SESSION['username']; ?>" class="profile">
            <div class="profile-picture">
              <?php echo "<img src='$dplocation' />" ?>
            </div>
            <div class="handle">
              <h4><?php echo $_SESSION['name'] ?></h4>
              <p class="text-muted"><?php echo "@".$_SESSION['username'] ?></p>
            </div>
          </a>
          <!------------------sidebar--------------------->
          <div class="sidebar">
            <a href="index.php" class="menu-item">
              <span><i class="uil uil-home"></i></span>
              <h3>Home</h3>
            </a>
            <a class="menu-item" id="Explore">
              <span><i class="uil uil-compass" ></i></span>
              <h3>Explore</h3>
            </a>
            <a class="menu-item" id="notifications">
              <span
                ><i class="uil uil-bell"
                  ><small class="notification-count">●</small></i
                ></span
              >
              <h3>Notifications</h3>
              <!---------------------------Notification--------------------------->
              <div class="notification-popup">
                <div>
                  <div class="profile-picture">
                    <img src="./images/profile-2.jpg" />
                  </div>
                  <div class="notification-body">
                    <b>Keke Benjamin</b> accepted your friend request
                    <small class="text-muted">2 DAYS AGO</small>
                  </div>
                </div>
              </div>
            </a>
            <a href="YCHat/index.php" class="menu-item messageButton" id="messages-notification">
                
              <span
                ><i class="uil uil-envelope-alt"
                  ><small class="notification-count">●</small></i
                ></span
              >
              <h3>Messeges</h3>
            </a>
            
            <a class="menu-item">
              <span><i class="uil uil-setting"></i></span>
              <h3>Settings</h3>
            </a>
          </div>
          <!--------------END_of_sidebar------------------------------->
        </div>
        <!-----------------ENd_of_left----------------->
      </div>
      <div class="content">
        
        <a href=""><img src="Resources/images/accountSettings.png" alt="">Account Settings</a>
        <a href="#" id="theme"><img src="Resources/images/displaySettings.png" alt="">Display Settings</a>
        <a href=""><img src="Resources/images/privacySettings.png" alt="">Privacy Settings</a>
      </div>
    </main>

    <!------------Theme Customization------------------->
    <div class="customize-theme">
      <div class="card">
        <h2>Customize your View</h2>
        <p class="text-muted">Manage your font size, color, and Background</p>
        <!---------Font sizes------------->
        <div class="font-size">
          <h4>Font Size</h4>
          <div>
            <h6>Aa</h6>
            <div class="choose-size">
              <span class="font-size-1"></span>
              <span class="font-size-2"></span>
              <span class="font-size-3"></span>
              <span class="font-size-4"></span>
              <span class="font-size-5"></span>
            </div>
            <h3>Aa</h3>
          </div>
        </div>
        <!--------Primary Colors--------------->
        <div class="color">
          <h4>Color</h4>
          <div class="choose-color">
            <span class="color-1 active"></span>
            <span class="color-2"></span>
            <span class="color-3"></span>
            <span class="color-4"></span>
            <span class="color-5"></span>
          </div>
        </div>
        <!--------------Background Colors--------->
        <div class="background">
          <h4>Background</h4>
          <div class="choose-bg">
            <div class="bg-1 active">
              <span></span>
              <h5 for="bg-1">Light</h5>
            </div>
            <div class="bg-2">
              <span></span>
              <h5>Dim</h5>
            </div>
            <div class="bg-3">
              <span></span>
              <h5 for="bg-3">Lights Out</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-------Create Post-------------------->
    
    
    <!---------------Change DP------------------->
    <div class="changeDp" id="changeDp">
      <div class="changeDP-card" >
        <h2>Change Profile Picture</h2>
        <?php
        echo "<img id='DpPreview' src='$dplocation'>";
        ?>
        <div class="UploadDp">
          <form
            action="Scripts/DpChange/dp_upload.php"
            method="POST"
            enctype="multipart/form-data"
          >
            <label for="DpUpload">Change DP</label>
            <input type="file" name="DpUpload" id="DpUpload" accept="image/*" onchange= "previewImage(this)"/>
            <label for="submitDp">Upload</label>
            <input type="submit" id="submitDp" />
          </form>
        </div>

      </div>

    </div>
    <div class="notificationpage">
        <div class="notification-card">
          <div class="topbar">
            <img src="Resources/images/backButton.png" class="backButton" alt="">
            <h2>Notifications</h2>
          </div>
          <div class="notification-content">
            <?php
            $email=$_SESSION['email'];
            $getnot="Select * from notifications where ActionTo='$email' order by ActionOn desc";
            $resultnot= $conn->query($getnot);
            $notCounts=mysqli_num_rows($resultnot);
            if($notCounts>=1){
              while($rownot = mysqli_fetch_assoc($resultnot)){
                $notdatatext=$rownot['ActionText'];
                $notActionOn=$rownot['ActionOn'];
                $queryTime = "SELECT TIMESTAMPDIFF(SECOND, '$notActionOn', addtime(NOW(), '0 9:30:0')) AS time_diff";
                $resultTime = mysqli_query($conn, $queryTime);
                $rowTime = mysqli_fetch_assoc($resultTime); 
                $time_diff = $rowTime['time_diff'];
                if ($time_diff < 60) {
                    $actionOn = $time_diff . " s ago";
                } elseif ($time_diff < 3600) {
                    $actionOn = floor($time_diff / 60) . " m ago";
                } elseif ($time_diff < 86400) {
                    $actionOn = floor($time_diff / 3600) . " h ago";
                } elseif ($time_diff < 604800) {
                    $actionOn = floor($time_diff / 86400) . " d ago";
                } elseif ($time_diff < 2592000) {
                    $actionOn = floor($time_diff / 604800) . " w ago";
                } elseif ($time_diff < 31536000) {
                    $actionOn = floor($time_diff / 2592000) . " mon ago";
                } else {
                    $actionOn = floor($time_diff / 31536000) . " y ago";
                }
                $notActionBy=$rownot['ActionBy'];
                $notPostId=$rownot['PostId'];
                $notifierdata="SELECT Fname, DPsrc from userAccount where Email='$notActionBy'";
                $resultNotifierData=$conn->query($notifierdata);
                $rowNotifierData = $resultNotifierData->fetch_assoc();
                $notifierName=$rowNotifierData['Fname'];
                $notifierDP=$rowNotifierData['DPsrc'];
                ?>
                <div class="notification-tag">
                  <div class="notification-dp">
                    <img src="<?php echo $notifierDP; ?>" >
                  </div>
                  <div class="notification-text">
                    <div class="notification-message">
                      <div class="nameandnot">
                        <h6 class="notification-name"><p><?php echo $notifierName; ?></p></h6>
                        <p><?php echo $notdatatext; ?></p>
                      </div>
                      <?php
                      if($notPostId!=NULL){
                        $getPostSrc="SELECT PostAddress, VideoAddress from allPosts where PostId='$notPostId'";
                        $resultGetPostSrc=$conn->query($getPostSrc);
                        $rowGetPostSrc = $resultGetPostSrc->fetch_assoc();
                        $notPostSrc=$rowGetPostSrc['PostAddress'];
                        if($notPostSrc!=NULL){
                          ?>
                          <img class="notPostPic" src="<?php echo $notPostSrc; ?>" alt="">
                        <?php
                        }
                      }?>
                    </div>
                    <div class="timestamp">
                      <p class="textMuted"><?php echo $actionOn; ?></p>
                    </div>
                  </div>
                </div>
              <?php
              }
            }
            else{
              ?>
              <div class="noNotifications">
                <h6>No Notifications</h6>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
      <div class="ExplorePage">
        <?php 
        $myUsername=$_SESSION['username'];
        $getPeople="Select * from userAccount where not email='$email'";
        $getPeopleResult = mysqli_query($conn, $getPeople);
        
        ?>
        <div class="explore-card">
          <div class="topbar">
            <img src="Resources/images/backButton.png" class="backButtonEx" alt="">
            <h2>Explore People</h2>
          </div>
          <div class="people-account">
            <?php
            while($getPeopleRow=mysqli_fetch_assoc($getPeopleResult)){
              $personDp=$getPeopleRow['DPsrc'];
              if($personDp==NULL){
                $personDp="Resources/images/defaultDp.jpeg";
              }
              $personName=$getPeopleRow['Fname']." ".$getPeopleRow['Lname'];
              $personUsername=$getPeopleRow['Username'];
              ?>
            <div class="id-tag">
              <div class="id-data"  onclick="goToProfile('profile.php?username=<?php echo $personUsername;?>')">
                <img src="<?php echo $personDp;?>" alt="">
                <div class="id-name" >
                  <h4><?php echo $personName;?></h4>
                  <h6><?php echo $personUsername;?></h6>
                </div>
                <script>
                  function goToProfile(url){
                    window.location.href=url;
                  }
                </script>
              </div>
              <?php
                $stalker=$_SESSION['username'];
                $checkFollow="select * from friends where Follower='$stalker' and Following='$personUsername'";
                $resultFollow = $conn->query($checkFollow);
                $followActive="";
                $followValue="Follow";
                if (mysqli_num_rows($resultFollow)==1) {
                  $followActive="followActive";
                  $followValue="Remove";
                }
                ?>
              <div class="follow">
                <?php 
                if($stalker!=$personUsername){?>
                    <form action="Scripts/follow.php" method="Post" target="invisibleFrame">
                      <input type="hidden" name="userId" value= "<?php echo $personUsername; ?>" >
                      <input class="followButton <?php echo $followActive ?>"  type="submit" value="<?php echo $followValue; ?>">
                    </form>
                    <iframe name="invisibleFrame" style="display:none;"></iframe>
                    <?php
                }?>
              </div>
            </div>
              
            <?php
          }
          ?>
          </div>
        </div>
      </div>
   <script>
      function previewImage(input) {
        var preview = document.getElementById("DpPreview");
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            preview.src = e.target.result;
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>
    <div class="notificationpage">
        <div class="notification-card">
          <div class="topbar">
            <img src="Resources/images/backButton.png" class="backButton" alt="">
            <h2>Notifications</h2>
          </div>
          <div class="notification-content">
            <?php
            $email=$_SESSION['email'];
            $getnot="Select * from notifications where ActionTo='$email' order by ActionOn desc";
            $resultnot= $conn->query($getnot);
            $notCounts=mysqli_num_rows($resultnot);
            if($notCounts>=1){
              while($rownot = mysqli_fetch_assoc($resultnot)){
                $notdatatext=$rownot['ActionText'];
                $notActionOn=$rownot['ActionOn'];
                $queryTime = "SELECT TIMESTAMPDIFF(SECOND, '$notActionOn', addtime(NOW(), '0 9:30:0')) AS time_diff";
                $resultTime = mysqli_query($conn, $queryTime);
                $rowTime = mysqli_fetch_assoc($resultTime); 
                $time_diff = $rowTime['time_diff'];
                if ($time_diff < 60) {
                    $actionOn = $time_diff . " s ago";
                } elseif ($time_diff < 3600) {
                    $actionOn = floor($time_diff / 60) . " m ago";
                } elseif ($time_diff < 86400) {
                    $actionOn = floor($time_diff / 3600) . " h ago";
                } elseif ($time_diff < 604800) {
                    $actionOn = floor($time_diff / 86400) . " d ago";
                } elseif ($time_diff < 2592000) {
                    $actionOn = floor($time_diff / 604800) . " w ago";
                } elseif ($time_diff < 31536000) {
                    $actionOn = floor($time_diff / 2592000) . " mon ago";
                } else {
                    $actionOn = floor($time_diff / 31536000) . " y ago";
                }
                $notActionBy=$rownot['ActionBy'];
                $notPostId=$rownot['PostId'];
                $notifierdata="SELECT Fname, DPsrc from userAccount where Email='$notActionBy'";
                $resultNotifierData=$conn->query($notifierdata);
                $rowNotifierData = $resultNotifierData->fetch_assoc();
                $notifierName=$rowNotifierData['Fname'];
                $notifierDP=$rowNotifierData['DPsrc'];
                ?>
                <div class="notification-tag">
                  <div class="notification-dp">
                    <img src="<?php echo $notifierDP; ?>" >
                  </div>
                  <div class="notification-text">
                    <div class="notification-message">
                      <div class="nameandnot">
                        <h6 class="notification-name"><p><?php echo $notifierName; ?></p></h6>
                        <p><?php echo $notdatatext; ?></p>
                      </div>
                      <?php
                      if($notPostId!=NULL){
                        $getPostSrc="SELECT PostAddress, VideoAddress from allPosts where PostId='$notPostId'";
                        $resultGetPostSrc=$conn->query($getPostSrc);
                        $rowGetPostSrc = $resultGetPostSrc->fetch_assoc();
                        $notPostSrc=$rowGetPostSrc['PostAddress'];
                        if($notPostSrc!=NULL){
                          ?>
                          <img class="notPostPic" src="<?php echo $notPostSrc; ?>" alt="">
                        <?php
                        }
                      }?>
                    </div>
                    <div class="timestamp">
                      <p class="textMuted"><?php echo $actionOn; ?></p>
                    </div>
                  </div>
                </div>
              <?php
              }
            }
            else{
              ?>
              <div class="noNotifications">
                <h6>No Notifications</h6>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
      <div class="ExplorePage">
        <?php 
        $myUsername=$_SESSION['username'];
        $getPeople="Select * from userAccount where not email='$email'";
        $getPeopleResult = mysqli_query($conn, $getPeople);
        
        ?>
        <div class="explore-card">
          <div class="topbar">
            <img src="Resources/images/backButton.png" class="backButtonEx" alt="">
            <h2>Explore People</h2>
          </div>
          <div class="people-account">
            <?php
            while($getPeopleRow=mysqli_fetch_assoc($getPeopleResult)){
              $personDp=$getPeopleRow['DPsrc'];
              if($personDp==NULL){
                $personDp="Resources/images/defaultDp.jpeg";
              }
              $personName=$getPeopleRow['Fname']." ".$getPeopleRow['Lname'];
              $personUsername=$getPeopleRow['Username'];
              ?>
            <div class="id-tag">
              <div class="id-data"  onclick="goToProfile('profile.php?username=<?php echo $personUsername;?>')">
                <img src="<?php echo $personDp;?>" alt="">
                <div class="id-name" >
                  <h4><?php echo $personName;?></h4>
                  <h6><?php echo $personUsername;?></h6>
                </div>
                <script>
                  function goToProfile(url){
                    window.location.href=url;
                  }
                </script>
              </div>
              <?php
                $stalker=$_SESSION['username'];
                $checkFollow="select * from friends where Follower='$stalker' and Following='$personUsername'";
                $resultFollow = $conn->query($checkFollow);
                $followActive="";
                $followValue="Follow";
                if (mysqli_num_rows($resultFollow)==1) {
                  $followActive="followActive";
                  $followValue="Remove";
                }
                ?>
              <div class="follow">
                <?php 
                if($stalker!=$personUsername){?>
                    <form action="Scripts/follow.php" method="Post" target="invisibleFrame">
                      <input type="hidden" name="userId" value= "<?php echo $personUsername; ?>" >
                      <input class="followButton <?php echo $followActive ?>" type="submit" value="<?php echo $followValue; ?>">
                    </form>
                    <iframe name="invisibleFrame" style="display:none;"></iframe>
                    <?php
                }?>
              </div>
            </div>
              
            <?php
          }
          ?>
          </div>
        </div>
      </div>
    <script src="Scripts/settings.js?<?php echo time(); ?>"></script>
    <!------------------Profile Info-------------------->
  </body>
</html>

           