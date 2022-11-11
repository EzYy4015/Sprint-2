<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title> Cacti Succulent Kuching </title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="script/script.js"></script>
        <link rel="stylesheet" href="style/style_visbooking.css">
    </head>
        
    <body>
        <div class="reviews_container">
            <div class="review">
                <?php
                    session_start();
                    include("connection.php");
                    date_default_timezone_set('Asia/Kuala_Lumpur');
                    $time_now=date('Y-m-d H:i:s');
                    
                    $bookingDate=$_GET['bdate'];
                    $bookingTime=$_GET['btime'];
                    $bookingID=$_GET['bID'];
                    $accID=$_GET['acID'];
                
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID";
                    $result = mysqli_query($con, $query);
                    
                    if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            if($row["accAccess"]=1){
                                echo"<div class='user'>".row["reviewCommeent"]"</div>";
                            }
                        }
                    }
            
                ?>
            </div>
        </div>
    </body>
</html>