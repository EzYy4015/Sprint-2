<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent - Bookings </title>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="script/script.js"></script>
<link rel="stylesheet" href="style/style_visbooking.css">

</head>
<body>

    <?php 
        include("include/navigation.php"); 
        include("include/functions.php");
      
        check_userlogin();
    ?>


    <div class="mainbody">
        <!-- Your contents go in here, create a new div yah. Better use div for each section -->
        
        <div class="container">
            <div class="slot_container">
                <fieldset class="slot_fieldset">
                    <legend>Todays Slot Availability</legend>
                    <?php
                    include("include/display_weekly_booking_slots.php");
                    ?>
                </fieldset>
            </div>
            <div class="slot_container">
                <fieldset class="slot_fieldset">
                    <legend>Booking Slots Filter</legend>
                        <form action="" method="GET" onsubmit="return validateFilter()">
                            <div class="filter">
                                <label>From Date</label>
                                <input type="date" name="from_date" id="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>">
                            </div>
                        
                            <div class="filter">
                                <label>To Date</label>
                                <input type="date" name="to_date" id="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>">
                            </div>
                        
                            <div class="filter">
                                <button type="submit" class="filter_slot" id="filter_button">Filter</button>
                            </div>
                        </form>
                        <?php
                        include("include/show_slots.php");
                        ?>
                </fieldset>
            </div>
            <div class="slot_container">
                <fieldset class="slot_fieldset">
                    <legend>Upcoming Bookings</legend>
                    <?php
                    include("include/display_appointment.php");
                    ?>
                </fieldset>
            </div>
            <div class="slot_container">
                <fieldset class="slot_fieldset">
                    <legend>Completed Bookings</legend>
                    <?php
                    include("include/display_done_appointment.php");
                    ?>
                </fieldset>
            </div>
        </div>
    
        <script src="script/validate.js"></script>

        <?php include("include/footer.php"); ?>
    </div>


    
</body>
</html>
