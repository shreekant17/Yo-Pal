<?php
require_once('../auth/check_login.php');

if(isset($_POST['input'])){
    $input=$_POST['input'];

    ?>
        <?php 
        if(isset($_SESSION['email'])){
            $myUsername=$_SESSION['username'];
        }
        $getPeople="Select * from useraccount where Fname like '{$input}%' or username like '{$input}%' or Lname like '%{$input}%'";
        $getPeopleResult = mysqli_query($conn, $getPeople);
        if(mysqli_num_rows($getPeopleResult) > 0){
        ?>
            
            <div class="people-account">
                <?php
                while($getPeopleRow=mysqli_fetch_assoc($getPeopleResult)){
                if($getPeopleRow['DPsrc']==NULL){
                    $personDp="../Resources/images/defaultDp.jpeg";
                }
                else{
                    $personDp="../".$getPeopleRow['DPsrc'];
                }
                $personName=$getPeopleRow['Fname']." ".$getPeopleRow['Lname'];
                $personUsername=$getPeopleRow['Username'];
                $personEmail=$getPeopleRow['Email'];
                ?>
                <div class="id-tag">
                    <div class="id-data" id="userchat<?php echo $personUsername;?>">
                        <img src="<?php echo $personDp;?>" alt="">
                        <div class="id-name" >
                            <h4><?php echo $personName;?></h4>
                            <h6><?php echo $personUsername;?></h6>
                    </div>
                        <script>
                            $(document).ready(function(){
                                $('#userchat<?php echo $personUsername;?>').click(function(){
                                    var user_data = "<?php echo $personEmail; ?>";
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
                                            $("#search-chat-result").html("");
                                            $("#search-chat-result").css("display","none");
                                            $("#user-list").css("display","flex");
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
                                        var check_user = document.getElementById("user<?php echo $personUsername;?>");
                                        if(check_user==null){
                                            $.ajax({
                                                url: "addNewUser.php",
                                                method: "POST",
                                                data: {user_data2 : user_data},
                                                
                                                success:function(response2){
        
                                                    $("#user-list").append(response2);
                                                    console.log("sucess");
                                                }
                                            });

                                        }
                    
                                    });
                                });
                                   
                                
                        </script>
                    </div>
                </div>
            <?php
          }
          ?>
          </div>
      <?php
        }
        else{?>
        <div class="nothingFound" >
            <center>
                <h4> No users found </h4>
            </center>
        </div>
        <?php
        }
}
?>

