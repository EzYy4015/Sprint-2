<?php
    include("test_connection.php");

    date_default_timezone_set('Asia/Kuala_Lumpur');
    $time_now= date("H:i:s");
    $date_now= date("Y-m-d");

    $bookingID=$_GET['bID'];
    $accID=$_GET['acID'];
    $query="DELETE FROM acc_bookings WHERE bookingID = '$bookingID' AND accID='$accID';";
    $query .="UPDATE bookings set bookingAvailSlots=bookingAvailSlots+1 WHERE bookingID = '$bookingID'";

    $data = mysqli_multi_query($conn,$query);

    if($data){
        echo nl2br("Appointment cancellation succeed. \nPage will be redirected after 5 seconds");
    }
    else{
        echo nl2br("Appointment cancellation failed. \nPage will be redirected after 5 seconds");
    }

    header( "refresh:5;url=calendar.php");

?>