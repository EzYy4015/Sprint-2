<?php
    echo
    '<div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <a href="index.php"><img src="images/logo5_50.png"></a>
        </div>
        <i class="fa-solid fa-bars" id="btn"></i>
    </div>
        <ul class="navlist">
            <li>
                <a href = "index.php">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span class = "links_name">Home</span>
                </a>

                <a href = "manage-bookings.php">
                    <i class="fa-solid fa-calendar-plus"></i>
                    <span class = "links_name">Manage Bookings</span>
                </a>

                <a href = "manage-promotions.php">
                <i class="fa fa-bell" aria-hidden="true"></i>
                    <span class = "links_name">Manage Promotions</span>
                </a>

                <a href = "manage-banners.php">
                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    <span class = "links_name">Manage Banners</span>
                </a>

                <a href = "include/logout.php">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span class = "links_name">Logout</span>
                </a>
            </li>
        </ul>
    </div>';
?>