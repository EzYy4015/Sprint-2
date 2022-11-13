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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Booking JS -->
    <script src = "script/booking.js"></script>

	<title>Cacti Succulents - Update Booking</title>

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
                            <td>
                                <select name = "book-time" id = "book-time" required = "required">
                                    <option value = "">- Select -</option>
                                    <option value = "09:00:00">09:00 AM</option>
                                    <option value = "10:00:00">10:00 AM</option>
                                    <option value = "11:00:00">11:00 AM</option>
                                    <option value = "12:00:00">12:00 PM</option>
                                    <option value = "13:00:00">01:00 PM</option>
                                    <option value = "14:00:00">02:00 PM</option>
                                    <option value = "15:00:00">03:00 PM</option>
                                    <option value = "16:00:00">04:00 PM</option>
                                    <option value = "17:00:00">05:00 PM</option>
                                    <option value = "18:00:00">06:00 PM</option>
                                    <option value = "19:00:00">07:00 PM</option>
                                    <option value = "20:00:00">08:00 PM</option>
                                    <option value = "21:00:00">09:00 PM</option>
                                    <option value = "22:00:00">10:00 PM</option>
                                </select>
                            </td>
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