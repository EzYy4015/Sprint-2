<?php
    include("include/connection.php");

    date_default_timezone_set('Asia/Kuala_Lumpur');
    $time_now=date('Y-m-d H:i:s');

    $bookingDate=$_GET['bdate'];
    $bookingTime=$_GET['btime'];
    $bookingID=$_GET['bID'];
    $accID=$_GET['acID'];
    
    $query="DELETE FROM acc_bookings WHERE bookingID = '$bookingID' AND accID='$accID';";
    $query .="UPDATE bookings set bookingAvailSlots=bookingAvailSlots+1 WHERE bookingID = '$bookingID';";

    $bookingDateTime = date('Y-m-d H:i:s',strtotime('-2 hours',strtotime("$bookingDate $bookingTime")));
    
    if($bookingDateTime>=$time_now){
        $data = mysqli_multi_query($con,$query);
        echo nl2br("Appointment cancellation succeed. \nPage will be redirected after 2 seconds");
        
        //Notification part
        include ("include/bookingCancellation.php");
        getData($accID, $bookingID);
    }
    else{
        echo nl2br("Appointment cancellation failed. \nPage will be redirected after 2 seconds");
    }

    header( "refresh:2;url=booking.php");
    mysqli_close($con);
?>