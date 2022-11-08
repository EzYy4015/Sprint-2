<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 1"/>
	<meta name="keywords" content="Admin Booking"/>
	<meta name="author" content="Cornelius Lee Jun Teng"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style/style.css">
	<!-- Font Awesome (Icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Admin Delete Booking Process</title>

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
                <a href = "booking.php">
                    <i class="fa-solid fa-calendar-plus"></i>
                    <span class = "links_name">Add Booking</span>
                </a>
                <span class="tooltip">Add Booking</span>
            </li>
        </ul>
    </div>

    <script src = "script/side_bar.js"></script>

    <div class = "container">
        <div class="inner_container">
            <h1>Result</h1>            
            <?php
                $booking_id = $_POST['booking_id'];

                include("connectionSQL.php");

                $deleteAccBooking = "DELETE FROM acc_bookings WHERE bookingID = $booking_id";
                $deleteBooking = "DELETE FROM bookings WHERE bookingID = $booking_id";
                
                // Delete booking slots from acc_booking and bookings table
                if(mysqli_query($conn, $deleteAccBooking)) {
                    if(mysqli_query($conn, $deleteBooking)){
                        echo "<p class = 'success'>The selected booking slot is deleted!</p>";
                    }     
                }
                else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn)

            ?>
            <a class = "return" href = "booking.php">Return to Booking Page</a>
        </div> 
    </div>

</body>

</html>