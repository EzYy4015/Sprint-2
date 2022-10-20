<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 1"/>
	<meta name="keywords" content="Admin Booking"/>
	<meta name="author" content="Cornelius Lee Jun Teng"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style.css">
	<!-- Font Awesome (Icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Admin Update Booking Process</title>

    <!-- Font Type -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class="fa-solid fa-seedling"></i>
                <div class="logo_name">Cacti-Succulent</div>
            </div>
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>
        <ul class="navlist">
            <li>
                <a href = "add_booking.php">
                    <i class="fa-solid fa-plus"></i>
                    <span class = "links_name">Add Booking</span>
                </a>
                <span class="tooltip">Add Booking</span>
            </li>
            <li>
                <a href = "delete_booking.php">
                    <i class="fa-solid fa-trash"></i>
                    <span class = "links_name">Delete Booking</span>
                </a>
                <span class="tooltip">Delete Booking</span>
            </li>
            <li>
                <a href = "update_booking.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span class = "links_name">Update Booking</span>
                </a>
                <span class="tooltip">Update Booking</span>
            </li>
        </ul>
    </div>

    <script src = "side_bar.js"></script>

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

                // Connect to SQL database
                include("connectionSQL.php");

                $updateBooking = "UPDATE bookings
                                SET bookingDate = '$booking_date',
                                    bookingTime = '$booking_time',
                                    bookingVisible = '$booking_visible',
                                    bookingTotalSlots = '$booking_total',
                                    bookingAvailSlots = '$booking_avai' 
                                WHERE bookingID = $booking_id";
                
                // Update booking slot from booking table
                if(mysqli_query($conn, $updateBooking)) {
                    echo "<p>The selected booking slot has been updated!</p>";
                }
                else{
                    echo "Error: " . $updateBooking . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn)
            ?>

            <a class = "return" href = "add_booking.php">Return to Booking Page</a>
        </div> 
    </div>

</body>

</html>