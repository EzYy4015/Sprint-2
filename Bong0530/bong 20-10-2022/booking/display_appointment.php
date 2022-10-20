<?php
    $username="JingHong";
    $appointment = "SELECT accounts.accID, acc_bookings.bookingID, bookings.bookingDate, bookings.bookingTime, 
        CASE WHEN acc_bookings.bookingCompleted = '0' THEN 'Not Visited' 
        ELSE 'Visited' END AS visit_status,
        CASE WHEN acc_bookings.bookingStatus = '1' THEN ' Completed' 
        ELSE 'Not Completed' END AS booking_status
        FROM acc_bookings 
        LEFT JOIN accounts ON accounts.accID=acc_bookings.accID 
        LEFT JOIN bookings ON bookings.bookingID=acc_bookings.bookingID 
        WHERE accounts.accName='$username' ";
    $result = mysqli_query($conn, $appointment);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='appointment_table'>";
        echo 
            "<tr class = 'table_heading'>
                <th>accID</th>
                <th>Booking ID</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th>Booking Status</th>
                <th>Visit Status</th>
            </tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo 
            "<tr>
            <td>" . $row["accID"] . "</td>
            <td>" . $row["bookingID"] . "</td>
            <td>" . $row["bookingDate"] . "</td>
            <td>" . $row["bookingTime"] . "</td>
            <td>" . $row["booking_status"] . "</td>
            <td>" . $row["visit_status"] . "</td>
            <td><a href = 'cancel_appointment.php?bID=$row[bookingID]&acID=$row[accID]'>Cancel</td>
            </tr>";
        }  
        echo "</table>";
    }
    else{
        echo "<p>No Appointment Record Found.</p>";
    }


?>