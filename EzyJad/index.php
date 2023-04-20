<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent Kuching</title>
<link rel="stylesheet" type="text/css" href="style/style-index.css"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="script/script.js"></script>

</head>
<body>

    <?php include ('include/navigation.php'); ?>
    
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

            <div class="bg"></div>
        </div>

        <div class="bigcontainer-1">
            <div class="cardcontainer">
                <div class="bookingcard-row">
                    <h1> Upcoming Booking Slots </h1>
                    <div class="bookingcard-col">
                        <div class="bookingcard">
                            <p> slot 1</p>
                        </div>
                    </div>
                    <div class="bookingcard-col">
                        <div class="bookingcard">
                            <p> slot 1</p>
                        </div>
                    </div>
                    <div class="bookingcard-col">
                        <div class="bookingcard">
                            <p> slot 1</p>
                        </div>
                    </div>
                    <div class="bookingcard-col">
                        <div class="bookingcard">
                            <p> slot 1</p>
                        </div>
                    </div>
                </div>

                <div class="bookingcard-row">
                    <div class="bookingcard-col">
                        <div class="bookingcard">
                            <p> slot 1</p>
                        </div>
                    </div>
                    <div class="bookingcard-col">
                        <div class="bookingcard">
                            <p> slot 1</p>
                        </div>
                    </div>
                    <div class="bookingcard-col">
                        <div class="bookingcard">
                            <p> slot 1</p>
                        </div>
                    </div>
                    <div class="bookingcard-col">
                        <div class="bookingcard">
                            <p> slot 1</p>
                        </div>
                    </div>
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