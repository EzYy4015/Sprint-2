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
        WHERE accounts.accName='$username' AND bookingCompleted=0";
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
                <th>Cancel It</th>
                <th>Update It</th>
            </tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo 
            "<tr>
            <td>" . $row["accID"] . "</td>
            <td>" . $row["bookingID"] . "</td>
            <td>" . $row["bookingDate"] . "</td>
            <td>" . $row["bookingTime"] . "</td>
            <td>" . $row["booking_status"] . "</td>
            <td><a onclick = 'return confirmDelete()' class='booking_buttons' href='cancel_appointment.php?bID=$row[bookingID]&acID=$row[accID]&btime=$row[bookingTime]&bdate=$row[bookingDate]'>Cancel</td>
            <td><a onclick = 'return confirmUpdate()'class='booking_buttons' href='update_appointment.php?bID=$row[bookingID]&acID=$row[accID]&btime=$row[bookingTime]&bdate=$row[bookingDate]'>Update</td>
            </tr>";
        }  
        echo "</table>";
    }
    else{
        echo "<div class='result'>No Appointment Record Found.</div>";
    }

    mysqli_close($conn);
?>