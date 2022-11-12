<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 1"/>
	<meta name="keywords" content="Admin Booking"/>
	<meta name="author" content="Cornelius Lee Jun Teng"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style/style_adminbooking.css">
	<!-- Font Awesome (Icon) -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Cacti Succulents - Delete Booking</title>

    <!-- Font Type -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <?php 
        include ("include/navbar-management.php"); 
        include ('include/connection.php');  
        include("include/functions.php");
        check_login();
    ?>

    <script src = "script/side_bar.js"></script>

    <div class = "container">
        <div class="inner_container">
            <h1>Result</h1>            
            <?php
                $booking_id = $_POST['booking_id'];

                
               

                $deleteAccBooking = "DELETE FROM acc_bookings WHERE bookingID = $booking_id";
                $deleteNotifBooking = "DELETE FROM notif_bookings WHERE bookingID = $booking_id";
                $deleteBooking = "DELETE FROM bookings WHERE bookingID = $booking_id";
                
                // insert notification update part
                include ("include/bookingUpdate(Delete).php");
                getData($booking_id);
                
                // Delete booking slots from acc_booking and bookings table
                if(mysqli_query($con, $deleteAccBooking) && mysqli_query($con, $deleteNotifBooking) && mysqli_query($con, $deleteBooking)) {

                    echo "<p class = 'success'>The selected booking slot is deleted!</p>";
                  
                }
                else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }

                mysqli_close($con)

            ?>
            <a class = "return" href = "manage-bookings.php">Return to Bookings Page</a>
        </div> 
    </div>

</body>

</html>