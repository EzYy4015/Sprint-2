<?php
    $username="JingHong";
    $banner="SELECT * FROM banners";
    $result = mysqli_query($conn, $banner);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='edit_banner_table'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo 
            "<tr>
                <th>Banner ID</th>
                <th>Banner Content</th>
                <th>Banner Date Created</th>
                <th>Banner Valid Duration</th>
                <th>Banner Visible</th>
                <th>Banner Added By</th>
            </tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo 
            "<tr>
            <td>" . $row["bannerID"] . "</td>
            <td>" . $row["bannerImage"] . "</td>
            <td>" . $row["bannerDateCreated"] . "</td>
            <td>" . $row["bannerDuration"] . "</td>
            <td>" . $row["bannerVisible"] . "</td>
            <td>" . $row["bannerAddedBy"] . "</td>
            <td><a href='update_banner.php?bannerID=$row[bannerID]&bannerImage=$row[bannerImage]&bannerDateCreated=$row[bannerDateCreated]&bannerDuration=$row[bannerDuration]&bannerVisible=$row[bannerVisible]'>Update It</td>
            </tr>";
        }  
        echo "</table>";
    }
}
    else{
        echo "<p>No Appointment Record Found.</p>";
    }


?>