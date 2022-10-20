<!DOCTYPE html>
<html lang="en">
    <head>  
    <meta charset="utf-8" />
        <title>Calendar</title>
        <link rel="stylesheet" href="calendar_style.css?v=<?php echo time(); ?>">
        
    </head>

    <body>
    <div class="container">
        <div class="form_container">
            <form action="" method="GET">
                <div class="filter">
                    <label>From Date</label>
                    <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                </div>
            
                <div class="filter">
                    <label>To Date</label>
                    <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                </div>
            
                <div class="filter">
                    <label>Click to Filter</label> <br>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>

        <div class=booking_slot_table>
           
        </div>
    </div>

    <div class="container">
        <div class="appointment_made">
            <h1>Appointment Summary</h1>
            <?php
                include("test_connection.php");
                include("show_slots.php");
                include("display_appointment.php");
            ?>
        </div>
    </div>


    </body>
   
</html>