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
    ?>
    <img id="toBeOpened" src="<?php echo "../".$storyAd?>" alt="">
    <?php
}

?>