<?php
    require_once("../auth/check_login.php");
    if(!(isset($_SESSION['email']))){
        header("location:../auth/signin.php");
    }
    $main=$_GET['sad'];
    $currstory=$_GET['sid'];
    $sql="select * from allstories where StoryId='$currstory'";
    $res=$conn->query($sql);
    $row=mysqli_fetch_assoc($res);

    $storyAd=$row['StoryAddress'];
    $storyCa=$row['Caption'];
    $storyBy=$row['StoryBy'];
    $storyOn=$row['StoryPostedOn'];

    $sql2="select fname, lname, dpsrc from useraccount where email='$storyBy'";
    $res2=$conn->query($sql2);
    $row2=mysqli_fetch_assoc($res2);
    
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Stories - Yo!Pal</title>
</head>
<body>
    <nav>
        <a href="../" style="text-decoration: none; color:black;">
            <div class="logo">
                <h3 class="logo1">Yo!</h3>
                <h3 class="logo2">Pal</h3>
            </div>
        </a>
        <div class="close">
            <a href="../"><img src="../Resources/images/cross.png" alt=""></a>
        </div>
    </nav>
    <div class="container">
        <div class="previous" id="previous">
            
        </div>
        <div class="main">
            <div class="left" style="transform: scale(0);" id="left">
                <img id="backarrow" src="left.png" alt="">
            </div>
            <div class="story" id="story">
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
                    
                    <img id="openStory" src="<?php echo "../".$storyAd;?>" alt="">
                </div>
            </div>
            <div class="right" style="transform: scale(1);" id="right">
                <img src="right.png" alt="">
            </div>
        </div>
        <div class="next"  id="next">
            <img id="toBeOpened" src="story.jpeg" alt="">
        </div>
    </div>

    <script>
    var selectedStory=$("#story").html();
    const storyAr=[selectedStory];
    var storyCount=1;   
    //initial load
    var page=1;
    var currstory="<?php echo $currstory;?>";
    function first(){
            $(document).ready(function(){
                
                
                $.ajax({
                    url:"fetchstory.php",
                    method: "POST",
                    data: {page:page, currstory:currstory},

                    success:function(data){
                        $("#next").html(data);
                        storyAr[storyCount]=data;
                        storyCount++;
                        page++;
                        console.log(storyAr);
                    }
                });
            });
        }
        first();

    $(document).ready(function(){
         $("#right").click(function(){
            $.ajax({
                url:"fetchstory.php",
                method: "POST",
                data: {page:page, currstory:currstory},
                
                success:function(data){
                        //var toBeOpened=document.getElementById("toBeOpened");
                        //var openStory=document.getElementById("openStory");
                        //var alreadySeen=document.getElementById("alreadySeen");
                        
                        //alreadySeen.style.transform="scale(1)";
                       // alreadySeen.src=openStory.src;
                       // openStory.src=toBeOpened.src;
                       // storyAd[storyCount]=toBeOpened.src;
                       // storyCount++;
                        
                       if(data!=""){
                            var backarrow=document.getElementById("left");
                            backarrow.style.transform="scale(1)";
                            storyAr[storyCount]=data;
                            storyCount++;
                            var currStory=$("#story").html();
                            $("#previous").html(currStory);
                            var nextStory=$("#next").html();
                            $("#story").html(nextStory);
                            $("#next").html(data);
                            page++;
                            console.log(storyAr);
                        }
                        if(($("#next").html()!=="")&&data==""){
                            var rightArrow=document.getElementById("right");
                            
                            rightArrow.style.transform="scale(0)";

                            var currStory=$("#story").html();
                            $("#previous").html(currStory);
                            var nextStory=$("#next").html();
                            $("#story").html(nextStory);
                            $("#next").html(data);
                        }
                }
            });
         });
    });

    var back=document.getElementById("left");
    back.addEventListener("click", function(){
            
        var toBeOpened=document.getElementById("toBeOpened");
        var openStory=document.getElementById("openStory");
        var alreadySeen=document.getElementById("alreadySeen");
        
        var seeing=$("#story").html();
        $("#next").html(seeing);


        var seen=$("#previous").html();
        $("#story").html(seen);

              

        
        
        if(storyAr.length>3){
            //alert("working");
            //alert(storyAr[storyAr.length-3])
            var rightArrow=document.getElementById("right");
                            
            rightArrow.style.transform="scale(1)";
             $("#previous").html(storyAr[storyAr.length-4]);
             page--;
             storyAr.pop();
             storyCount--;
        }
        else{
            back.style.transform="scale(0)";
            $("#previous").html("");
        }
        
        console.log(storyAr);
        //console.log(storyCount);
        

    });
   
  
    </script>
</body>
</html>