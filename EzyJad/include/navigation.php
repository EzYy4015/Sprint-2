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
            <a href="#">Home</a>
            <a href="#">Bookings</a>
            <a href="#">Products</a>
            <a href="#">Forum</a>
            <a href="#">Guide</a>
            '?>

            <?php 

            if($_SESSION['access'] == 2){
                echo '<a href="report-main.php">Report</a>';
            }
            if($_SESSION['loggedin'] == 1){
                echo '<a href="include/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>';
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
            <img src="images/sidelogo.png">
        </div>'
?>