<?php
        include("test_connection.php");
        
        $username="JingHong";
        $bannerID = $_GET['update_bannerID'];
        $bannerImage = $_GET['update_banner'];
        $bannerDuration= $_GET['update_valid_date'];
        $bannerVisible = $_GET['update_visibility'];
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time_now= date("Y-m-d H:i:s");

        $query2 = "SELECT accID FROM accounts WHERE accNAME='$username'";
        $result2 = mysqli_query($conn, $query2);

        if(mysqli_num_rows($result2) > 0){
            while ($row= mysqli_fetch_assoc($result2)) {
                $userID=$row["accID"];
            }  
        }

        $query ="UPDATE banners SET bannerImage='$bannerImage', bannerDuration='$bannerDuration', bannerVisible='$bannerVisible', bannerAddedBy='$userID', bannerDateCreated='$time_now' WHERE bannerID='$bannerID'";
        $result = mysqli_query($conn, $query);
?>