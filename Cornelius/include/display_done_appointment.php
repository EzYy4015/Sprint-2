<?php
    include("connection.php");
    $userID=$_SESSION["userid"];
    $appointment = "SELECT acc_bookings.bookingID, bookings.bookingDate, bookings.bookingTime, accounts.accName,
        CASE WHEN acc_bookings.bookingCompleted = '0' THEN 'Not Visited' 
        ELSE 'Visited' END AS visit_status,
        CASE WHEN acc_bookings.bookingStatus = '1' THEN ' Completed' 
        ELSE 'Not Completed' END AS booking_status
        FROM acc_bookings 
        LEFT JOIN accounts ON acc_bookings.accID=accounts.accID
        LEFT JOIN bookings ON bookings.bookingID=acc_bookings.bookingID 
        WHERE acc_bookings.accID='$userID' AND bookingCompleted=1";
    $result = mysqli_query($con, $appointment);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='appointment_table'>";
        echo 
            "<tr>
                <th class='start_th'>Account</th>
                <th>Booking ID</th>
                <th>Booking Date</th>
                <th class='end_th'>Booking Time</th>
            </tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo 
            "<tr>
            <td>" . $row["accName"] . "</td>
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

    mysqli_close($con);
?>