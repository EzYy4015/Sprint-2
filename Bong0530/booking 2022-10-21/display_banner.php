<?php
    $username="JingHong";
    $banner="SELECT bannerImage FROM banners";
    $result = mysqli_query($conn, $banner);

    if (mysqli_num_rows($result) > 0) {
        echo "<table id='testing'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo 
            
            "<div>" . $row["bannerImage"] . "</div>";
        }  
        echo "</table>";
    }
    else{
        echo "<p>No Appointment Record Found.</p>";
    }


?>