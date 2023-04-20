<?php
    include("include/connection.php");
    if(isset($_GET['from_date']) && isset($_GET['to_date'])){
        $userID=$_SESSION["userid"];
        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];

        $query = "SELECT bookingID, bookingDate, bookingTime, bookingAvailSlots FROM bookings WHERE bookingID NOT IN (SELECT bookingID FROM acc_bookings 
        WHERE accID='$userID' AND bookingStatus=1) AND bookingVisible=1 AND bookingDate BETWEEN '$from_date' AND '$to_date' ";
        $result = mysqli_query($con, $query);
        
        if(mysqli_num_rows($result) > 0){
            echo "<div class='table_title'>Booking Slot</div>";
            echo "<table class='slot_table'>";
            echo "<tr>
                <th class='start_th'>Booking ID</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th>Remaining Slot</th>
                <th class='end_th'>Book It</th>
            </tr>";
            while ($row = mysqli_fetch_assoc($result)){
                echo 
                "<tr>
                <td>" . $row["bookingID"] . "</td>
                <td>" . $row["bookingDate"] . "</td>
                <td>" . $row["bookingTime"] . "</td>
                <td>" . $row["bookingAvailSlots"] . "</td>
                <td><a onclick = 'return confirmBook()' class='booking_buttons' href = 'add_appointment.php?bID=$row[bookingID]&userID=$userID&btime=$row[bookingTime]&bdate=$row[bookingDate]'>Book</td>
                </tr>";
            }
            echo "</table>"; 
        }
        else{
            echo "<div class='result'>No Booking Slot Found</div>";
        }
    }
    mysqli_close($con);
?>