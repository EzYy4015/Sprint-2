<?php
    include("test_connection.php");

    date_default_timezone_set('Asia/Kuala_Lumpur');
    $time_now= date("H:i:s");
    $date_now= date("Y-m-d");

    $bookingID=$_GET['bID'];
    $accID=$_GET['userID'];
    $query="INSERT INTO acc_bookings (accID,bookingID,bookingStatus,bookingCompleted) VALUES ($accID,$bookingID,1,1);";
    $query .="UPDATE bookings set bookingAvailSlots=bookingAvailSlots-1 WHERE bookingID = '$bookingID'";

    $data = mysqli_multi_query($conn,$query);

    if($data){
        echo nl2br("Appointment added successfully. \nPage will be redirected after 5 seconds");
    }
    else{
        echo nl2br("Appointment added failed. \nPage will be redirected after 5 seconds");
    }

    header( "refresh:5;url=calendar.php");

?>