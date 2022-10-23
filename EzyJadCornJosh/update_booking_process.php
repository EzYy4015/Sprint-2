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

	<title>Cacti Succulents - Update Booking</title>

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
                $booking_date = $_POST['book-date'];
                $booking_time = $_POST['book-time'];
                $booking_visible = $_POST['visibility'];
                $booking_total = $_POST['total_slot'];
                $booking_avai = $_POST['avai_slot'];

                $check = mysqli_query($con, "SELECT * FROM Bookings WHERE bookingDate = '$booking_date' AND bookingTime = '$booking_time'");
                $check_rows = mysqli_num_rows($check);

                $updateBooking = "UPDATE bookings
                                SET bookingDate = '$booking_date',
                                    bookingTime = '$booking_time',
                                    bookingVisible = '$booking_visible',
                                    bookingTotalSlots = '$booking_total',
                                    bookingAvailSlots = '$booking_avai' 
                                WHERE bookingID = $booking_id";
                
                // Update booking slot from booking table
                if($check_rows > 0){
                    echo "<p>A booking slot with the same date and time already exists.</p>";
                    while ($row = mysqli_fetch_assoc($check)) {
                        echo "<table>";
                        echo 
                            "<tr class = 'table_heading'>
                                <th>Booking ID</th>
                                <th>Booking Date</th>
                                <th>Booking Time</th>
                                <th>Booking Visibility</th>
                                <th>Total Slots</th>
                                <th>Available Slots</th>
                            </tr>";
                        echo "<tr><td>" . $row["bookingID"] . "</td>";
                        echo "<td>" .$row["bookingDate"] . "</td>";
                        echo "<td>" .$row["bookingTime"] . "</td>";
                        echo "<td>" .$row["bookingVisible"] . "</td>";
                        echo "<td>" .$row["bookingTotalSlots"] . "</td>";
                        echo "<td>" .$row["bookingAvailSlots"] . "</td></tr>";
                        echo "</table>";
                    }
                    
                }
                else{
                    if(mysqli_query($con, $updateBooking)) {
                        echo "<p class = 'success'>The selected booking slot has been updated!</p>";
                    }
                    else{
                        echo "Error: " . $updateBooking . "<br>" . mysqli_error($con);
                    }
                }
                

                mysqli_close($con)
            ?>

            <a class = "return" href = "manage-bookings.php">Return to Booking Page</a>
        </div> 
    </div>

</body>

</html>