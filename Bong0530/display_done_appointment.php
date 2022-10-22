<?php
    include("test_connection.php");
    $username="JingHong";
    $appointment = "SELECT accounts.accID, acc_bookings.bookingID, bookings.bookingDate, bookings.bookingTime, 
        CASE WHEN acc_bookings.bookingCompleted = '0' THEN 'Not Visited' 
        ELSE 'Visited' END AS visit_status,
        CASE WHEN acc_bookings.bookingStatus = '1' THEN ' Completed' 
        ELSE 'Not Completed' END AS booking_status
        FROM acc_bookings 
        LEFT JOIN accounts ON accounts.accID=acc_bookings.accID 
        LEFT JOIN bookings ON bookings.bookingID=acc_bookings.bookingID 
        WHERE accounts.accName='$username' AND bookingCompleted=1";
    $result = mysqli_query($conn, $appointment);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='appointment_table'>";
        echo 
            "<tr class = 'table_heading'>
                <th>accID</th>
                <th>Booking ID</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
            </tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo 
            "<tr>
            <td>" . $row["accID"] . "</td>
            <td>" . $row["bookingID"] . "</td>
            <td>" . $row["bookingDate"] . "</td>
            <td>" . $row["bookingTime"] . "</td>
            </tr>";
        }  
        echo "</table>";
    }
    else{
        echo "<div class='result'>No Appointment Done Before.</div>";
    }

    mysqli_close($conn);
?>