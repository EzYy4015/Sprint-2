<?php
    if(!isset($_SESSION['access'])){
        $_SESSION['access'] = 0;
    }

    if(!isset($_SESSION['loggedin'])){
        $_SESSION['loggedin'] = 0;
    }

    echo
        '<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!-- <img src="images/logo4.png"> -->
        <div class="sidenav-box">
            <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <a href="booking.php"><i class="fa fa-calendar-o" aria-hidden="true"></i> Bookings</a>
            <a href="#"><i class="fa fa-leaf" aria-hidden="true"></i> Products</a>
            <a href="review.php"><i class="fa fa-comments-o" aria-hidden="true"></i> Reviews</a>
            <a href="#"><i class="fa fa-book" aria-hidden="true"></i> Guide</a>
            '?>

            <?php 

            if($_SESSION['access'] == 2){
                echo '<a href="report-main.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Report</a>';
                echo '<a href="housekeeping.php"><i class="fa fa-wrench" aria-hidden="true"></i> Housekeeping</a>';
            }
            if($_SESSION['loggedin'] == 1){
                echo '<a href="profile-management.php"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a>';
                echo '<a href="include/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>';
            } else {
                echo '<a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>';
            }

            ?>

            <?php echo '
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

        <span class="opennav" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
        <div id="mySideMsg" class="sidemsg">
            <a href="index.php"><img src="images/sidelogo.png"></a>
        </div>'
?>