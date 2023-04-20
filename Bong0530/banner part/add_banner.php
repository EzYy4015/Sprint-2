<?php
        include("test_connection.php");
        
        $username="JingHong";
        $banner = $_POST['banner'];
        $visibility = $_POST['visibility'];
        $valid_date = $_POST['valid_date'];
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time_now= date("Y-m-d H:i:s");

        $query2 = "SELECT accID FROM accounts WHERE accNAME='$username'";
        $result2 = mysqli_query($conn, $query2);

        if(mysqli_num_rows($result2) > 0){
            while ($row= mysqli_fetch_assoc($result2)) {
                $userID=$row["accID"];
            }  
        }

        $query="INSERT INTO banners (bannerImage,bannerDateCreated,bannerDuration,bannerVisible,bannerAddedBy) VALUES ('$banner','$time_now','$valid_date','$visibility',$userID)";
        $result = mysqli_query($conn, $query);

        if($result){
            echo nl2br("Banner added successfully. \nPage will be redirected after 2 seconds");
        }
        else{
            echo nl2br("Banner added failed. \nPage will be redirected after 2 seconds");
        }
        header( "refresh:2;url=banner.php");
        mysqli_close($conn);
?>