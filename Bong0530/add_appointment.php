<?php
    include("test_connection.php");

    date_default_timezone_set('Asia/Kuala_Lumpur');
    $time_now=date('Y-m-d H:i:s');

    $bookingDate=$_GET['bdate'];
    $bookingTime=$_GET['btime'];
    $bookingID=$_GET['bID'];
    $accID=$_GET['userID'];
    
    $query ="UPDATE bookings set bookingAvailSlots=bookingAvailSlots-1 WHERE bookingID = '$bookingID';";
    $query.="INSERT INTO acc_bookings (accID,bookingID,bookingStatus,bookingCompleted) VALUES ($accID,$bookingID,1,0) ON DUPLICATE KEY UPDATE bookingStatus=1";
   
    $bookingDateTime = date('Y-m-d H:i:s',strtotime('-2 hours',strtotime("$bookingDate $bookingTime")));
    
    if($bookingDateTime>=$time_now){
        $data = mysqli_multi_query($conn,$query);
        echo nl2br("Appointment added successfully. \nPage will be redirected after 2 seconds");
    }
    else{
        echo nl2br("Appointment added failed. \nPage will be redirected after 2 seconds");
    }

    header( "refresh:2;url=booking.php");
    mysqli_close($conn);
?>