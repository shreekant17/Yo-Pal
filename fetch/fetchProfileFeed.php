<?php

include('../auth/check_login.php');
    $profileusername=$_POST["profileUsername"];
    $page=$_POST['page']??1;
    $limit = 5;
    $roww=($page-1)*$limit;

    $sql="SELECT * FROM allPosts, userAccount where userAccount.username='$profileusername' and allPosts.PostedBy=userAccount.Email order by PostedOn desc limit $roww, $limit";
    $result=mysqli_query($conn, $sql); 
?>
    <div class="feeds">
      <?php
              while($row=mysqli_fetch_assoc($result))
              {
                $postId=$row['PostId'];
                $postedBy=$row['PostedBy'];
                $sqlGetPostData="SELECT DPsrc, Fname, Lname, Username FROM useraccount where email='$postedBy'";
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
                <div class="head" >
                  <div class="user" onclick="goToLink('feed.php?postId=<?php echo $postId; ?>')">
                    <div class="profile-picture-post">
                      <a href="profile.php?username=<?php echo $posterUsername; ?>"><img src='<?php echo $dpSrcPost; ?>'/></a>;
                    </div>
                    <div class="info">
                      <h3><a href="profile.php?username=<?php echo $posterUsername ?>"><?php echo $posterName ?></a></h3>
                      <small CLASS="text-muted"><?php echo $postTime ?></small>
                    </div>
                  </div>
                  <div class="edit" id="edit<?php echo $postId; ?>">
                    <img src="Resources/images/threedots.png" width="25px" height="25px" padding=".5em" alt="">
                    <!--<i class="uil uil-ellipsis-h" id="excluded-item"></i>-->
                    <div class="postoptions" id="postoptions<?php echo $postId; ?>">
                      <div class="options-card-menu">
                        <?php 
                        if(isset($_SESSION['email'])){
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
                        }
                        }?>
                        <a onclick="share('Check this post by <?php echo $posterFname;?>', 'feed.php?postId=<?php echo $postId;?>')"><i class="uil uil-share-alt"></i>Share </a>
                        <a href='<?php if($postContent!=NULL){echo $postContent;} else if($postContentVideo!=NULL){echo $postContentVideo;} ?>' download id="savePost"><i class="uil uil-save"></i>Save </a>
                      </div>
                    </div>
                    
                  </div>
                  <!--------------------------Edit Menu JS--------------------->
                  <script>
                     $(document).ready(function() {
                        var editPostButton = document.getElementById("edit<?php echo $postId; ?>");
                        var editPost = document.getElementById("postoptions<?php echo $postId; ?>");
                        
                        // Attach a click event handler
                        $(editPostButton).on('click', function() {
                          if ($(this).hasClass("active")) {
                            $(this).removeClass("active");
                          } else {
                            $(this).addClass("active");
                          }
                        });
                        editPostButton.addEventListener('touchstart', () => {
                          editPostButton.style.transition = "all 0ms ease";
                          editPostButton.style.backgroundColor="hsl(252, 30%, 95%)";
                        });
                        editPostButton.addEventListener('touchend', () => {
                            editPostButton.style.backgroundColor = "initial";
                            editPostButton.style.transition="all 300ms ease"
                        });
                        document.addEventListener("click", function(event) {
                          // Check if the click event occurred inside the editPost element
                          if (!editPost.contains(event.target)) {
                            // Check if the event target is the editPostButton
                            if (editPostButton === event.target || editPostButton.contains(event.target)) {
                              return;
                            }
                            // If not, remove the "active" class from the editPostButton
                            editPostButton.classList.remove("active");
                          }
                        });
                      });


                  </script>
                  <!----------------------------------------------------------->
                </div>
                <script>
                  function goToLink(url){
                    window.location.href=url;
                  }
                </script>
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
                    $likeActive="likeActivated";
                    if(isset($_SESSION['email'])){
                      $likedBy=$_SESSION['email'];
                      $sql3="select * from likes where PostId='$postId' and LikedBy='$likedBy'";
                      $result3 = $conn->query($sql3);
                      if (mysqli_num_rows($result3) == 1) {
                        $likeActive="likeActive";
                      }
                    }
                      ?>
                    <label class="likeButton <?php echo $likeActive ?> like<?php echo $postId; ?>" id="like<?php echo $postId; ?>" for="likesubmit<?php echo $postId; ?>">
                      
                      <form method="Post" target="invisibleFrame" id="formlike<?php echo $postId; ?>">
                        <input type="hidden", name="postId" value= "<?php echo $postId; ?>" >
                        <button type="submit" id="likesubmit<?php echo $postId; ?>">
                          <div class="heartButton">
                            <img class="heartLike" src="Resources/images/heart.png" alt="Like">
                            <img class="heartLiked" src="Resources/images/hearted.png" alt="Liked">
                          </div>
                        </button>
                      </form>
                      <iframe name="invisibleFrame" style="display:none;"></iframe>
                      
                  </label>
                    <!---------------LIKE JAVASCRIPT---------------------->
                    <script>
                       $(document).ready(function() {
                        var likeButton = document.getElementById("like<?php echo $postId; ?>");
                        
                        // Attach a click event handler
                        $(likeButton).on('click', function() {
                          if ($(this).hasClass("likeActive")) {
                            $(this).removeClass("likeActive");
                          } else {
                            $(this).addClass("likeActive");
                          }
                        });
                        likeButton.addEventListener('touchstart', () => {
                          likeButton.style.transition = "all 0ms ease";
                          likeButton.style.backgroundColor="hsl(252, 30%, 95%)";
                        });
                        likeButton.addEventListener('touchend', () => {
                            likeButton.style.backgroundColor = "initial";
                            likeButton.style.transition="all 300ms ease"
                        });
                      });
                      </script>
                      <!------------------------------------------------->
                    <label class="commentBox" id="comment<?php echo $postId; ?>"> <img src="Resources/images/comment.png" width="25px" height="25px" alt="Comment">
                    <!--<span class="commentBox" id=commentBox><i class="uil uil-comment"></i>-->
                    </label>
                  <div class="commentsView" id="commentsView<?php echo $postId;?>">
                    <div class="comments-card" >
                      <div class="head-comment">
                        <h2>Comments</h2>
                        <h4><i class="uil uil-times closeCommentBox" id="closeCommentBox<?php echo $postId;?>"></i></h4>
                      </div>
                      <div class="commentContent" id='content'>
                        <?php
                            $showComments="SELECT * FROM comments WHERE PostId='$postId' ORDER BY CommentedOn desc";
                            $showCommentsResult= $conn->query($showComments);
                            $commentCounts=mysqli_num_rows($showCommentsResult);
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
                                         <!----<div class="editComment">
                                          <a>Delete</a>
                                         </div>      --->                                 
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

                  <!----------------Comments PAGE JS----------------------->
                  <script>
                   
                  $(document).ready(function() {
                  var CommentBoxButton = document.getElementById("comment<?php echo $postId; ?>");
                  var commentsView=document.getElementById("commentsView<?php echo $postId; ?>");
                  var closeCommentBoxButton = document.getElementById("closeCommentBox<?php echo $postId; ?>");

                        // Attach a click event handler to CommentBoxButton
                        CommentBoxButton.addEventListener('click', function() {
                            if (window.innerWidth > 992) {
                                commentsView.style.transition = 'all 300ms ease';
                                commentsView.style.transform = 'scale(1)';
                                document.body.style.overflow = 'hidden';
                            } else {
                                commentsView.style.transition = 'all 500ms ease';
                                commentsView.style.transform = 'translateY(0)';
                                document.body.style.overflow = 'hidden';
                            }
                        });
                        closeCommentBoxButton.addEventListener('click', function() {
                            if (window.innerWidth > 992) {
                                commentsView.style.transition = 'all 300ms ease';
                                commentsView.style.transform = 'scale(0)';
                                document.body.style.overflow = 'auto';
                            } else {
                                commentsView.style.transition = 'all 800ms ease';
                                commentsView.style.transform = 'translateY(200vh)';
                                document.body.style.overflow = 'auto';
                            }
                        });
                        CommentBoxButton.addEventListener('touchstart', () => {
                          CommentBoxButton.style.transition = "all 0ms ease";
                          CommentBoxButton.style.backgroundColor="hsl(252, 30%, 95%)";
                        });
                        CommentBoxButton.addEventListener('touchend', () => {
                            CommentBoxButton.style.backgroundColor = "initial";
                            CommentBoxButton.style.transition="all 300ms ease"
                        });

                    });
                  </script>
                  <!------------------------------------------------------->
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
                <div class="liked-by" id="liked-by<?php echo $postId; ?>">
                    <script>
                      $(document).ready(function(){
                        //var likeButtonBy=document.getElementById("like<?php echo $postId; ?>");
                        var formLike=document.getElementById("formlike<?php echo $postId; ?>");
                        formLike.addEventListener("submit", (e)=>{
                          e.preventDefault();
                          $.ajax({
                            url: "Scripts/like.php",
                            method: "POST",
                            data: {PostId : "<?php echo $postId;?>"},
                          })
                          .then(function () {
                          $.ajax({
                            url: "fetch/fetch_likes.php",
                            method: "POST",
                            data: {PostId : "<?php echo $postId;?>"},

                            success:function(response){
                              $(document.getElementById("liked-by<?php echo $postId; ?>")).html(response);
                            }
                          });
                        });
                        });
                      });
                    </script>
                  <?php 
                  
                    $likeSql="select * from likes where PostId='$postId' limit 3";
                    $result3=mysqli_query($conn,$likeSql);
                    $likeSql2="select likesCount from allPosts where PostId='$postId'";
                    $result4=mysqli_query($conn,$likeSql2);
                    $row4=mysqli_fetch_assoc($result4);
                    $likeSql3="select Username, DPsrc from likes where PostId='$postId'";
                    $result7=mysqli_query($conn,$likeSql3);
                    
                    $likeCount=$row4['likesCount'];
                    if($likeCount!=0){
                      while($row3=mysqli_fetch_assoc($result3)){
        
                        $likedp=$row3['DPsrc'];
                        
                        $likename=$row3['Username'];
                      ?>
                        <span ><img src="<?php echo $likedp; ?>" /></span>
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
                <div class="LikedBy" id="LikedBy<?php echo $postId; ?>">
                  <div class="LikedByCard">
                    <div class="topbar">
                      <img src="Resources/images/backButton.png" alt="" class="backButtonLikedBy" id="backButtonLikedBy<?php echo $postId; ?>">
                      <h2>Liked By</h2>
                    </div>
                    <div class="peopleLiked" id="peopleLiked<?php echo $postId; ?>">
                      
                    </div>
                  </div>
                </div>
                <!----------------------------LIKED BY CARD-------------------------->
                <script>
                  $(document).ready(function() {
                  var likedByButton = document.getElementById("liked-by<?php echo $postId; ?>");
                  var likedBy = document.getElementById("LikedBy<?php echo $postId; ?>");
                  var backButtonLikedBy = document.getElementById("backButtonLikedBy<?php echo $postId; ?>");

                  likedByButton.addEventListener('click', () => {
                    // Display the likedBy element
                    if (window.innerWidth > 992) {
                      likedBy.style.transition = 'all 300ms ease';
                      likedBy.style.transform = 'scale(1)';
                      document.body.style.overflow = 'hidden';
                    } else {
                      likedBy.style.transition = 'all 500ms ease';
                      likedBy.style.transform = 'translateY(0)';
                      document.body.style.overflow = 'hidden';
                    }
                    $.ajax({
                          url: "fetch/fetch_likers.php",
                          method: "POST",
                          data: {PostId : "<?php echo $postId;?>"},

                          success:function(response2){
                            $(document.getElementById("peopleLiked<?php echo $postId; ?>")).html(response2);
                          }
                        });
                    });
                
                  

                  backButtonLikedBy.addEventListener('click', () => {
                    // Hide the likedBy element
                    if (window.innerWidth > 992) {
                      likedBy.style.transition = 'all 300ms ease';
                      likedBy.style.transform = 'scale(0)';
                      document.body.style.overflow = 'auto';
                    } else {
                      likedBy.style.transition = 'all 800ms ease';
                      likedBy.style.transform = 'translateY(200vh)';
                      document.body.style.overflow = 'auto';
                    }
                  });
                  });

                </script>
                <!------------------------------------------------------------------->
                
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
                    <div class="comments text-muted" id="comment2<?php echo $postId; ?>" ><p>View all <?php echo $commentCounts; ?> comments</p></div>
                    <!-----------------CommentButton2----------------------------->

                  <script>

                    $(document).ready(function() {
                    var CommentBoxButton = document.getElementById("comment2<?php echo $postId; ?>");
                    var commentsView=document.getElementById("commentsView<?php echo $postId; ?>");

                          // Attach a click event handler to CommentBoxButton
                          CommentBoxButton.addEventListener('click', function() {
                              if (window.innerWidth > 992) {
                                  commentsView.style.transition = 'all 300ms ease';
                                  commentsView.style.transform = 'scale(1)';
                                  document.body.style.overflow = 'hidden';
                              } else {
                                  commentsView.style.transition = 'all 500ms ease';
                                  commentsView.style.transform = 'translateY(0)';
                                  document.body.style.overflow = 'hidden';
                              }
                          });
                    });
                  </script>

                    <!------------------------------------------------------------->
                  <?php 
                   
                  }
                  ?>
              </div>
              

               <?php
              }
              ?>
    </div>
    <!---
    <div class="feeds">
      <div class="feed">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4805262983069415"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-format="fluid"
            data-ad-layout-key="-6t+ed+2i-1n-4w"
            data-ad-client="ca-pub-4805262983069415"
            data-ad-slot="5538420680"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
      </div>
    </div>

    --->
              