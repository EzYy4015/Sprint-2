<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent</title>
<link rel="stylesheet" type="text/css" href="style/style-index.css"/>
<link rel="stylesheet" type="text/css" href="style/style-livechat-vis.css"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="script/script.js"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="script/livechat-vis.js"></script>

</head>
<body>

    <?php 
    include ('include/navigation.php'); 
    include ('include/connection.php');
    include('include/get-details-form.php');

    if(!isset($_SESSION['userid']))
    {
        $_SESSION['userid'] = 0;
    }

    if(!isset($_SESSION['chatid']))
    {
        $_SESSION['chatid'] = 0;
    }

    $getbanner = "SELECT * FROM banners WHERE bannerVisible = '1' LIMIT 1";
    $querybanner = mysqli_query($con, $getbanner);
    $resultsbanner = mysqli_fetch_array($querybanner);
    ?>
    
    <?php include("include/live-chat.php"); ?>

    <div class="mainbody">

        <!-- Top Cover only -->
        <div class="topcover">

            <a class="login-box-button" href= <?php if ($_SESSION['loggedin'] == 0) { echo 'login.php'; } else { echo 'index.php'; } ?>>
                <div class="loginbox">
                    <div class="loginbox-img">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="loginbox-name">
                        <?php
                            if(!isset($_SESSION['name'])){
                                echo '<h1>Login</h1>';
                            }
                            else {
                                echo '<h1>'.substr($_SESSION['name'], 0, 4).'...</h1>';
                            }
                        ?>
                    </div>
                </div>
            </a>

            <div class="promo-box">
                <div class="promo-box-texts">
                    <h1>We are now accepting bookings!</h1>
                    <h2>View more details on how to book a slot by clicking the button below.</h2>
                    <a href="#" class="promo-book-button">BOOK NOW <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Banner Function -->
            <div class="bg">
                <img src="<?php echo $resultsbanner['bannerImage']; ?>">
            </div>

        </div>

        <div class="promo-container">
            <h1> Latest Promotions </h1>
            <?php 
                $getpromotions = "SELECT * FROM promotions WHERE promoVisible = '1' ORDER BY promoDateCreated ASC LIMIT 5";
                $querypromotion = mysqli_query($con, $getpromotions);

                while ($resultspromotion = mysqli_fetch_array($querypromotion)){
                    echo '
                    <div class="individual-promo-container">
                        <div class="individual-promo-section-left">
                            <img src="'?> 

                            <?php echo $resultspromotion['promoImage']; ?>
                            
                        <?php echo '">

                        </div>
                        <div class="individual-promo-section-right">
                            <h1>'?> 
                            
                            <?php echo $resultspromotion['promoTitle']; ?> 
                            
                            <?php echo'</h1>

                            <p>'?> 
                            
                            <?php echo $resultspromotion['promoDesc']; ?> 

                            <?php echo'</p>
                        </div>
                    </div>';
                }
            ?>
        </div>

        <div class="bigcontainer-1">
            <div class="cardcontainer">
                <div class="bookingcard-row">
                    <h1> Upcoming Booking Slots </h1>
                    <?php

                    $getbookingslots = "SELECT * FROM bookings WHERE bookingdate >= NOW() LIMIT 4";
                    $querybookingslots = mysqli_query($con, $getbookingslots);

                    while($resultsbookingslots = mysqli_fetch_array($querybookingslots)){
                        echo '
                        <div class="bookingcard-col">
                            <div class="bookingcard">
                                <h1 class="booking-col-date">'?> 

                                <?php echo date("l, d F", strtotime($resultsbookingslots['bookingDate'])); ?>

                                <?php echo'</h1>

                                <h1 class="booking-col-date">'?> 

                                <?php echo date("h:i a", strtotime($resultsbookingslots['bookingTime'])); ?>

                                <?php echo'</h1>
                            </div>
                        </div>
                    ';
                    }

                    ?>
                </div>
            </div>


            <div class="notifbox">
                <h1>Notifications</h1>
                <div class="notif-individual">
                   <p> notif 1 </p> 
                </div>
                <div class="notif-individual">
                   <p> notif 2 </p> 
                </div>
                <div class="notif-individual">
                   <p> notif 3 </p> 
                </div>
            </div>
        </div>

        <?php include("include/footer.php"); ?>
    </div>


    
</body>
</html>