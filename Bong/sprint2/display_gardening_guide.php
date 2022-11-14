<?php
include("include/connection.php");

if(!empty($_GET['search_guide'])){
    $search_input=$_GET['search_guide'];
    $search_input_compact= preg_replace('/\s+/', '', $search_input);
    $query = "SELECT guideTitle, guideDesc, guideDateCreated from guides WHERE guideVisible=1 AND CONCAT(REPLACE(guideTitle, ' ', '')) LIKE '%$search_input_compact%' ORDER BY guideDateCreated DESC";
    $result = mysqli_query($con, $query);
}

else{
    $query = "SELECT guideTitle, guideDesc, guideDateCreated from guides WHERE guideVisible=1 ORDER BY guideDateCreated DESC";
    $result = mysqli_query($con, $query);
}

echo "<div class='guide_container'>";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo"<div class=single_guide_container>";
        echo"<div class='guide_title'>";
        echo"<h2>";
        echo $row["guideTitle"];
        echo"</h2>";
        echo"</div>";

        echo"<div class='guide_date_created'>";
        echo"Date added: ";
        echo $row["guideDateCreated"];
        echo"</div>";

        echo"<div class='guide_desc'>";
        echo $row["guideDesc"];
        echo"</div>";
        echo"</div>";
    }
}


else{
    echo"<div class=result>Currently no gardening guide available</div>";
}

echo"</div>";
?>