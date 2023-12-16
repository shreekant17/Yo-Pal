<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNS</title>
    <link rel="stylesheet" href="../Styles/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="middle" id="data">
        
    </div>
    <script>

        var page_no=1;
        showdata();
        $(window).scroll(function(){
            if($(window).scrollTop()+$(window).height() > $(document).height()-50){
                showdata();
            }
        });

        function showdata(){
            
            $.post("lazy/fetch_feeds.php", {page:page_no},(response)=>{
                $("#data").append(response);
                page_no++;
            });
        }

        </script>
</body>
</html>