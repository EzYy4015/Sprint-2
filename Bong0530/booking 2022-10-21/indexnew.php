<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent Kuching</title>
<link rel="stylesheet" type="text/css" href="style/style.css"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link rel="stylesheet" href="booking.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="script/script.js"></script>

</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!-- <img src="images/logo4.png"> -->
        <div class="sidenav-box">
            <a href="#">Home</a>
            <a href="#">Bookings</a>
            <a href="#">Products</a>
            <a href="#">Forum</a>
            <a href="#">Guide</a>
        </div>
        <div class="sidenav-contact">
            <p>Our Socials</p>
            <div class="sidenav-contact-logos">
                <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

    <!-- Use any element to open the sidenav -->
    <span class="opennav" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
    <div id="mySideMsg" class="sidemsg">
        <img src="images/sidelogo.png">
    </div> 

    <div class="mainbody">

        <!-- Top Cover only -->
        <div class="container">
        <div class="container">
        <div class="slot_container">
            <fieldset class="slot_fieldset">
                <legend>Booking Slots Filter</legend>
                    <form action="" method="GET">
                        <div class="filter">
                            <label>From Date</label>
                            <input type="date" name="from_date" placeholder="From Date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>">
                        </div>
                    
                        <div class="filter">
                            <label>To Date</label>
                            <input type="date" name="to_date" placeholder="To Date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>">
                        </div>
                    
                        <div class="filter">
                            <button type="submit" class="filter_slot">Filter</button>
                        </div>
                    </form>
                    <?php
                    include("show_slots.php");
                    ?>
            </fieldset>
        </div>
        <div class="slot_container">
            <fieldset class="slot_fieldset">
                <legend>Future Appointment</legend>
                <?php
                include("display_appointment.php");
                ?>
            </fieldset>
        </div>
        <div class="slot_container">
            <fieldset class="slot_fieldset">
                <legend>Appointment Done</legend>
                <?php
                include("display_done_appointment.php");
                ?>
            </fieldset>
        </div>
        
    </div>
        </div>
    </div>
        
    </div>

        

        <footer>
            <div class="footer-grass">
            <img src="images/grass-footer1.png">
            </div>
            <div class="footer-container">
                <div class="footer">
                    <div class="footer-heading footer1">
                        <h2>Navigation</h2>
                        <a href="#">Home</a>
                        <a href="#">Products</a>
                        <a href="#">Bookings</a>
                        <a href="#">Guide</a>
                        <a href="#">Contact Us</a>
                    </div>
                    <div class="footer-heading footer2">
                    <h2>Developers</h2>
                        <a href="#">Ezekiel</a>
                        <a href="#">Yuk Fung</a>
                        <a href="#">Jing Hong</a>
                        <a href="#">Josh</a>
                        <a href="#">Cornelius</a>
                        <a href="#">Jaden</a>
                    </div>
                    <div class="footer-heading footer3">
                        <h2>Social Media</h2>
                        <a href="#">Facebook</a>
                        <a href="#">Instagram</a>
                        <a href="#">Twitter</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
            <p>&copy; 2022 - All rights reserved.</p>
            </div>
        </footer>
    </div>


    
</body>
</html>