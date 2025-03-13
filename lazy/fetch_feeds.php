<?php

include('../auth/check_login.php');

    $page=$_POST['page']??1;
    $limit = 4;
    $roww=($page-1)*$limit;

    $sql="select * from allposts limit $roww, $limit";
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
                    <div class="profile-picture">
                      <a href="profile.php?username=<?php echo $posterUsername; ?>"><img src='<?php echo $dpSrcPost; ?>'/></a>;
                    </div>
                    <div class="info">
                      <h3><a href="profile.php?username=<?php echo $posterUsername ?>"><?php echo $posterName ?></a></h3>
                      <small CLASS="text-muted"><?php echo $postTime ?></small>
                    </div>
                  </div>
                  <div class="edit">
                    <img src="Resources/images/threedots.png" width="25px" height="25px" padding=".5em" alt="">
                    <!--<i class="uil uil-ellipsis-h" id="excluded-item"></i>-->
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
                    
                  </div>
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
                        $likedBy=$_SESSION['email'];
                        $sql3="select * from likes where PostId='$postId' and LikedBy='$likedBy'";
                        $result3 = $conn->query($sql3);
                        $likeActive="likeActivated";
                        if (mysqli_num_rows($result3) == 1) {
                          $likeActive="likeActive";
                        }
                      ?>
                    <span class="likeButton <?php echo $likeActive ?>">
                      
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
                      
                    </span>
                    <span class="commentBox" id=commentBox> <img src="Resources/images/comment.png" width="25px" height="25px" alt="Comment">
                    <!--<span class="commentBox" id=commentBox><i class="uil uil-comment"></i>-->
                  </span>
                  <div class="commentsView" id="commentsView">
                    <div class="comments-card" >
                      <div class="head-comment">
                        <h2>Comments</h2>
                        <h4><i class="uil uil-times closeCommentBox" id="closeCommentBox"></i></h4>
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
                              $commentatorData="SELECT Fname, Lname, DPsrc, Username from useraccount where Email='$commentedBy'";
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
                    <span><img src="Resources/images/share.png" onclick="share('Check this post by <?php echo $posterFname;?>', 'feed.php?postId=<?php echo $postId;?>')" width="25px" height="25px" alt="Share"></span>
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
                    $likeSql2="select likesCount from allposts where PostId='$postId'";
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
               <?php
              }
              ?>