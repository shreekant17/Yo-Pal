<?php  
 include('auth/check_login.php');
 require_once('auth/check_login.php');
 $query="SELECT * FROM allPosts order by PostedOn desc";
 $result=mysqli_query($conn,$query); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yo!Pal</title>
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css"
    />
    <link rel="stylesheet" href="Styles/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="search/searchstyle.css?<?php echo time(); ?>" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php if(!isset($_SESSION["email"])){?><link rel="stylesheet" href="Styles/guest.css?<?php echo time(); ?>" /><?php } ?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4805262983069415"
     crossorigin="anonymous"></script>
     <meta name="google-adsense-account" content="ca-pub-4805262983069415">
    <style>

      #search_result{
    display: none;
    position: absolute;
    margin-left: 4rem;
    
    background-color: white;
      }

      .profileInfo{
          display: flex;
          justify-content: center; 
      }
      
      .middle{
          display: flex;
          flex-direction: column;
      }
      .right{
          display: none;
      }
      .profileInfo .userDetails{
          display: flex;
          flex-direction: column;
          margin-left: 3em;
      }

      .profileInfo .profilePicture{
          width: 100px;
          height: 100px;
          border-radius: 50%;
          overflow: hidden;
          
          display: flex;
          align-items: center;
          justify-content: center;
      }
      .profileInfo .profilePicture img{
          width: 100%;
          height: 100%;
          object-fit: cover;
      }

      
      

      .profileInfo .followersInfo{
          display: flex;
          flex-direction: row;
          gap: 2em;
          margin-top: 1em;
      }
      .profileButtons{
          margin-top: 1rem;
      }
      .followButton5{
            color: white;
            width: 80px;
            background-color: black;
            padding-top: .6em;
            padding-bottom: .6em;
            padding-right: 1em;
            padding-left: 1em;
            border-radius: var(--card-border-radius);
            transition: all 300ms ease;
            border: 2px solid black;
            user-select: none;
            font-family: Philosopher;
                cursor: pointer;
        }

        .followButton5:hover {
            color: black;
            background-color: white;
            
        }


        .followActiveMain {
            background-color: rgb(255, 81, 81);
            border: 2px solid rgb(255, 81, 81) ;
        }
        #following{
          cursor: pointer;
          user-select: none;
        }
        #followers{
          cursor: pointer;
          user-select: none;
        }
        .followingpage {
              background: rgba(0, 0, 0, 0.13);
              width: 100%;
              height: 100%;
              position: fixed;
              top: 0;
              left: 0;
              text-align: center;
              place-items: center;
              font-size: 0.9rem;
              z-index: 100;
              display: flex;
              align-items: center;
              transform: scale(0);
              transition: all 300ms ease;
              transform-origin: center;
          }
          .following-card {
                background-color: rgba(255, 255, 255, 0.822);
                backdrop-filter: blur(10px);
                padding: 2rem;
                border-radius: var(--card-border-radius);
                box-shadow: 0 0 1rem var(--color-primary);
                width: 50%;
                height: 70%;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .following-card .topbar {
                color: black;
                position: fixed;
                top: 0;
                margin: 1em;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: right;
                padding-right: 2em;
                padding-left: 2em;
                width: 100%
            }
            .following-card .topbar img {
                width: 25px;
                height: 25px;
            }
            .following-card h2 {
                position: relative;
                width: 100%;
                left: 0;
                margin-right: 1.5em;
                user-select: none;
                }

                .following-card .backButtonFollowing {
                font-size: 25px;
                left: 0;
                cursor: pointer;
                border-radius: 50%;
                user-select: none;
                }
                .following-card .backButtonFollowing:hover {
              background-color: var(--color-light);
                }
                .following-accounts {
                    height: 100%;
                    margin-top: 3em;
                    overflow-y: scroll;
                    width: 100%;
                }
                .following-card .following-tag {
                    display: flex;
                    flex-direction: row;
                    margin-bottom: .5rem;
                    width: 100%;
                    background-color: var(--color-white);
                    padding: .5em;
                    height: fit-content;
                    border-radius: 10px;
                    justify-content: space-between;
                }
                .following-card .following-data img {
                    height: 30px;
                    width: 30px;
                    border-radius: 50%;
                    overflow: hidden;
                    transition: all 300ms ease;
                    margin-right: 1rem;
                }

                .following-card .following-data {
                    display: flex;
                    width: -webkit-fill-available;
                    cursor: pointer;
                }

                .following-card .following-data img:hover {
                    opacity: .8;
                }
                .following-card .following-name {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    align-items: flex-start;
                }
        .followerspage {
              background: rgba(0, 0, 0, 0.13);
              width: 100%;
              height: 100%;
              position: fixed;
              top: 0;
              left: 0;
              text-align: center;
              place-items: center;
              font-size: 0.9rem;
              z-index: 100;
              display: flex;
              align-items: center;
              transform: scale(0);
              transition: all 300ms ease;
              transform-origin: center;
          }
          .followers-card {
                background-color: rgba(255, 255, 255, 0.822);
                backdrop-filter: blur(10px);
                padding: 2rem;
                border-radius: var(--card-border-radius);
                box-shadow: 0 0 1rem var(--color-primary);
                width: 50%;
                height: 70%;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .followers-card .topbar {
                color: black;
                position: fixed;
                top: 0;
                margin: 1em;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: right;
                padding-right: 2em;
                padding-left: 2em;
                width: 100%
            }
            .followers-card .topbar img {
                width: 25px;
                height: 25px;
            }
            .followers-card h2 {
                position: relative;
                width: 100%;
                left: 0;
                margin-right: 1.5em;
                user-select: none;
                }

                .followers-card .backButtonFollowers {
                font-size: 25px;
                left: 0;
                cursor: pointer;
                border-radius: 50%;
                user-select: none;
                }
                .followers-card .backButtonFollowers:hover {
              background-color: var(--color-light);
                }
                .followers-accounts {
                    height: 100%;
                    margin-top: 3em;
                    overflow-y: scroll;
                    width: 100%;
                }
                .followers-card .followers-tag {
                    display: flex;
                    flex-direction: row;
                    margin-bottom: .5rem;
                    width: 100%;
                    background-color: var(--color-white);
                    padding: .5em;
                    height: fit-content;
                    border-radius: 10px;
                    justify-content: space-between;
                }
                .followers-card .followers-data img {
                    height: 30px;
                    width: 30px;
                    border-radius: 50%;
                    overflow: hidden;
                    transition: all 300ms ease;
                    margin-right: 1rem;
                }

                .followers-card .followers-data {
                    display: flex;
                    width: -webkit-fill-available;
                    cursor: pointer;
                }

                .followers-card .followers-data img:hover {
                    opacity: .8;
                }
                .followers-card .followers-name {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    align-items: flex-start;
                }
                



      @media screen and (max-width: 992px) {
        .profileInfo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: -9em;
        }
    
        .profileInfo .userDetails {
            display: flex;
            flex-direction: column;
            width:30%;
        }  
        .profileInfo .profilePicture {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
        }
        
    
        .profileInfo .followersInfo {
            display: flex;
            flex-direction: row;
            gap: 1em;
            margin-top: 1em;
        }
        .profileInfo h3{
            width: max-content;
        }
        .followButton5:hover {
            color: white;
            background-color: black   
        }
        .followActiveMain:hover {
            color: white;
            background-color: rgb(255, 81, 81);
        }
        .followingpage {
            background:white;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            text-align: center;
            place-items: center;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            z-index: 1000;
            transform: translateY(200vh);
            transition: all 500ms ease;
            transform-origin: bottom;
        }
    
        .following-card {
            background: var(--color-white);
            padding: 2rem;
            padding-left: .5em;
            padding-right: .5em;
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
            z-index: 1000;
        }
        .following-card .following-tag{
            border-radius: 0;
            cursor: pointer;
            background-color: var(--color-light);
        }
        .followerspage {
            background:white;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            text-align: center;
            place-items: center;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            z-index: 1000;
            transform: translateY(200vh);
            transition: all 500ms ease;
            transform-origin: bottom;
        }
    
        .followers-card {
            background: var(--color-white);
            padding: 2rem;
            padding-left: .5em;
            padding-right: .5em;
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
            z-index: 1000;
        }
        .followers-card .followers-tag{
            border-radius: 0;
            cursor: pointer;
            background-color: var(--color-light);
        }


      }
      </style>
      <script>
      window.addEventListener('load', function() {
      // Code to execute when all resources have loaded (including styles and scripts)
      var websiteContent = document.getElementById('website-content');
      var LoadingContentAnimation = document.getElementById("loading_main");
      LoadingContentAnimation.style.display='none';
      websiteContent.style.display = 'block';
    });
  </script>
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
        <div class="searchBarContainer">
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
            <a href="#" id='createStoryButton'><i class="uil uil-diary"></i>Story</a>
            <a href="#" id='createPostButton'><i class="uil uil-image-upload"></i>Feed</a>
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
                        <a href="./settings/account.php" id="profileInfoActive"
                          ><h6><i class="uil uil-edit"></i>edit</h6></a
                        >
                      </div>
                    </div>
                    <div class="profile-card-menu">
                      <a href="about.html"><i class="uil uil-notes"></i>About</a>
                      <a href="settings.php"><i class="uil uil-setting"></i>Settings</a>
                      <!--
                      <a href="#" id="theme"
                        ><i class="uil uil-swatchbook"></i>Display</a
                      >-->
                      
                      <a href="auth/logout.php"
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
          if(isset($_SESSION['email'])){?>
            <a href="profile.php?username=<?php echo $_SESSION['username']; ?>" class="profile">
              <div class="profile-picture">
                <?php echo "<img src='$dplocation' />" ?>
              </div>
              <div class="handle">
                <h4><?php echo $_SESSION['name'] ?></h4>
                <p class="text-muted"><?php echo "@".$_SESSION['username'] ?></p>
              </div>
            </a>
          <?php
          }?>

          <!------------------sidebar--------------------->
          <div class="sidebar">
            <a href="index.php" class="menu-item">
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
                    <img src="./images/profile-2.jpg" />
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
                <script>
                
                </script>
                <h3>Messeges</h3>
              </a>
              <?php
            if(!isset($_SESSION['email'])){?>
              <style>
                #Explore, #notifications, #messages-notification{
                  display: none;
                }
              </style>
            <?php
            }
            ?>
            <a href="settings.php" class="menu-item">
              <span><i class="uil uil-setting"></i></span>
              <h3>Settings</h3>
            </a>
          </div>
          <!--------------END_of_sidebar------------------------------->
        </div>
        <!-----------------ENd_of_left----------------->
        
        <div class="middle">

          <div class="profileInfo">
            <?php
                $profileusername=$_GET['username'];
                $queryPostCount="SELECT * from userAccount where Username='$profileusername'";
                $postCountResult=mysqli_query($conn, $queryPostCount);
                $rowPostCount=mysqli_fetch_assoc($postCountResult);
                $currPostCount=$rowPostCount['PostsCount'];
                $currFollowers=$rowPostCount['Followers'];
                $currFollowings=$rowPostCount['Followings']; 
                if($rowPostCount['DPsrc']!=NULL){
                  $profiledp=$rowPostCount['DPsrc'];
                }
                else{
                  $profiledp="Resources/images/defaultDp.jpeg";
                }
                $profileName=$rowPostCount['Fname'].' '.$rowPostCount['Lname'];
            ?>
            <div class="profilePicture">
              <img src="<?php echo $profiledp; ?>" >
            </div>
            <div class="userDetails">
              <div class="Username">
                <h3><?php echo $profileName; ?> </h3>
                <h5><?php echo $profileusername; ?> </h5>
              </div>
              <div class="followersInfo">
                <h5><?php echo $currPostCount; ?> Post</h5>
                <h5 id="followers"><?php echo $currFollowers;?> Followers</h5>
                <h5 id= "following"><?php echo $currFollowings;?> Following</h5>
              </div>
              
              <?php
              if(isset($_SESSION['email'])){
                $stalker=$_SESSION['username'];
                $checkFollow="select * from friends where Follower='$stalker' and Following='$profileusername'";
                $resultFollow = $conn->query($checkFollow);
                $followActive="";
                $followValue="Follow";
                if (mysqli_num_rows($resultFollow)==1) {
                    $followActive="followActiveMain";
                    $followValue="Remove";
                }
              }
              ?>

              <div class="profileButtons">
                <?php 
                if($stalker!=$profileusername){?>
    
                    <form action="Scripts/follow.php" method="Post" target="invisibleFrame">
                        <input type="hidden" name="userId" value= "<?php echo $profileusername; ?>" >
                        <input class="followButton5 <?php echo $followActive ?>" id="followButton" type="submit" value="<?php echo $followValue; ?>">
                    </form>
                    <iframe name="invisibleFrame" style="display:none;"></iframe>
                <?php
                }?>
              </div>
              <?php
              if(!isset($_SESSION['email'])){?>
                <style>
                  .profileButtons{
                    display: none;
                  }
                </style>
                <?php
              }?>
            </div>
          </div>
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
                    $.post("fetch/fetchProfileFeed.php", { page: page_no, profileUsername: "<?php echo $profileusername;?>" }, function (response) {
                        
                        $("#data").append(response);
                        
                        page_no++;
                        isLoading = false;
                        
                    });
                }
            }
            
           loadMoreData();
           $("#loader").show();

            window.addEventListener('scroll', loadMoreData);

          </script>
         
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
          <div class="UploadPost">
            <img src="Resources/images/uploadPost.png" id="previewPost" />
            <form action="Scripts/UploadPost/post_upload.php" method="POST" enctype="multipart/form-data">
              <label for="createUpload">Upload Image</label>
              <input type="file" id="createUpload" name="createUpload" accept="image/*" onchange="previewPost(this)" />
              <div class="captionAndPost">
                <input type="text" id="captionOn" placeholder="Write a Caption" name="captionText">
                <label for="submitPost" id="postButton">Post</label>
                <input type="submit" name="createUpload" id="submitPost"/>
              </div>
            </form>
          </div>
          <div class="UploadVideoPost">
            <img src="Resources/images/uploadPost.png" id="previewPostImage" />
            <video src="" id="previewVideo"></video>
            <form action="Scripts/UploadPost/post_upload.php" method="POST" enctype="multipart/form-data">
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
            reader.onload = function (e) {
              preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
            caption.style.display="grid";
            postButton.style.display="grid";
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
    
    <!------------------Profile Info-------------------->

    <script>
      const followButton = document.querySelector("#followButton");
      if(followButton){
        function changeFollowButton() {
          if (followButton.classList.contains("followActiveMain")) {
            followButton.classList.remove("followActiveMain");
            followButton.value = "Follow";
          }
          else {
            followButton.classList.add("followActiveMain");
            followButton.value = "Remove";
          }
        }
        followButton.addEventListener("click", changeFollowButton);
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
      <div class="SearchPage">
        <div class="SearchCard">
          <div class="topbar">
            <img src="Resources/images/backButton.png" class="backButtonSe" alt="">
            <div class="search_bar_mobile">
              <input  type="search"  Placeholder="Search..." id="live_search2" autocomplete="off">
            </div>
          </div>
          <div class="search_result" id="search_result2">
            
          </div>
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
      <div class="followerspage">
        <div class="followers-card">
          <div class="topbar">
            <img src="Resources/images/backButton.png" class="backButtonFollowers" alt="">
            <h2>Followers</h2>
          </div>
          <div class="followers-accounts">
        <?php
        $getFollowers="SELECT * from friends where following = '$profileusername'";
        $getFollowersResult=mysqli_query($conn,$getFollowers); 
        $followersCounts=mysqli_num_rows($getFollowersResult);
        if($followersCounts>0){
          while($getFollowersRow=mysqli_fetch_assoc($getFollowersResult)){
              $followerUsername=$getFollowersRow['Follower'];
              $followerData="Select Fname, Lname, Username, DPsrc from userAccount where Username='$followerUsername'";
              $followerDataResult=mysqli_query($conn,$followerData);
              $followerDataRow=mysqli_fetch_assoc($followerDataResult);
              $followerName=$followerDataRow['Fname'].' '.$followerDataRow['Lname'];
              $followerDp=$followerDataRow['DPsrc'];
              if($followerDp==NULL){
                $followerDp='Resources/images/defaultDp.jpeg';
              }
              ?>
          <div class="followers-tag">
            <div class="followers-data" onclick="goToProfile('profile.php?username=<?php echo $followerUsername;?>')">
              <img src="<?php echo $followerDp;?>" alt="">
              <div class="followers-name" >
                <h4><?php echo $followerName;?></h4>
                <h6><?php echo $followerUsername;?></h6>
              </div>
            </div>
          </div>
          <?php
          }
        }
        else{?>
          <div class="noFollowers">
            <h6>No Followers</h6>
          </div>
          <?php
        }
        ?>
        </div>
      </div>
      </div>
      <div class="followingpage">
        <div class="following-card">
          <div class="topbar">
            <img src="Resources/images/backButton.png" class="backButtonFollowing" alt="">
            <h2>Following</h2>
          </div>
          <div class="following-accounts">
        <?php
        $getFollowing="SELECT * from friends where follower = '$profileusername'";
        $getFollowingResult=mysqli_query($conn,$getFollowing); 
        $followingCounts=mysqli_num_rows($getFollowingResult);
        if($followingCounts>0){
          while($getFollowingRow=mysqli_fetch_assoc($getFollowingResult)){
              $followingUsername=$getFollowingRow['Following'];
              $followingData="Select Fname, Lname, Username, DPsrc from userAccount where Username='$followingUsername'";
              $followingDataResult=mysqli_query($conn,$followingData);
              $followingDataRow=mysqli_fetch_assoc($followingDataResult);
              $followingName=$followingDataRow['Fname'].' '.$followingDataRow['Lname'];
              $followingDp=$followingDataRow['DPsrc'];
              if($followingDp==NULL){
                $followingDp='Resources/images/defaultDp.jpeg';
              }
              ?>
          <div class="following-tag">
            <div class="following-data" onclick="goToProfile('profile.php?username=<?php echo $followingUsername;?>')">
              <img src="<?php echo $followingDp;?>" alt="">
              <div class="following-name" >
                <h4><?php echo $followingName;?></h4>
                <h6><?php echo $followingUsername;?></h6>
              </div>
            </div>
          </div>
          <?php
          }
        }
        ?>
        </div>
      </div>
</div>
      
      <script src="Scripts/profile.js?<?php echo time(); ?>"></script>

  </body>
</html>

           