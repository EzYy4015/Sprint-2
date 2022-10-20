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
    <!-- Booking JS -->
    <script src = "booking.js"></script>

	<title>Admin Add Booking</title>

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

                // Connect to SQL Database
                include("connectionSQL.php");

                // Sort By: Booking ID, Order: ASCENDING
                if ($sortby == "bookingID"){
                    $sql = "SELECT bookingID, bookingDate, bookingTime, bookingVisible, bookingTotalSlots, bookingAvailSlots FROM bookings ORDER BY bookingID ASC";
                    $result = mysqli_query($conn, $sql);
    
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
                // Sort By: Booking Date, Order: ASCENDING
                else if($sortby == "bookingDate"){
                    $sql = "SELECT bookingID, bookingDate, bookingTime, bookingVisible, bookingTotalSlots, bookingAvailSlots FROM bookings ORDER BY bookingDate ASC";
                    $result = mysqli_query($conn, $sql);
    
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
                    $result = mysqli_query($conn, $sql);
    
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
                            <td><input type = "time" id = "book-time" name = "book-time" step = 3600 required = "required"></td>
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