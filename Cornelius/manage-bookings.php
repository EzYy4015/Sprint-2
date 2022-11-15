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
    
    <script src="script/script.js"></script>
    <!-- Booking JS -->
    <script src = "script/booking.js"></script>

	<title>Cacti Succulents - Bookings Management</title>

    <!-- Font Type -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Poppins Font -->
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

    <!-- <script src = "script/side_bar.js"></script> -->

    <div class="mainbody">
        <div class = "container">
            <!-- Booking Detail -->
            <div class="booking_detail">
                <h1>Booking Details</h1>

                <form class = "filter" action = "" method = "GET" onsubmit="return validateBookingFilter()">
                    <div class = "booking_date_filter">
                        <div class="from_date">
                            <label>From Date:</label>
                            <input type="date" class="booking_filter_date" name="booking_from_date" id="booking_from_date" value="<?php if(isset($_GET['booking_from_date'])){ echo $_GET['booking_from_date']; } ?>">
                        </div>
                    
                        <div class="to_date">
                            <label>To Date:</label>
                            <input type="date" class="booking_filter_date" name="booking_to_date" id="booking_to_date" value="<?php if(isset($_GET['booking_to_date'])){ echo $_GET['booking_to_date']; } ?>">
                        </div>
                    </div>

                    <div class="filter_buttons">
                        <input id = "go" type = "submit" name = "go" value = "Filter">
                        <a class="reset_review" href="reset_booking_filter.php">Reset</a>
                    </div>                    
                </form>

                <?php include("include/display_booking.php")?>
            </div>

            <!-- Add Booking -->
            <form id = "form" action = "add_booking_process.php" method = "post" onsubmit = "return validateBooking()">
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
                            </tr>

                            <tr>
                                <td><input type = "text" id = "total_slot" name = "total_slot" placeholder = "0" size = "40" required = "required"></td>
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
                        </table>                
                    </div>

                    <button id = "book-button">ADD</button>
                </fieldset>
            </form>
        </div>
    </div>
    
</body>

</html>