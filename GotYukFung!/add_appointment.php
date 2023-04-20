<?php
    include("include/connection.php");

    date_default_timezone_set('Asia/Kuala_Lumpur');
    $time_now=date('Y-m-d H:i:s');

    $bookingDate=$_GET['bdate'];
    $bookingTime=$_GET['btime'];
    $bookingID=$_GET['bID'];
    $accID=$_GET['userID'];
    
    if(@$_GET['update'] == 1)
    {
        $isUpdate = 1;
        //$isUpdate = @$GET['update']==11
    }else{
        $isUpdate = 0;
    }
   
    
    $query ="UPDATE bookings set bookingAvailSlots=bookingAvailSlots-1 WHERE bookingID = '$bookingID';";
    $query.="INSERT INTO acc_bookings (accID,bookingID,bookingStatus,bookingCompleted) VALUES ($accID,$bookingID,1,0) ON DUPLICATE KEY UPDATE bookingStatus=1";
   
    $bookingDateTime = date('Y-m-d H:i:s',strtotime('-2 hours',strtotime("$bookingDate $bookingTime")));
    
    if($bookingDateTime>=$time_now){
        $data = mysqli_multi_query($con,$query);
        echo nl2br("Appointment added successfully. \nPage will be redirected after 2 seconds");

        //Notification part
        include("include/bookingNotification.php"); 
        getDataVisitor($accID,$bookingID);

        if ($isUpdate) {
            include("include/bookingUpdate.php"); 
            bookingUpdateVisitor($accID,$bookingID);
        }
    }
    else{
        echo nl2br("Appointment added failed. \nPage will be redirected after 2 seconds");
    }

    header( "refresh:2;url=booking.php");
    mysqli_close($con);
?>