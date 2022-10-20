<?php
    if(isset($_GET['from_date']) && isset($_GET['to_date']))
    {
        $username="JingHong";
        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];

        $query = "SELECT bookingID, bookingDate, bookingTime FROM bookings WHERE bookingID NOT IN (SELECT acc_bookings.bookingID FROM acc_bookings 
        LEFT JOIN accounts ON accounts.accID=acc_bookings.accID 
        LEFT JOIN bookings ON bookings.bookingID=acc_bookings.bookingID 
        WHERE accounts.accName='$username') AND bookingVisible=1 AND bookingDate BETWEEN '$from_date' AND '$to_date' ";
        $result = mysqli_query($conn, $query);

        $query2 = "SELECT accID FROM accounts WHERE accNAME='$username'";
        $result2 = mysqli_query($conn, $query2);

        if(mysqli_num_rows($result2) > 0){
            while ($row= mysqli_fetch_assoc($result2)) {
                $userID=$row["accID"];
            }  
        }

        if(mysqli_num_rows($result) > 0)

        {
            echo "<table class='booking_table'>";
            echo 
            "<tr class = 'table_heading'>
                <th>Booking ID</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
            </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo 
                "<tr>
                <td>" . $row["bookingID"] . "</td>
                <td>" . $row["bookingDate"] . "</td>
                <td>" . $row["bookingTime"] . "</td>
                <td><a href = 'add_appointment.php?bID=$row[bookingID]&userID=$userID'>Book</td>
                </tr>";
            }  
        }
        else
        {
            echo "No Record Found";
        }
    }
?>