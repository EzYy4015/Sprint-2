<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 1"/>
	<meta name="keywords" content="Admin Booking"/>
	<meta name="author" content="Cornelius Lee Jun Teng"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Admin Add Booking</title>

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
        <div class="booking_detail">
            <h1>Booking Details</h1>
            <?php
                // Connect to SQL Database
                include("connectionSQL.php");

                $booking = "SELECT bookingID, bookingDate, bookingTime, bookingVisible, bookingTotalSlots, bookingAvailSlots FROM bookings ORDER BY bookingID ASC";
                $result = mysqli_query($conn, $booking);

                if (mysqli_num_rows($result) > 0) {
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
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["bookingID"] . "</td>";
                        echo "<td>" . $row["bookingDate"] . "</td>";
                        echo "<td>" . $row["bookingTime"] . "</td>";
                        echo "<td>" . $row["bookingVisible"] . "</td>";
                        echo "<td>" . $row["bookingTotalSlots"] . "</td>";
                        echo "<td>" . $row["bookingAvailSlots"] . "</td></tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "<h2>No Account Created.</h2>";
                }
            ?>
        </div>

        <script src = "booking.js"></script>

        <form id = "form" action = "add_booking_process.php" method = "post">
            <fieldset id = "add-book">
                <legend>
                    <h1><i class="fa-solid fa-plus"></i>Add Slot</h1>        
                </legend>

                <div class = "booking-input">
                    <table>
                        <tr>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                        </tr>

                        <tr>
                            <td><input type = "date" id = "book-date" name = "book-date" value = "<?php echo date('Y-m-d'); ?>" required = "required"></td>
                            <td><input type = "time" id = "book-time" name = "book-time" step = 3600 required = "required"></td>
                        </tr>

                        <tr>
                            <th>Total Slots</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "total_slot" name = "total_slot" placeholder = "0" size = "40" required = "required" autofocus></td>
                        </tr>

                        <tr>
                            <th>Booking Visibility</th>
                        </tr>

                        <tr>
                            <td>
                                <select name = "visibility" id = "visibility" required = "required">
                                    <option value = "">- Select -</option>
                                    <option value = "0">Hide</option>
                                    <option value = "1">Show</option>
                                </select>
                            </td>
                        </tr>

                        <tr>

                        </tr>
                    </table>                
                </div>

                <button id = "book-button" onclick = "AddBooking()">BOOK</button>
            </fieldset>
        </form>
    </div>

    
</body>

</html>