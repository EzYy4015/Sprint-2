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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="script/livechat-vis.js"></script>

</head>
<body>

    <?php 
    include ('include/navigation.php'); 
    include ('include/connection.php');

    if(!isset($_SESSION['userid']))
    {
        $_SESSION['userid'] = 0;
    }

    $getbanner = "SELECT * FROM banners WHERE bannerVisible = '1' LIMIT 1";
    $querybanner = mysqli_query($con, $getbanner);
    $resultsbanner = mysqli_fetch_array($querybanner);
    ?>
    
    <div id="chat-callout" class="callout">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">×</span>
        <div class="callout-container">
            <p>Do you require further support? Chat with us today!</p>
        </div>
    </div>

    <div id="chat-box" class="chat-box">
        <div class="chat-box-close-button">
            <div class="chat-box-close-button-left">
                <p> Live Chat Support </p>
            </div>
            <div class="chat-box-close-button-right">
                <span onclick="closeChat()"><i class="fa fa-window-close" aria-hidden="true"></i></span>
            </div>
        </div>

        <p id="success-text"><i>You have successfully connected with an agent... Say hello!</i></p>
        <!-- Main Content of Messaging -->
        <div id="admin-icon" class="chat-box-adm-icon">
            <i class='fas fa-headset'></i>
        </div>
        <div id="faq-intro" class="chat-container-admin-intro">
            <div class="chat-message-admin">
                <p>Hello! How may we help you? Below are the most frequently asked questions (FAQs), </p>
            </div>
            <div class="chat-message-admin">
                <a href="#" onclick="openFAQ1()"><p>1. How do I check my bookings?</p></a>
                <a href="#" onclick="openFAQ2()"><p>2. I want to stop receiving notifications!</p></a>
                <a href="#" onclick="connectAgent(<?php echo $_SESSION['loggedin']; ?>)"><p>I want to talk to a live agent instead.</p></a>
            </div>
        </div>


        
        <div id="faq-faq1" class="chat-container-admin-intro">
            <span onclick="mainFAQ()"><i class="fa fa-arrow-left" aria-hidden="true"> Back</i></span>
            <div class="chat-message-admin">
                <p>To check your bookings, you may check it <a href="#"> here </a> </p>
            </div>
            <div class="chat-message-admin">
                <p>Doesn't help? Try contacting one of our live agents!</p>
            </div>
        </div>



        <div id="faq-faq2" class="chat-container-admin-intro">
            <span onclick="mainFAQ()"><i class="fa fa-arrow-left" aria-hidden="true"> Back</i></span>
            <div class="chat-message-admin">
                <p>To stop receiving notifications, disable it from your profile settings. </p>
            </div>
            <div class="chat-message-admin">
                <p>Doesn't help? Try contacting one of our live agents!</p>
            </div>
        </div>





        <div id="connect-chat" class="chat-container-admin-intro">
            <div class="chat-message-admin">
                <p>Attempting to connect you with an agent...</p>
            </div>
        </div>
        


        <p id="form-fill-text"><i>Since you are not logged in, complete this form to chat with an agent.</i></p>
        <p id="outside-working-hours"><i>The chat is currently outside its working hours. Alternatively, you may submit this form or wait for our working hours. <br/>(9AM - 5PM)</i></p>
        <div id="show-form" class="form-live-chat">
            <form name="submit-inquiry" id="submit-inquiry" method="POST">
                <table>
                    <tr>
                        <th><label for="name">Name: </label></th>
                    </tr>   

                    <tr>
                        <td><input name="name" id="name" type="text"></td>
                    </tr>
                    <tr>
                        <th><label for="email">Email: </label></th>
                    </tr>   

                    <tr>
                        <td><input name="email" id="email" type="email"></td>
                    </tr>

                    <tr>
                        <th><label for="phone-no">Phone Number: </label></th>
                    </tr>   

                    <tr>
                        <td><input name="phone-no" id="phone-no" type="text"></td>
                        <td><input hidden name="user-id" id="userid" type="text" value=<?php echo $_SESSION['userid']; ?>></td>
                    </tr>

                    <tr>
                        <th><label for="inquiry">Your Inquiry: </label></th>
                    </tr>   

                    <tr>
                        <td><textarea id="inquiry" name="inquiry" rows="5" cols="40" type = "text"></textarea></td>
                    </tr>
                </table>
                <input type="submit" name="submit" id="live-chat-form-submit-button">
            </form>
        </div>
        <script>
            $(function () {
            $('#submit-inquiry').validate();

            $('#submit-inquiry').on('submit', function(e){
                e.preventDefault();

                // Collect the data.
                let dataString = $(this).serialize();

                // Send data.
                $.ajax({
                // type: 'POST',
                type: $form.attr('method'),
                //url: 'include/submit-form.php',
                url: $form.attr('action'),
                data: dataString,
                success: function(){
                    alert('lol');
                    checkingFormProcess();
                }
                })
            });
            });
        </script>

        <div id="form-submit-success" class="form-submit-success">
            <i class="fas fa-check-circle"></i>
            <p>Your request has been received. We shall revert to you within 48 hours.</p>
        </div>

        <!--
        <div class="chat-box-vis-icon">
            <i class="fa fa-user" aria-hidden="true"></i>
        </div>
        <div class="chat-container-visitor">
            <div class="chat-message-visitor">
                <p>visitor</p>
            </div>
            <div class="chat-message-visitor">
                <p>visitor</p>
            </div>
        </div>
        

        <div class="chat-box-adm-icon">
            <i class='fas fa-headset'></i>
        </div>
        <div class="chat-container-admin">
            <div class="chat-message-admin">
                <p>Hello! How may we help you? Below are the most frequently asked questions (FAQs), </p>
            </div>
            <div class="chat-message-admin">
                <p>admin</p>
            </div>
        </div>
        -->
        

        <div id="send-message-box" class="chat-box-message-bottom">
            <form action="#">
                <input type="text" id="message" name="message" placeholder="Hello!">
                <i class='fas fa-location-arrow'></i>
            </form>
        </div>
        
    </div>

    <div id="chat-box-minimized" class="chat-box-minimized">
        <div class="chat-box-minimized-box">
            <span onclick="openChat()"><i class="fas fa-comment"></i></span>
        </div>
    </div>

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
