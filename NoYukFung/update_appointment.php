<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title> Cacti Succulent Kuching </title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="script/script.js"></script>
        <link rel="stylesheet" href="style/style_visbooking.css">
    </head>
        
    <body>
        <div class="slot_container">
            <fieldset class="slot_fieldset">
                <legend>Update Appointment</legend>
        
                <?php
                    session_start();
                    include("include/connection.php");
                    include("include/functions.php");
                    check_userlogin();
                    date_default_timezone_set('Asia/Kuala_Lumpur');
                    $time_now=date('Y-m-d H:i:s');
                    
                    $bookingDate=$_GET['bdate'];
                    $bookingTime=$_GET['btime'];
                    $bookingID=$_GET['bID'];
                    $accID=$_GET['acID'];
                
                    $query1 ="UPDATE bookings SET bookingAvailSlots=bookingAvailSlots+1 WHERE bookingID = '$bookingID';";
                    $query1.="DELETE FROM acc_bookings WHERE bookingID=$bookingID AND accID=$accID ";
                    
                    $bookingDateTime = date('Y-m-d H:i:s',strtotime('-2 hours',strtotime("$bookingDate $bookingTime")));
                    
                    
                    if($bookingDateTime>=$time_now){
                        
                        while(mysqli_next_result($con)){;}
                        
                        $userID=$_SESSION["userID"];

                        $query = "SELECT bookingID, bookingDate, bookingTime,bookingAvailSlots FROM bookings WHERE bookingID NOT IN (SELECT bookingID FROM acc_bookings 
                        WHERE accID='$userID' AND bookingStatus=1) AND bookingVisible=1 AND bookingDate='$bookingDate'";
                        $result = mysqli_query($con, $query);
                
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='slot_table'>";
                            echo 
                            "<tr>
                                <th class='start_th'>Booking ID</th>
                                <th>Booking Date</th>
                                <th>Booking Time</th>
                                <th>Remaining Slot</th>
                                <th class='end_th'>Change It</th>
                            </tr>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo 
                                "<tr>
                                <td>" . $row["bookingID"] . "</td>
                                <td>" . $row["bookingDate"] . "</td>
                                <td>" . $row["bookingTime"] . "</td>
                                <td>" . $row["bookingAvailSlots"] . "</td>
                                <td><a class='booking_buttons' href='add_appointment.php?bID=$row[bookingID]&userID=$userID&btime=$row[bookingTime]&bdate=$row[bookingDate]'>Get</td>
                                </tr>";
                            } 
                            echo "</table>";
                            $data = mysqli_multi_query($con,$query1);
                        } 
                        
                        else{
                            echo "<div class='result'>No other available booking slot for that day. \nPage will be redirected after 2 seconds</div>";
                            header( "refresh:2;url=booking.php");
                        }
                        
                    }
                    mysqli_close($con);
                ?>
            </fieldset>
        </div>
    </body>
</html>