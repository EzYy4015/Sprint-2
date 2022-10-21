<?php
    include("test_connection.php");

    date_default_timezone_set('Asia/Kuala_Lumpur');
    $time_now=date('Y-m-d H:i:s');
    
    $bookingDate=$_GET['bdate'];
    $bookingTime=$_GET['btime'];
    $bookingID=$_GET['bID'];
    $accID=$_GET['acID'];
   
    $query ="UPDATE bookings SET bookingAvailSlots=bookingAvailSlots+1 WHERE bookingID = '$bookingID';";
    $query.="DELETE FROM acc_bookings WHERE bookingID=$bookingID AND accID=$accID ";

    $bookingDateTime = date('Y-m-d H:i:s',strtotime('-2 hours',strtotime("$bookingDate $bookingTime")));
    
    if($bookingDateTime>=$time_now){
        $continueOrNot=1;
        $data = mysqli_multi_query($conn,$query);
        while(mysqli_next_result($conn)){;}
        if($data){
            $username="JingHong";
            
            $query = "SELECT bookingID, bookingDate, bookingTime FROM bookings WHERE bookingID NOT IN (SELECT acc_bookings.bookingID FROM acc_bookings 
            LEFT JOIN accounts ON accounts.accID=acc_bookings.accID 
            LEFT JOIN bookings ON bookings.bookingID=acc_bookings.bookingID 
            WHERE accounts.accName='$username') AND bookingVisible=1 AND bookingDate='$bookingDate'";
            $result = mysqli_query($conn, $query);
           echo $bookingDate;
            $query2 = "SELECT accID FROM accounts WHERE accNAME='$username'";
            $result2 = mysqli_query($conn, $query2);
    
            if(mysqli_num_rows($result2) > 0){
                while ($row= mysqli_fetch_assoc($result2)) {
                    $userID=$row["accID"];
                }  
            }
    
            if(mysqli_num_rows($result) > 0){
                echo "<table class='as'>";
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
                    <td><a class='booking_buttons' href='add_appointment.php?bID=$row[bookingID]&userID=$userID&btime=$row[bookingTime]&bdate=$row[bookingDate]'>Get</td>
                    </tr>";
                } 
                echo "</table>";
            } 

            else{
                echo nl2br("No pther available booking slot for that day. \nPage will be redirected after 3 seconds");
                header( "refresh:3;url=booking.php");
            }
        }

    }
    mysqli_close($conn);
?>