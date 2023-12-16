<?php  
 include('auth/check_login.php');
 require_once('auth/check_login.php');
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-adsense-account" content="ca-pub-4805262983069415">

    <title>Yo!Pal</title>
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css"
    />
    <link rel="stylesheet" href="Styles/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="search/searchstyle.css?<?php echo time(); ?>" />
    <link rel="icon" href="../Resources/images/icon.png" type="image/icon type">
    <?php if(!isset($_SESSION["email"])){?><link rel="stylesheet" href="Styles/guest.css?<?php echo time(); ?>" /><?php } ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4805262983069415"
     crossorigin="anonymous"></script>
    <script>
    window.addEventListener('load', function() {
      // Code to execute when all resources have loaded (including styles and scripts)
      var websiteContent = document.getElementById('website-content');
      var LoadingContentAnimation = document.getElementById("loading_main");
      LoadingContentAnimation.style.display='none';
      websiteContent.style.display = 'block';
    });
  </script>
  
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    
    
    <style>
      .loading_main{
        width: 100vw;
        height: 100vh;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        
      }
      .loading_main img{
        width: 120px;
        height: 120px;
        margin-bottom: 6rem;
        
      }
    </style>
      <div class="loading_main" id="loading_main">
        <img id="loadingGif" src="Markup/Spin200px.gif">
      </div>

    
    <div id='website-content' style="display: none;">
      <nav>
        <div class="container">
          <span class="logo">
            <h2 class="logo1">Yo!</h2>
            <h2 class="logo2">Pal</h2>
          </span>
          <div class="searchBarConrainer">
            <div class="search-bar">
              <i class="uil uil-search"></i>
              <input type="text" Placeholder="Search" id="live_search" autocomplete="off">
              
            </div>
            <div id="search_result"></div>
            <script>
              $(document).ready(function(){
                  $("#live_search").keyup(function(){
                      var input = $(this).val();

                      if(input != ""){
                          $.ajax({
                              url:"search/livesearch.php",
                              method: "POST",
                              data: {input : input},

                              success:function(data){
                                  $("#search_result").html(data);
                                  $("#search_result").css("display","flex");
                              }
                          });
                      }
                      else{
                          $("#search_result").html("");
                          $("#search_result").css("display","none");
                      }
                  });
              });
            </script>
          </div>
          <?php
          if(!isset($_SESSION['email'])){?>

          <div class="SignUp">
            <a href="auth/signin.php">Log in</a>
            <a href="about.html">About</a>
          </div>
          <?php
          }
          ?>
          <div class="create">
            <div class="createButton">
              <button
                class="btn btn-primary createMenuButton"
                id="createMenuButton"
                for="create-post"
                onclick="openCreateMenu()"
    
              >
                Create
              </button>
              
              <i class="uil uil-plus-circle" id="createMenuButton2"></i>
              
            </div>
            <div class= "createMenu" id=createMenu>
              <div class="createMenuHolder">
                <a href="#" id='createStoryButton'><i class="uil uil-diary"></i>Story</a>
                <a href="#" id='createPostButton'><i class="uil uil-image-upload"></i>Feed</a>
              </div>
            </div>
            <div class="profile-picture">
              <?php  
                $dplocation=$_SESSION['DpSrc']; 
                echo "<img src='$dplocation'
                id='profilepic'
              />"
              ?>
              <!-------CUstomize Profile-------------------->
              <div class="customize-profile" id="customize-profile">
                <div class="customize-profile-holder">
                  <div class="profile-card">
                    <div class="picture-card">
                      <div class="profile-picture">
                        <?php
                        echo "<img src='$dplocation'
                          id='editProfilePic'
                        />"
                        ?>
                      </div>
                      <div class="username-card">
                        <a href="profile.php?username=<?php echo$_SESSION['username']; ?>" onclick="openProfileInfo()"
                          ><h4>
                            <?php echo $_SESSION['username']; ?>
                          </h4></a
                        >
                        <a href="#" id="profileInfoActive"
                          ><h6><i class="uil uil-edit"></i>edit</h6></a
                        >
                      </div>
                    </div>
                    <div class="profile-card-menu">
                      <a href="settings.php"><i class="uil uil-setting"></i>Settings</a>
                      <a href="#" id="theme"
                        ><i class="uil uil-swatchbook"></i>Display</a
                      >
                      <a href="Markup/about.html"><i class="uil uil-notes"></i>About</a>
                      
                      <a href="Scripts/LoginRegister/logout.php"
                        ><i class="uil uil-sign-out-alt"></i>Logout</a
                      >
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <!----------------------------------MAIN---------------------------------->
      <main>
        <div class="container">
          <!----------------------------------Left---------------------------------->
          <div class="left">
            <?php
            if(isset($_SESSION['email'])){ ?>
            <a class="profile" href="profile.php?username=<?php echo$_SESSION['username']; ?>" >
              <div class="profile-picture">
                <?php echo "<img src='$dplocation' />" ?>
              </div>
              <div class="handle">
                <h4><?php echo $_SESSION['name'] ?></h4>
                <p class="text-muted"><?php echo "@".$_SESSION['username'] ?></p>
              </div>
            </a>
            <?php
            }
            ?>
            <!------------------sidebar--------------------->
            <div class="sidebar">
              <a href="#" class="menu-item closeCommentByHome">
                <span><i class="uil uil-home"></i></span>
                <h3>Home</h3>
              </a>
              <a class="menu-item mobile_search"  id="mobile_search">
                  <span><i class="uil uil-search"></i></span>
                  <h3>Search</h3>
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
                      <img src="" />
                    </div>
                    <div class="notification-body">
                      <b>Keke Benjamin</b> accepted your friend request
                      <small class="text-muted">2 DAYS AGO</small>
                    </div>
                  </div>
                </div>
              </a>
              <a href="YChat/index.php" class="menu-item messageButton" id="messages-notification">
                <span
                ><i class="uil uil-envelope-alt"
                ><small class="notification-count-message">●</small></i
                ></span
                >
                
                <h3>Messeges</h3>
              </a>
              
              <a class="menu-item" href="settings.php">
                <span><i class="uil uil-setting"></i></span>
                <h3>Settings</h3>
              </a>
            </div>
            <!--------------END_of_sidebar------------------------------->
          </div>
          <!-----------------ENd_of_left----------------->
  
          <!----------------------------------Middle-------------------------------->
          <div class="middle">
            <form class="create-post" method="POST" action="Scripts/UploadPost/text_post.php" enctype="multipart/form-data">
              <div class="profile-picture">
                <?php echo "<img src='$dplocation'/>";?>
              </div>
              <input
                type="text"
                placeholder="Share your thoughts, <?php echo $_SESSION['name']?>?"
                id="create-post"
                name ="textPost"
                required
              />
              <div class="postIcon">
                <img src="Resources/images/post.png" width="20px" height="20px" id="createPostButton2" alt="">
              </div>
              <input type="submit" value="Post"  class="btn btn-primary" id="textPostButton" onclick="openCreateMenu()"/>
            </form>
            <!----------------------stories----------------->
            <div class="stories">
              <?php
              $Yourstory="select *, DPsrc, Fname from allStories, userAccount where StoryBy='$email' and allStories.StoryBy=userAccount.Email order by StoryPostedOn desc limit 1";
              $YourstoryResult=$conn->query($Yourstory);
              $checkYourStory=mysqli_num_rows($YourstoryResult);
              if ($checkYourStory!=1) {?>
                <div class="story" id="createStoryButton" style="background: url('<?php echo $dplocation; ?>') no-repeat center center/cover; justify-content: end; text-align: center;">
                <h2 class="name">Create Story<h2>
                </div>
              <?php
              }
              else{
                $YourstoryResult=mysqli_query($conn,$Yourstory);
                $YourstoryRow=mysqli_fetch_assoc($YourstoryResult);
                $yourstoryId=$YourstoryRow['StoryId'];
                $yourstoryContent=$YourstoryRow['StoryAddress'];
                $yourstoryPostedOn=$YourstoryRow['StoryPostedOn'];
                $yourstoryDpSrc=$YourstoryRow['DPsrc'];
                if($yourstoryDpSrc==NULL){
                  $yourstoryDpSrc="Resources/images/defaultDp.jpeg";
                }
                $yourstoryCaption=$YourstoryRow['Caption'];
                $yourstoryPosterName=$YourstoryRow['Fname'];
                ?>
                <div class="story" style="background: url('<?php echo $yourstoryContent; ?>') no-repeat center center/cover; justify-content: bottom">
                  <div class="profile-picture">
                    <img src="<?php echo $yourstoryDpSrc; ?>" />
                  </div>
                  <p class="name">Your Story</p>
                </div>
              <?php
              }
              
              
              $story="select StoryBy, max(StoryId), max(StoryAddress), min(StoryPostedOn), max(Fname), max(DPsrc) from allStories, userAccount where allStories.StoryBy=userAccount.Email and allStories.StoryBy!='$email' group by StoryBy order by max(StoryPostedOn) desc";
              $storyResult=mysqli_query($conn,$story);
              while($storyRow=mysqli_fetch_assoc($storyResult)){
                $storyId=$storyRow['max(StoryId)'];
                $storyContent=$storyRow['max(StoryAddress)'];
                $storyPostedOn=$storyRow['min(StoryPostedOn)'];
                $storyDpSrc=$storyRow['max(DPsrc)'];
                if($storyDpSrc==NULL){
                  $storyDpSrc="Resources/images/defaultDp.jpeg";
                }
                $storyPosterName=$storyRow['max(Fname)'];
                ?>
                <div class="story" style="background: url('<?php echo $storyContent; ?>') no-repeat center center/cover">
                  <div class="profile-picture">
                    <img src="<?php echo $storyDpSrc; ?>" />
                  </div>
                  <p class="name"><?php echo $storyPosterName; ?></p>
                </div>
              <?php
              }
              ?>
            </div>
  
            <!---------END of Stories---------------->
  
            <!--------------------Feeds--------------------->
            <div class="feeds-container" id="data">
            </div>
           
            <div class="spinner-container" id="loader">
              <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
            </div>

            <script>

            
             var page_no = 1;
             var isLoading = false;
             

            function isElementInViewport(el) {
                var rect = el.getBoundingClientRect();
                return (rect.bottom <= window.innerHeight);
            }


            function loadMoreData() {
                if (isElementInViewport(document.getElementById('data')) && !isLoading) {
                    isLoading = true;
                    $.post("fetch_feeds.php", { page: page_no }, function (response) {
                        
                        $("#data").append(response);
                        
                        page_no++;
                        isLoading = false;
                        
                    });
                }
            }
            
            
                  

            
            // Initial load
           loadMoreData();
           $("#loader").show();

            window.addEventListener('scroll', loadMoreData);

              </script>
          </div>
          
          <!-------------------------------END_of_Feeds-------------->
          <!----------------------------------Right-------------------------------->
          <div class="right">
            <div class="messages">
              <div class="heading">
                <h4>Messages</h4>
                <i class="uil uil-edit"></i>
              </div>
              <!--------------Search Bar---------------->
              <div class="search-bar">
                <i class="uil uil-search"></i>
                <input
                  type="search"
                  placeholder="Search Messages"
                  id="message-search"
                />
              </div>
              <div class="category">
                <h6 class="active">Primary</h6>
                <h6>General</h6>
                <h6 class="Messages-requests">Requests(7)</h6>
              </div>
              <!---------Message------------>
              <div class="message">
                <div class="profile-picture">
                  <img src="" />
                </div>
                <div class="message-body">
                  <h5>Edem Quist</h5>
                  <p class="text-bold">Just woke up bruh</p>
                </div>
              </div>
              <!---------Message------------>
              <div class="message">
                <div class="profile-picture">
                  <img src="" />
                  <div class="active"></div>
                </div>
                <div class="message-body">
                  <h5>Daniella Jacksion</h5>
                  <p class="text-bold">Just woke up bruh</p>
                </div>
              </div>
              <!---------Message------------>
              <div class="message">
                <div class="profile-picture">
                  <img src="" />
                  <div class="active"></div>
                </div>
                <div class="message-body">
                  <h5>Juliet Makarey</h5>
                  <p class="text-muted">Just woke up bruh</p>
                </div>
              </div>
            </div>
            <!------------------End of Messages---------------->
            <!---------------Friend Requests---------------->
            <div class="friend-requests">
              <h4>Requests</h4>
              <div class="request">
                <div class="info">
                  <div class="profile-picture">
                    <img src="" />
                  </div>
                  <div>
                    <h5>Hajia Bintu</h5>
                    <p class="text-muted">8 mutual friends</p>
                  </div>
                </div>
                <div class="action">
                  <button class="btn btn-primary">Accept</button>
                  <button class="btn">Decline</button>
                </div>
              </div>
            </div>
          </div>
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
      <div class="createPost" id="createPost">
        <div class="create-card" id="createCard">
          <h2>Create new post</h2>
          <div class="upload-option">
            <i class="uil uil-image-upload" id="imageUploadPost"></i>
            <i class="uil uil-film" id="videoUploadPost"></i>
          </div>
          <div class="uloading" style="display: none" id="uloading">
            <center><img src="Markup/spin200px.gif" alt=""></center>
            <p>Uploading please wait...</p>
          </div>
          <div class="UploadPost" id="UploadPost">
            <img src="Resources/images/uploadPost.png" id="previewPost" />
            <form action="Scripts/UploadPost/post_upload.php" id="post_upload"  method="POST" enctype="multipart/form-data">
              <label for="createUpload" id="upload_button">Upload Image</label>
              <input type="file" id="createUpload" name="createUpload" accept="image/*" onchange="previewPost(this)" />
              <div class="captionAndPost">
                <input type="text" id="captionOn" placeholder="Write a Caption" name="captionText">
                <label for="submitPost" id="postButton">Post</label>
                <input type="submit" name="createUpload" id="submitPost"/>
              </div>
            </form>
          </div>
          <div class="UploadVideoPost" id="UploadVideoPost">
            <img src="Resources/images/uploadPost.png" id="previewPostImage" />
            <video src="" id="previewVideo"></video>
            <form id="video_post_upload" action="Scripts/UploadPost/post_upload.php" method="POST" enctype="multipart/form-data">
              <label for="createUploadVideo">Upload Video</label>
              <input type="file" id="createUploadVideo" name="createUploadVideo" onchange="previewPostVideo(this)" />
              <div class="captionAndPostVideo" id="captionAndPostVideo">
                <input type="text" id="captionOnVideo" placeholder="Write a Caption" name="captionText">
                <label for="submitPostVideo" id="postButtonVideo">Post</label>
                <input type="submit" name="createUploadVideo" id="submitPostVideo"/>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <script>
        function previewPost(input) {
          var preview = document.getElementById("previewPost");
          const caption = document.querySelector("#captionOn");
          const postButton=document.querySelector("#postButton");
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            var upload_button = document.getElementById("upload_button");
            reader.onload = function (e) {
              preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
            caption.style.display="grid";
            postButton.style.display="grid";
            upload_button.textContent="Chnage Picture";
          }
        }
      </script>
      <script>
        function previewPostVideo(input) {
          var previewImage = document.getElementById("previewPostImage");
          var previewVideo=document.getElementById("previewVideo");
          const captionVideo = document.querySelector("#captionOnVideo");
          const postButtonVideo = document.querySelector("#postButtonVideo");
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              previewVideo.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
            previewImage.style.display="none";
            previewVideo.style.maxHeight="290px";
            previewVideo.style.maxWidth="290px";
            previewVideo.style.margin="1rem";
            captionVideo.style.display="grid";
            postButtonVideo.style.display="grid";
          }
        }
      </script>
      <script>
        $(document).ready(function() {
        $("#post_upload").submit(function() {
            // Show the loading GIF and disable the submit button
            $("#uloading").show();
            $("#UploadPost").css("display", "none");
            $("#createCard").css("background", "white");
            $("button[type=submit]").prop("disabled", true);
        });
        });
        $(document).ready(function() {
        $("#video_post_upload").submit(function() {
            // Show the loading GIF and disable the submit button
            $("#uloading").show();
            $("#UploadVideoPost").css("display", "none");
            $("#createCard").css("background", "white");
            $("button[type=submit]").prop("disabled", true);
        });
        });
      </script>
  
  
  <!----------Create Story -------------->
      <div class="createStory" id="createStory">
        <div class="create-card" id="createCard">
          <h2>Create new Story</h2>
          <div class="UploadPostStory">
            <img src="Resources/images/uploadPost.png" id="previewStory" />
            <form action="Scripts/UploadPost/story_upload.php" method="POST" enctype="multipart/form-data">
              <label for="createUploadStory">Upload Image</label>
              <input type="file" id="createUploadStory" name="createUploadStory" accept="image/*" onchange="previewPostStory(this)" />
              <div class="captionAndPost">
                <input type="text" id="captionOnStory" placeholder="Write a Caption" name="captionTextStory">
                <label for="submitPostStory" id="postButtonStory">Post</label>
                <input type="submit" name="createUpload" id="submitPostStory"/>
              </div>
            </form>
          </div>
        </div>
      </div>
      <script>
        function previewPostStory(input) {
          var previewStory = document.getElementById("previewStory");
          var prePostStory = document.getElementById("createUploadStory");
          var captionStory = document.querySelector("#captionOnStory");
          var postButtonStory = document.querySelector("#postButtonStory");
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              previewStory.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
            captionStory.style.display="grid";
            postButtonStory.style.display="grid";
          }
        }
      </script>
      
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
                if($notifierDP==NULL){
                    $notifierDP="Resources/images/defaultDp.jpeg";
                }
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
                $followActive="";
                $followValue="Follow";
                if(isset($_SESSION['email'])){
                  $stalker=$_SESSION['username'];
                  $checkFollow="select * from friends where Follower='$stalker' and Following='$personUsername'";
                  $resultFollow = $conn->query($checkFollow);
                  if (mysqli_num_rows($resultFollow)==1) {
                    $followActive="followActive";
                    $followValue="Remove";
                  }
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
      <div class="SearchPage">
        
        <div class="SearchCard">
          <div class="topbar">
            <img src="Resources/images/backButton.png" class="backButtonSe" alt="">
            <div class="search_bar_mobile">
              <input  type="search"  Placeholder="Search..." id="live_search2" autocomplete="off">
            </div>
          </div>
          <div class="search_result" id="search_result2"></div>
          <script>
              $(document).ready(function(){
                  $("#live_search2").keyup(function(){
                      var input = $(this).val();

                      if(input != ""){
                          $.ajax({
                              url:"search/livesearch.php",
                              method: "POST",
                              data: {input : input},

                              success:function(data){
                                  $("#search_result2").html(data);
                                  $("#search_result2").css("display","flex");
                              }
                          });
                      }
                      else{
                          $("#search_result2").css("display","none");
                      }
                  });
              });
            </script>
        </div>
      </div>
  </div>

  
    <!------------------Profile Info-------------------->
  <script src="Scripts/index.js?<?php echo time(); ?>"></script>
  </body>
</html>     



