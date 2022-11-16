<?php
    include("include/connection.php");

    if(!empty($_GET['search_guide'])){

        $search_input=$_GET['search_guide'];
        $search_input_compact= preg_replace('/\s+/', '', $search_input);
        $query = "SELECT guideTitle, guideDesc, guideDateCreated from guides WHERE guideVisible=1 AND CONCAT(REPLACE(guideTitle, ' ', '')) LIKE '%$search_input_compact%' ORDER BY guideDateCreated DESC";
        $result = mysqli_query($con, $query);

        echo "<div class='guide_container'>";

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<button type="button" class="expandable">';
                echo $row["guideTitle"];
                echo '<i id="open" class="fa-solid fa-angle-down" style="float: right;"></i></button>';
                echo '<div class="guide">';
                echo '<p>';
                echo 'Date added:';
                echo $row["guideDateCreated"];
                echo '</p>';
                echo '<p>';
                echo $row["guideDesc"];
                echo '</p>';
                echo '</div>';
            }
        }

        else{
            echo"<div class=result>No review found</div>";
        }

        echo"</div>";
    }

    else{
        $query = "SELECT guideTitle, guideDesc, guideDateCreated from guides WHERE guideVisible=1 ORDER BY guideDateCreated DESC";
        $result = mysqli_query($con, $query);

        echo "<div class='guide_container'>";

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                echo '<button type="button" class="expandable">';
                echo $row["guideTitle"];
                echo '<i id="open" class="fa-solid fa-angle-down" style="float: right;"></i></button>';
                echo '<div class="guide">';
                echo '<p>';
                echo $row["guideDesc"];
                echo '</p>';
                echo '<div class="guide_added_date">';
                echo 'Date added:';
                echo $row["guideDateCreated"];
                echo '</div>';
                echo '</div>';
            }
        }

        else{
            echo"<div class=result>Curently no review available</div>";
        }

        echo"</div>";
    }


?>