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

    <script src = "script/side_bar.js"></script>

    <div class = "container">
        <!-- Booking Detail -->
        <div class="booking_detail">
            <h1>Booking Details</h1>

            <form class = "sort" action = "add_booking.php" method = "post">
                <label>SORT BY</label>
                <select name = "sortby">
                    <option value = "bookingID">Booking ID</option>
                    <option value = "bookingDate">Booking Date</option>
                    <option value = "bookingTime">Booking Time</option>
                </select>

                <input id = "go" type = "submit" name = "go" value = "GO">
            </form>

            <?php    
                // Get Value after submit
                if (isset($_POST["go"])){
                    $sortby = $_POST["sortby"];
                }
                else{ // Default Value
                    $sortby = "bookingID";
                }

                // Sort By: Booking ID, Order: ASCENDING
                if ($sortby == "bookingID"){
                    $sql = "SELECT bookingID, bookingDate, bookingTime, bookingVisible, bookingTotalSlots, bookingAvailSlots FROM bookings ORDER BY bookingID ASC";
                    $result = mysqli_query($con, $sql);
    
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo 
                            "<tr class = 'table_heading'>
                                <th class = 'bookID_col'>Booking ID</th>
                                <th>Booking Date</th>
                                <th>Booking Time</th>
                                <th class = 'bookVis_col'>Booking Visibility</th>
                                <th class = 'bookTotal_col'>Total Slots</th>
                                <th class = 'bookAvai_col'>Available Slots</th>
                                <th>Action</th>
                            </tr>";
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td class = 'bookID_col'>" . $row["bookingID"] . "</td>";
                            echo "<td>" . $row["bookingDate"] . "</td>";
                            echo "<td>" . date("h:i a",strtotime($row["bookingTime"])) . "</td>";
                            echo "<td class = 'bookVis_col'>" . $row["bookingVisible"] . "</td>";
                            echo "<td class = 'bookTotal_col'>" . $row["bookingTotalSlots"] . "</td>";
                            echo "<td class = 'bookAvai_col'>" . $row["bookingAvailSlots"] . "</td>";
                            // Create form to bring data to other page
                            echo "<td class = 'action'>
                                    <ul>
                                        <li>
                                            <form id = 'update_form' action = 'update_booking.php' method = 'post'>
                                                <input type = 'hidden' name  = 'booking_id' value = '" . $row["bookingID"] . "'> 
                                                <input type = 'hidden' name  = 'booking_date' value = '" . $row["bookingDate"] . "'> 
                                                <input type = 'hidden' name  = 'booking_time' value = '" . $row["bookingTime"] . "'> 
                                                <input type = 'hidden' name  = 'booking_visible' value = '" . $row["bookingVisible"] . "'> 
                                                <input type = 'hidden' name  = 'booking_total' value = '" . $row["bookingTotalSlots"] . "'> 
                                                <input type = 'hidden' name  = 'booking_avai' value = '" . $row["bookingAvailSlots"] . "'> 
                                                <input type = 'submit' id = 'btn_update' name = 'btn_update' value = 'Update'>
                                            </form>
                                        </li>

                                        <li>
                                            <form id = 'delete_form' action = 'delete_booking_process.php' method = 'post' onsubmit = 'return confirmDelete()'>
                                                <input type = 'hidden' name  = 'booking_id' value = '" . $row["bookingID"] . "'> 
                                                <input type = 'submit' id = 'btn_delete' name = 'btn_delete' value = 'Delete'>
                                            </form>
                                        </li>             
                                    </ul>
                                </td></tr>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "<h2>No Account Created.</h2>";
                    }
                }
                // Sort By: Booking Date, Order: ASCENDING
                else if($sortby == "bookingDate"){
                    $sql = "SELECT bookingID, bookingDate, bookingTime, bookingVisible, bookingTotalSlots, bookingAvailSlots FROM bookings ORDER BY bookingDate ASC";
                    $result = mysqli_query($con, $sql);
    
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo 
                            "<tr class = 'table_heading'>
                                <th class = 'bookID_col'>Booking ID</th>
                                <th>Booking Date</th>
                                <th>Booking Time</th>
                                <th class = 'bookVis_col'>Booking Visibility</th>
                                <th class = 'bookTotal_col'>Total Slots</th>
                                <th class = 'bookAvai_col'>Available Slots</th>
                                <th>Action</th>
                            </tr>";
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td class = 'bookID_col'>" . $row["bookingID"] . "</td>";
                            echo "<td>" . $row["bookingDate"] . "</td>";
                            echo "<td>" . $row["bookingTime"] . "</td>";
                            echo "<td class = 'bookVis_col'>" . $row["bookingVisible"] . "</td>";
                            echo "<td class = 'bookTotal_col'>" . $row["bookingTotalSlots"] . "</td>";
                            echo "<td class = 'bookAvai_col'>" . $row["bookingAvailSlots"] . "</td>";
                            // Create form to bring data to other page
                            echo "<td class = 'action'>
                                    <ul>
                                        <li>
                                            <form id = 'update_form' action = 'update_booking.php' method = 'post'>
                                                <input type = 'hidden' name  = 'booking_id' value = '" . $row["bookingID"] . "'> 
                                                <input type = 'hidden' name  = 'booking_date' value = '" . $row["bookingDate"] . "'> 
                                                <input type = 'hidden' name  = 'booking_time' value = '" . $row["bookingTime"] . "'> 
                                                <input type = 'hidden' name  = 'booking_visible' value = '" . $row["bookingVisible"] . "'> 
                                                <input type = 'hidden' name  = 'booking_total' value = '" . $row["bookingTotalSlots"] . "'> 
                                                <input type = 'hidden' name  = 'booking_avai' value = '" . $row["bookingAvailSlots"] . "'> 
                                                <input type = 'submit' id = 'btn_update' name = 'btn_update' value = 'Update'>
                                            </form>
                                        </li>

                                        <li>
                                            <form id = 'delete_form' action = 'delete_booking_process.php' method = 'post' onsubmit = 'return confirmDelete()'>
                                                <input type = 'hidden' name  = 'booking_id' value = '" . $row["bookingID"] . "'> 
                                                <input type = 'submit' id = 'btn_delete' name = 'btn_delete' value = 'Delete'>
                                            </form>
                                        </li>             
                                    </ul>
                                </td></tr>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "<h2>No Account Created.</h2>";
                    }
                }
                // Sort By: Booking Time, Order: ASCENDING
                else if($sortby == "bookingTime"){
                    $sql = "SELECT bookingID, bookingDate, bookingTime, bookingVisible, bookingTotalSlots, bookingAvailSlots FROM bookings ORDER BY bookingTime ASC";
                    $result = mysqli_query($con, $sql);
    
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo 
                            "<tr class = 'table_heading'>
                                <th class = 'bookID_col'>Booking ID</th>
                                <th>Booking Date</th>
                                <th>Booking Time</th>
                                <th class = 'bookVis_col'>Booking Visibility</th>
                                <th class = 'bookTotal_col'>Total Slots</th>
                                <th class = 'bookAvai_col'>Available Slots</th>
                                <th>Action</th>
                            </tr>";
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td class = 'bookID_col'>" . $row["bookingID"] . "</td>";
                            echo "<td>" . $row["bookingDate"] . "</td>";
                            echo "<td>" . $row["bookingTime"] . "</td>";
                            echo "<td class = 'bookVis_col'>" . $row["bookingVisible"] . "</td>";
                            echo "<td class = 'bookTotal_col'>" . $row["bookingTotalSlots"] . "</td>";
                            echo "<td class = 'bookAvai_col'>" . $row["bookingAvailSlots"] . "</td>";
                            // Create form to bring data to other page
                            echo "<td class = 'action'>
                                    <ul>
                                        <li>
                                            <form id = 'update_form' action = 'update_booking.php' method = 'post'>
                                                <input type = 'hidden' name  = 'booking_id' value = '" . $row["bookingID"] . "'> 
                                                <input type = 'hidden' name  = 'booking_date' value = '" . $row["bookingDate"] . "'> 
                                                <input type = 'hidden' name  = 'booking_time' value = '" . $row["bookingTime"] . "'> 
                                                <input type = 'hidden' name  = 'booking_visible' value = '" . $row["bookingVisible"] . "'> 
                                                <input type = 'hidden' name  = 'booking_total' value = '" . $row["bookingTotalSlots"] . "'> 
                                                <input type = 'hidden' name  = 'booking_avai' value = '" . $row["bookingAvailSlots"] . "'> 
                                                <input type = 'submit' id = 'btn_update' name = 'btn_update' value = 'Update'>
                                            </form>
                                        </li>

                                        <li>
                                            <form id = 'delete_form' action = 'delete_booking_process.php' method = 'post' onsubmit = 'return confirmDelete()'>
                                                <input type = 'hidden' name  = 'booking_id' value = '" . $row["bookingID"] . "'> 
                                                <input type = 'submit' id = 'btn_delete' name = 'btn_delete' value = 'Delete'>
                                            </form>
                                        </li>             
                                    </ul>
                                </td></tr>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "<h2>No Account Created.</h2>";
                    }
                }
            ?>
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

    
</body>

</html>