<?php
    echo
    '<div id="mySidenav" class="sidenav">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!-- <img src="images/logo4.png"> -->

        <div class="sidenav-box">
            <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <a href="manage-bookings.php"><i class="fa-solid fa-calendar-plus"></i> Manage Bookings</a>
            <a href="manage-promotions.php"><i class="fa fa-bell" aria-hidden="true"></i> Manage Promotions</a>
            <a href="manage-banners.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Manage Banners</a>
            <a href="include/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        </div>

    </div>

    <span class="opennav" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>

    <div id="mySideMsg" class="sidemsg">
        <a href="index.php"><img src="images/sidelogo.png"></a>
    </div>'
?>