<?php
    include("include/connection.php");
    

    if(isset($_GET['filter_from_date']) && isset($_GET['filter_to_date'])&& isset($_GET['filter_variations'])){
        $filter_variations = $_GET['filter_variations'];
        $filter_from_date = $_GET['filter_from_date'];
        $filter_to_date = $_GET['filter_to_date'];

        if($filter_variations==1 ||$filter_variations==2){
            $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$filter_from_date' 
            AND '$filter_to_date' AND accounts.accAccess='$filter_variations'";
            $result = mysqli_query($con, $query);
        }
        else if($filter_variations==4){
            $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$filter_from_date' 
            AND '$filter_to_date'";
            $result = mysqli_query($con, $query);
        }

        else{
            $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$filter_from_date' 
            AND '$filter_to_date' AND accounts.accID=1";
            $result = mysqli_query($con, $query);
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

                echo "<div class='review_rating'>";
                echo $row["reviewRating"];
                echo "</div>";

                echo "<div class='review_comment'>";
                echo $row["reviewComment"];
                echo "</div>";

                echo "<div class='review_buttons'>";
                if($row["reviewVisible"]==1){
                    echo"<a class='review_buttons' href= 'change_review_visibility.php?rID=$row[reviewAccID]'>Hide</a>";
                }
                else{
                    echo"<a class='review_buttons' href= 'change_review_visibility.php?rID=$row[reviewAccID]'>Show</a>";
                }
                echo"<a class='review_buttons' href= 'change_review_visibility.php?rID=$row[reviewAccID]'>Delete</a>";
                echo "<a href= 'edit_review.php?rID=$row[reviewID]'>Edit</a>";
                echo "</div>";

                echo "</div>";
            }
        }
    }

    else{
        $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID";
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
                    echo"<a class='review_buttons' href= 'change_review_visibility.php?rID=$row[reviewAccID]'>Hide</a>";
                }
                else{
                    echo"<a class='review_buttons' href= 'change_review_visibility.php?rID=$row[reviewAccID]'>Show</a>";
                }
                echo"<a class='review_buttons' href= 'change_review_visibility.php?rID=$row[reviewID]'>Delete</a>";
                echo "<a href= 'edit_review.php?rID=$row[reviewID]&rRating=$row[reviewRating]&rComment=$row[reviewComment]'>Edit</a>";
                echo "</div>";

                echo "</div>";
            }
        }
    }

?>