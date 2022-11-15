<?php
    include("include/connection.php");

    date_default_timezone_set("Asia/Kuala_Lumpur"); // Set timezone to Malaysia

    // Filter
    if(!empty($_GET['booking_from_date']) && !empty($_GET['booking_to_date'])){
        $booking_from_date = $_GET['booking_from_date'];
        $booking_to_date = $_GET['booking_to_date'];
        
        $query= "SELECT * FROM bookings WHERE bookings.bookingDate BETWEEN '$booking_from_date' AND '$booking_to_date' ORDER BY bookingDate ASC";
        $result = mysqli_query($con, $query);
    }

    else if(empty($_GET['booking_from_date']) && empty($_GET['booking_to_date'])){
        $query= "SELECT * FROM bookings WHERE bookings.bookingDate ORDER BY bookingDate ASC";
        $result = mysqli_query($con, $query);
    }

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
            $booking_date = $row["bookingDate"];
            $booking_time = $row["bookingTime"];
            $booking_date_time = date('Y-m-d H:i:s', strtotime("$booking_date $booking_time"));

            echo "<tr><td class = 'bookID_col'>" . $row["bookingID"] . "</td>";
            echo "<td>" . $row["bookingDate"] . "</td>";
            echo "<td>" . date("h:i a",strtotime($row["bookingTime"])) . "</td>";
            echo "<td class = 'bookVis_col'>" . $row["bookingVisible"] . "</td>";
            echo "<td class = 'bookTotal_col'>" . $row["bookingTotalSlots"] . "</td>";
            echo "<td class = 'bookAvai_col'>" . $row["bookingAvailSlots"] . "</td>";
            // Create form to bring data to other page
            echo "<td class = 'action'>";

            // Disable the update and delete button if the booking is over
            if($booking_date_time >= date('Y-m-d H:i:s')){
                echo "<div class = 'action_box'>
                        <div class = 'update_box'>
                            <form id = 'update_form' action = 'update_booking.php' method = 'post'>
                                <input type = 'hidden' name  = 'booking_id' value = '" . $row["bookingID"] . "'> 
                                <input type = 'hidden' name  = 'booking_date' value = '" . $row["bookingDate"] . "'> 
                                <input type = 'hidden' name  = 'booking_time' value = '" . $row["bookingTime"] . "'> 
                                <input type = 'hidden' name  = 'booking_visible' value = '" . $row["bookingVisible"] . "'> 
                                <input type = 'hidden' name  = 'booking_total' value = '" . $row["bookingTotalSlots"] . "'> 
                                <input type = 'hidden' name  = 'booking_avai' value = '" . $row["bookingAvailSlots"] . "'> 
                                <input type = 'submit' id = 'btn_update' name = 'btn_update' value = 'Update'>
                            </form>
                        </div>

                        <div class = 'delete_box'>
                            <form id = 'delete_form' action = 'delete_booking_process.php' method = 'post' onsubmit = 'return confirmDelete()'>
                                <input type = 'hidden' name  = 'booking_id' value = '" . $row["bookingID"] . "'> 
                                <input type = 'submit' id = 'btn_delete' name = 'btn_delete' value = 'Delete'>
                            </form>
                        </div>             
                    </div>
                </td></tr>";
            }
            else{
                echo "Booking is over";
            }
                    
        }
        echo "</table>";
    }
    else{
        echo "<h2>No Account Created.</h2>";
    }


?>