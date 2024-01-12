<?php  
 include('auth/check_login.php');
 require_once('auth/check_login.php');
 $postId=$_GET['postId'];
 $query="SELECT * FROM allPosts where postId='$postId'";
 $result=mysqli_query($conn,$query); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4805262983069415"
     crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
     <link rel="stylesheet" href="./search/searchstyle.css">
    
    <style>
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
                        <a href="settings/account.php" id="profileInfoActive"
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
                      >
            -->
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
            <a href="YCHat/index.php" class="menu-item messageButton" id="messages-notification">
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
        <div class="middle">

        
            <div class="feeds">
                <?php 
                $row=mysqli_fetch_assoc($result);
                    $postId=$row['PostId'];
                    $postedBy=$row['PostedBy'];
                    $sqlGetPostData="SELECT DPsrc, Fname, Lname, Username FROM userAccount where email='$postedBy'";
                    $result2=mysqli_query($conn,$sqlGetPostData);
                    $row2=mysqli_fetch_assoc($result2);
                    if($row2['DPsrc']!=NULL){
                    $dpSrcPost=$row2['DPsrc'];
                    }
                    else{
                    $dpSrcPost="Resources/images/defaultDp.jpeg";
                    }
                    $posterFname=$row2['Fname'];
                    $posterName=$row2['Fname'].' '.$row2['Lname'];
                    $postContent=$row['PostAddress'];
                    $postContentVideo=$row['VideoAddress'];
                    $postCaption=$row['Caption'];
                    $postedOn=$row['PostedOn'];
                    $posterUsername=$row2['Username'];
                    $queryTime = "SELECT TIMESTAMPDIFF(SECOND, '$postedOn', addtime(NOW(), '0 9:30:0')) AS time_diff";
                    $resultTime = mysqli_query($conn, $queryTime);
                    $rowTime = mysqli_fetch_assoc($resultTime); 
                    $time_diff = $rowTime['time_diff'];
                    if ($time_diff < 60) {
                        $postTime = $time_diff;
                        if($postTime==1){
                        $postTime=$postTime." second ago";
                        }
                        else{
                        $postTime=$postTime." seconds ago";
                        }
                    } elseif ($time_diff < 3600) {
                        $postTime = floor($time_diff / 60);
                        if($postTime==1){
                        $postTime=$postTime." minute ago";
                        }
                        else{
                        $postTime=$postTime." minutes ago";
                        }
                    } elseif ($time_diff < 86400) {
                        $postTime = floor($time_diff / 3600);
                        if($postTime==1){
                        $postTime=$postTime." hour ago";
                        }
                        else{
                        $postTime=$postTime." hours ago";
                        }
                    } elseif ($time_diff < 604800) {
                        $postTime = floor($time_diff / 86400);
                        if($postTime==1){
                        $postTime=$postTime." day ago";
                        }
                        else{
                        $postTime=$postTime." days ago";
                        }
                    } elseif ($time_diff < 2592000) {
                        $postTime = floor($time_diff / 604800);
                        if($postTime==1){
                        $postTime=$postTime." week ago";
                        }
                        else{
                        $postTime=$postTime." weeks ago";
                        }
                    } elseif ($time_diff < 31536000) {
                        $postTime = floor($time_diff / 2592000);
                        if($postTime==1){
                        $postTime=$postTime." month ago";
                        }
                        else{
                        $postTime=$postTime." months ago";
                        }
                    } else {
                        $postTime = floor($time_diff / 31536000) ;
                        if($postTime==1){
                        $postTime=$postTime." year ago";
                        }
                        else{
                        $postTime=$postTime." years ago";
                        }
                    }
                    ?>
                <div class="feed">
                    <div class="head">
                    <div class="user">
                        <div class="profile-picture">
                        <a href="profile.php?username=<?php echo $posterUsername; ?>"><img src='<?php echo $dpSrcPost; ?>'/></a>;
                        </div>
                        <div class="info">
                        <h3><a href="profile.php?username=<?php echo $posterUsername ?>"><?php echo $posterName ?></a></h3>
                        <small CLASS="text-muted"><?php echo $postTime ?></small>
                        </div>
                    </div>
                    <span class="edit">
                        <img src="Resources/images/threedots.png" width="25px" height="25px" padding=".5em" alt="">
                        <div class="postoptions">
                        <div class="options-card-menu">
                            <?php 
                            if ($postedBy==$_SESSION['email']){ ?>
                            <a href="#"><i class="uil uil-edit-alt"></i>Edit Post</a>
                            <a href="#"><i class="uil uil-image-lock"></i>Hide Post</a>
                            <form action="Scripts/UploadPost/delete_post.php" method="Post">
                                <input type="hidden", name="postId" value= "<?php echo $postId; ?>" >
                                <input type="hidden", name="postAddress" value= "<?php echo $postContent; ?>" >
                                <button type="submit"><a id="deletePostButton"><i class="uil uil-trash"></i>Delete Post</a></button>
                            </form>
                            <iframe name="invisibleFrame" style="display:none;"></iframe>
                            
                            <?php
                            }?>
                            <a onclick="share('Check this post by <?php echo $posterFname;?>', 'feed.php?postId=<?php echo $postId;?>')"><i class="uil uil-share-alt"></i>Share </a>
                            <a href='<?php if($postContent!=NULL){echo $postContent;} else if($postContentVideo!=NULL){echo $postContentVideo;} ?>' download id="savePost"><i class="uil uil-save"></i>Save </a>
                        </div>
                        </div>
                        
                    </span>
                    </div>
                    <?php if ($postContent!=NULL){?>
                    <div class="photo">
                    <img src= '<?php echo $postContent; ?>' />
                    </div>
                    <?php
                    }
                   
                else if($postContentVideo!=NULL){
                ?>
                <div class="video">
                  <video controls class="player">
                      <source src="<?php echo $postContentVideo; ?>" type="video/mp4">
                  </video>
                </div>
                <?php 
                } 
                else{
                 ?>
                 <div id="textPost">
                    <p ><?php echo $postCaption; ?></p>
                 </div>
                 <?php
                }
                ?>
                    <div class="action-buttons">
                    <div class="interaction-buttons">
                        <?php
                            $likedBy=$_SESSION['email'];
                            $sql3="select * from likes where PostId='$postId' and LikedBy='$likedBy'";
                            $result3 = $conn->query($sql3);
                            $likeActive="likeActivated";
                            if (mysqli_num_rows($result3) == 1) {
                            $likeActive="likeActive";
                            }
                        ?>
                        <label class="likeButton <?php echo $likeActive ?>">
                        
                        <form action="Scripts/like.php" method="Post" target="invisibleFrame">
                            <input type="hidden", name="postId" value= "<?php echo $postId; ?>" >
                            <button type="submit">
                            <div class="heartButton">
                                <img class="heartLike" src="Resources/images/heart.png" alt="Like">
                                <img class="heartLiked" src="Resources/images/hearted.png" alt="Liked">
                            </div>
                            </button>
                            <!--<button type="submit"><i class="uil uil-heart-sign <?php echo $likeActive ?>"></i></button>-->
                        </form>
                        <iframe name="invisibleFrame" style="display:none;"></iframe>
                        
                          </label>
                        <!--<span class="commentBox" id=commentBox> <img src="Resources/images/comment.png" width="25px" height="25px" alt="Comment">-->
                        <!--<span class="commentBox" id=commentBox><i class="uil uil-comment"></i>-->
                    </span>
                    <?php
                    $showComments="SELECT * FROM comments WHERE PostId='$postId' ORDER BY CommentedOn desc";
                                $showCommentsResult= $conn->query($showComments);
                                $commentCounts=mysqli_num_rows($showCommentsResult);
                    ?>
                    
                        <label><img src="Resources/images/share.png" onclick="share('Check this post by <?php echo $posterFname;?>', 'feed.php?postId=<?php echo $postId;?>')" width="25px" height="25px" alt="Share"></label>
                    <!--<span><i class="uil uil-share"></i></span>-->
                    <script>
                      function share(title, url) {
                        if (navigator.share) {
                          navigator.share({
                            title: title,
                            url: url
                          })
                        } else {
                          alert('Sharing is not supported in this browser.');

                        }
                      }
                    </script>
                    </div>
                    <div class="bookmark">
                        <span><i class="uil uil-bookmark"></i></span>
                    </div>
                    </div>
                    <div class="liked-by">
                  <?php 
                    $likeSql="select * from likes where PostId='$postId' limit 3";
                    $result3=mysqli_query($conn,$likeSql);
                    $likeSql2="select likesCount from allPosts where PostId='$postId'";
                    $result4=mysqli_query($conn,$likeSql2);
                    $row4=mysqli_fetch_assoc($result4);
                    $likeSql3="select Username, DPsrc from likes where PostId='$postId'";
                    $result5=mysqli_query($conn,$likeSql3);
                    
                    $likeCount=$row4['likesCount'];
                    if($likeCount!=0){
                      while($row3=mysqli_fetch_assoc($result3)){
        
                        $likedp=$row3['DPsrc'];
                        
                        $likename=$row3['Username'];
                      ?>
                        <span><img src="<?php echo $likedp; ?>" /></span>
                      <?php
                      }
                      ?>
                      <?php if($likeCount==1){?>
                          <p>
                            Liked By<b> <?php echo $likename; ?></b>
                          </p>
                        <?php
                        }
                        else{
                        ?>
                        <p >
                          Liked By <b> <?php echo $likename; ?> </b> and <b> <?php echo $likeCount-1; ?> others </b>
                        </p>
                        <?php
                        } 
                    }
                  ?>
                </div>
                <div class="LikedBy" id="likedBy">
                  <div class="LikedByCard">
                    <div class="topbar">
                      <img src="Resources/images/backButton.png" alt="" class="backButtonLikedBy">
                      <h2>Liked By</h2>
                    </div>
                    <div class="peopleLiked">
                      <?php
                        if($likeCount!=0){
                          while($row5=mysqli_fetch_assoc($result5)){
                            $likedByDp=$row5['DPsrc'];
                            $likedByName=$row5['Username'];?>
                            <div class="peopleLiked-tag">
                              <img src="<?php echo $likedByDp ?>">
                              <a href="profile.php?username=<?php echo $likedByName; ?>"><b><?php echo $likedByName ?></b></a>
                            </div>
                          <?php
                        }
                      }
                    ?>
                    </div>
                  </div>
                </div>
                    
                    <div class="caption">
                  <?php if($postCaption!=NULL and ($postContent!=NULL or $postContentVideo!=NULL)){ ?>
                    <p>
                      <a href="profile.php?username=<?php echo $posterUsername; ?>"><b><?php echo $posterFname?></a></b><?php echo ' '.$postCaption ?> <span class="hash-tag"></span>
                    </p>
                  <?php
                  }?>
                    </div>
                    <?php
                    $commentCounts=mysqli_num_rows($showCommentsResult);
                    if ($commentCounts >= 1) {?>
                        <div class="comments text-muted" id="commentBox" ><p>View all <?php echo $commentCounts; ?> comments</p></div>
                    <?php 
                    
                    }
                    ?>
                </div>
            </div>
            <div class="commentsView" id="commentsView">
                        <div class="comments-card" >
                        
                        <div class="commentContent" id='content'>
                            <?php
                                if ($commentCounts >= 1) {
                                while($rowShowComments=mysqli_fetch_assoc($showCommentsResult)){
                                $commentedBy=$rowShowComments['CommentedBy'];
                                $comment=$rowShowComments['Comment'];
                                $commentedOn=$rowShowComments['CommentedOn'];
                                $commentatorData="SELECT Fname, Lname, DPsrc, Username from userAccount where Email='$commentedBy'";
                                $commentatorDataResult=$conn->query($commentatorData);
                                $rowcommentatorData = $commentatorDataResult->fetch_assoc();
                                $commentatorName=$rowcommentatorData['Fname']." ".$rowcommentatorData['Lname'];
                                $commentatorUserName=$rowcommentatorData['Username'];
                                if($rowcommentatorData['DPsrc']!=NULL){
                                    $commentatorPic=$rowcommentatorData['DPsrc'];
                                }
                                else{
                                    $commentatorPic="Resources/images/defaultDp.jpeg";
                                }
                                $queryTime = "SELECT TIMESTAMPDIFF(SECOND, '$commentedOn', addtime(NOW(), '0 9:30:0')) AS time_diff";
                                $resultTime = mysqli_query($conn, $queryTime);
                                $rowTime = mysqli_fetch_assoc($resultTime); 
                                $time_diff = $rowTime['time_diff'];
                                if ($time_diff < 60) {
                                    $postTime = $time_diff . " s ago";
                                } elseif ($time_diff < 3600) {
                                    $postTime = floor($time_diff / 60) . " m ago";
                                } elseif ($time_diff < 86400) {
                                    $postTime = floor($time_diff / 3600) . " h ago";
                                } elseif ($time_diff < 604800) {
                                    $postTime = floor($time_diff / 86400) . " d ago";
                                } elseif ($time_diff < 2592000) {
                                    $postTime = floor($time_diff / 604800) . " w ago";
                                } elseif ($time_diff < 31536000) {
                                    $postTime = floor($time_diff / 2592000) . " mon ago";
                                } else {
                                    $postTime = floor($time_diff / 31536000) . " y ago";
                                }
                                ?>
                                <div class="commentTag">
                                    <div class="commentPic">
                                    <a href="profile.php?username=<?php echo $commentatorUserName; ?>"><img src="<?php echo $commentatorPic; ?>"></a>
                                    </div> 
                                    <div class="commentText">
                                    <div class="commentTextContent">
                                        <div class="commentatorName">
                                        <a href="profile.php?username=<?php echo $commentatorUserName; ?>"><b><p><?php echo $commentatorName; ?><p></b></a>
                                        <div class="editCommentButton">
                                            <i class="uil uil-ellipsis-h "></i> 
                                            <div class="editComment">
                                            <a>Delete</a>
                                            </div>                                       
                                        </div>
                                        </div>
                                        <p><?php echo $comment; ?></p>
                                    </div>
                                    <div class="timestamp text-muted">
                                        <p><?php echo $postTime ?></p>
                                    </div>
                                    </div>
                                </div>
                            <?php   
                                }
                            }
                            else{?>
                            <div class="nocomments">
                                <p>No Comments</p>
                            </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="writeComment">
                            <form
                            action="Scripts/comment.php"
                            method="POST"
                            id="commentForm"
                            >
                            <input type="text" name="commentInput" id="commentInput" placeholder="Write a comment"/>
                            <input type="hidden", name="postId" value= "<?php echo $postId; ?>" >
                            <button type="submit" id="commentPost"><i class="uil uil-message"></i></button>
                            </form>
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
    <script src="Scripts/feed.js?<?php echo time(); ?>"></script>
    <!------------------Profile Info-------------------->
  </body>
</html>

           