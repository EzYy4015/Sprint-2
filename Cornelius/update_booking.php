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
    <!-- Booking JS -->
    <script src = "booking.js"></script>

	<title>Admin Update Booking</title>

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

    
    <?php
        $booking_id = $_POST['booking_id'];
        $booking_date = $_POST['booking_date'];
        $booking_time = $_POST['booking_time'];
        $booking_visible = $_POST['booking_visible'];
        $booking_total = $_POST['booking_total'];
        $booking_avai = $_POST['booking_avai'];
    ?>

    <div class = "container">
        <!-- Update Booking -->
        <form id = "form" action = "update_booking_process.php" method = "post" onsubmit = "return validateBooking()">
            <fieldset id = "add-book">
                <legend>
                    <h1><i class="fa-solid fa-pen-to-square"></i>Update Slot</h1>        
                </legend>

                <div class = "booking-input">
                <table>
                        <tr>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                        </tr>

                        <tr>
                            <td><input type = "date" id = "book-date" name = "book-date" value = "<?php echo $booking_date; ?>" disabled></td>
                            <td><input type = "time" id = "book-time" name = "book-time" value = "<?php echo $booking_time; ?>"  step = 3600 disabled></td>
                        </tr>

                        <tr>
                            <th>Total Slots</th>
                            <th>Available Slots</th>
                        </tr>

                        <tr>
                            <td><input type = "text" value = "<?php echo $booking_total; ?>"  size = "40" disabled></td>
                            <td><input type = "text" value = "<?php echo $booking_avai; ?>"  size = "40" disabled></td>
                        </tr>

                        <tr>
                            <th>Booking Visibility</th>
                        </tr>

                        <tr>
                            <td>
                                <input tyoe = "text" value = "<?php
                                    if($booking_visible == 0){
                                        echo "Hide";
                                    }
                                    else{
                                        echo "Show";
                                    }
                                ?>" disabled>
                            </td>
                        </tr>
                    </table>

                    <hr>

                    <table>
                        <input type = "hidden" id = "booking_id" name = "booking_id" value = <?php echo $booking_id; ?>>
                        <tr>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                        </tr>

                        <tr>
                            <td><input type = "date" id = "book-date" name = "book-date" value = "<?php ?>" required = "required"></td>
                            <td><input type = "time" id = "book-time" name = "book-time" value = "<?php ?>"  step = 3600 required = "required"></td>
                        </tr>

                        <tr>
                            <th>Total Slots</th>
                            <th>Available Slots</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "total_slot" name = "total_slot" size = "40" required = "required"></td>
                            <td><input type = "text" id = "avai_slot" name = "avai_slot"  size = "40" required = "required"></td>
                        </tr>

                        <tr>
                            <th>Booking Visibility</th>
                        </tr>

                        <tr>
                            <td>
                                <select id = "visibility" name = "visibility" required = "required">
                                    <option value = "">- Select -</option>
                                    <option value = "0">Hide</option>
                                    <option value = "1">Show</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    
                    
                </div>

                <button id = "book-button">UPDATE</button>
            </fieldset>
        </form>
    </div>
</body>

</html>