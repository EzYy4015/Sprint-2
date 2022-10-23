<!DOCTYPE html>
<html lang="en">
    <head>  
    <meta charset="utf-8" />
        <title>Calendar</title>
        <link rel="stylesheet" href="booking.css">
        <?php
        session_start();
        $_SESSION["userID"] = 4;
        ?>
        
    </head>

    <body>
    <div class="container">
        <div class="slot_container">
            <fieldset class="slot_fieldset">
                <legend>Current Slot Availability</legend>
                <?php
                include("display_weekly_booking_slots.php");
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
    
    <script src="validate.js"></script>


    </body>
   
</html>