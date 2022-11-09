<?php
    include("connection.php");
    if(isset($_GET['filter_variations']) && isset($_GET['filter_visibility'])){
        $accID=1;
        $filter_variations = $_GET['filter_variations'];
        $filter_visibility = $_GET['filter_visibility'];
        
        if(!empty($_GET['review_from_date']) && !empty($_GET['review_to_date'])){
            echo"not empty";
            $review_from_date = $_GET['review_from_date'];
            $review_to_date = $_GET['review_to_date'];
            if($filter_variations==1 ||$filter_variations==2){
                if($filter_visibility!=2){
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$review_from_date' 
                    AND '$review_to_date' AND accounts.accAccess='$filter_variations' AND reviews.reviewVisible='$filter_visibility' ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
                else{
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$review_from_date' 
                    AND '$review_to_date' AND accounts.accAccess='$filter_variations' ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
            }
            else if($filter_variations==4){
                if($filter_visibility==2){
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$review_from_date' 
                    AND '$review_to_date' ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
                else{
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$review_from_date' 
                    AND '$review_to_date' AND reviews.reviewVisible='$filter_visibility' ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
            }

            else {
                if($filter_visibility==2){
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$review_from_date' 
                    AND '$review_to_date' AND accounts.accID='$accID' ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
                else{
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$review_from_date' 
                    AND '$review_to_date' AND accounts.accID='$accID' AND reviews.reviewVisible='$filter_visibility' ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
            }
        }

        else if(empty($_GET['review_from_date']) && empty($_GET['review_to_date'])){
            if($filter_variations==1 ||$filter_variations==2){
                if($filter_visibility!=2){
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE accounts.accAccess='$filter_variations' AND reviews.reviewVisible='$filter_visibility' ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
                else{
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE accounts.accAccess='$filter_variations' ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
            }
            else if($filter_variations==4){
                if($filter_visibility==2){
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
                else{
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewVisible='$filter_visibility' ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
            }

            else {
                if($filter_visibility==2){
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE accounts.accID='$accID' ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
                else{
                    $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE accounts.accID='$accID' AND reviews.reviewVisible='$filter_visibility' ORDER BY reviewDate DESC";
                    $result = mysqli_query($con, $query);
                }
            }
        }

        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='user_review'>";

                echo "<div class='review_user_name'>";
                echo $row["accName"];
                echo "</div>";

                echo "<div class='review_date'>";
                echo $row["reviewDate"];
                echo "</div>";

                echo "<div class='review_comment'>";
                echo $row["reviewComment"];
                echo "</div>";

                echo "<div class='review_buttons'>";
                if($row["reviewVisible"]==1){
                    echo"<a class='review_buttons' href= 'change_review_visibility.php?rID=$row[reviewID]'>Hide</a>";
                }
                else{
                    echo"<a class='review_buttons' href= 'change_review_visibility.php?rID=$row[reviewID]'>Show</a>";
                }
                echo"<a class='review_buttons' href= 'delete_review.php?rID=$row[reviewID]'>Delete</a>";
                echo "</div>";

                echo "</div>";
            }
        }
    }

    else{
        $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID ORDER BY reviewDate DESC";
        $result = mysqli_query($con, $query);
        
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='user_review'>";

                echo "<div class='review_user_name'>";
                echo $row["accName"];
                echo "</div>";

                echo "<div class='review_date'>";
                echo $row["reviewDate"];
                echo "</div>";

                echo "<div class='review_comment'>";
                echo $row["reviewComment"];
                echo "</div>";

                echo "<div class='review_buttons'>";
                if($row["reviewVisible"]==1){
                    echo"<a class='review_buttons' href= 'change_review_visibility.php?rID=$row[reviewID]'>Hide</a>";
                }
                else{
                    echo"<a class='review_buttons' href= 'change_review_visibility.php?rID=$row[reviewID]'>Show</a>";
                }
                echo"<a class='review_buttons' href= 'delete_review.php?rID=$row[reviewID]'>Delete</a>";
                echo "</div>";

                echo "</div>";
            }
        }
    }

?>