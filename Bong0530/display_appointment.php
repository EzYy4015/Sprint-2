<?php
    include("test_connection.php");
    $userID=$_SESSION["userID"];
    $appointment = "SELECT acc_bookings.bookingID, bookings.bookingDate, bookings.bookingTime, accounts.accName,
        CASE WHEN acc_bookings.bookingCompleted = '0' THEN 'Not Visited' 
        ELSE 'Visited' END AS visit_status,
        CASE WHEN acc_bookings.bookingStatus = '1' THEN ' Completed' 
        ELSE 'Not Completed' END AS booking_status
        FROM acc_bookings 
        LEFT JOIN accounts ON acc_bookings.accID=accounts.accID
        LEFT JOIN bookings ON bookings.bookingID=acc_bookings.bookingID 
        WHERE acc_bookings.accID='$userID' AND bookingCompleted=0 AND bookingStatus=1";
    $result = mysqli_query($conn, $appointment);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='appointment_table'>";
        echo 
            "<tr>
                <th class='start_th'>Account</th>
                <th>Booking ID</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th>Booking Status</th>
                <th>Cancel It</th>
                <th class='end_th'>Update It</th>
            </tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo 
            "<tr>
            <td>" . $row["accName"] . "</td>
            <td>" . $row["bookingID"] . "</td>
            <td>" . $row["bookingDate"] . "</td>
            <td>" . $row["bookingTime"] . "</td>
            <td>" . $row["booking_status"] . "</td>
            <td><a onclick = 'return confirmDelete()' class='booking_buttons' href='cancel_appointment.php?bID=$row[bookingID]&acID=$userID&btime=$row[bookingTime]&bdate=$row[bookingDate]'>Cancel</td>
            <td><a onclick = 'return confirmUpdate()'class='booking_buttons' href='update_appointment.php?bID=$row[bookingID]&acID=$userID&btime=$row[bookingTime]&bdate=$row[bookingDate]'>Update</td>
            </tr>";
        }  
        echo "</table>";
    }
    else{
        echo "<div class='result'>No Appointment Record Found.</div>";
    }

    mysqli_close($conn);
?>