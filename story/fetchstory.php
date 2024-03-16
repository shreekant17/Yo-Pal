<?php
require_once('../auth/check_login.php');
$currstory=$_POST['currstory'];

$page=$_POST['page']??1;
$limit = 1;
$roww=($page-1)*$limit;

$sql="select * from allstories where StoryId != '$currstory' order by StoryPostedOn desc limit $roww, $limit";
$result=$conn->query($sql);

while($row=mysqli_fetch_assoc($result)){
    $storyId=$row['StoryId'];
    $storyAd=$row['StoryAddress'];
    $storyCa=$row['Caption'];
    $storyBy=$row['StoryBy'];
    $storyOn=$row['StoryPostedOn'];
    
    $sql2="select fname, lname, dpsrc from useraccount where email='$storyBy'";
    $res=$conn->query($sql2);
    $row2=mysqli_fetch_assoc($res);
    
    $name=$row2['fname']." ".$row2['lname'];
    $dp="../".$row2['dpsrc'];
    if($row2['dpsrc']==null){
        $dp="../Resources/images/defaultDp.jpeg";
    }

    $queryTime = "SELECT TIMESTAMPDIFF(SECOND, '$storyOn', addtime(NOW(), '0 9:30:0')) AS time_diff";
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
    <div class="story-card" id='toBeOpened'>
        <div class="profile">
            <div class="dp">
                <img src="<?php echo $dp;?>" alt="">
            </div>
            <div class="name-time">
                <p class="name"><?php echo $name;?></p>
                <p class="time"><?php echo $postTime;?></p>
            </div>
        </div>
        <div class="caption">
            <p><?php echo "this is the caption";?></p>
        </div>
        <img id="toBeOpened" src="<?php echo "../".$storyAd?>" alt="">
    </div>
    <?php
}

?>