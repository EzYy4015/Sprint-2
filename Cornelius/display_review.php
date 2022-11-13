<?php
    include("include/connection.php");
    if(isset($_GET['filter_variations'])){
        $accID=$_SESSION['userid'];
        $filter_variations = $_GET['filter_variations'];
    
        if(!empty($_GET['review_from_date']) && !empty($_GET['review_to_date'])){
            echo"not empty";
            $review_from_date = $_GET['review_from_date'];
            $review_to_date = $_GET['review_to_date'];
            if($filter_variations==1 ||$filter_variations==2){
                $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$review_from_date' 
                AND '$review_to_date' AND accounts.accAccess='$filter_variations' AND reviews.reviewVisible='1' ORDER BY reviewDate DESC";
                $result = mysqli_query($con, $query);
            }
            else if($filter_variations==4){
                $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$review_from_date' 
                AND '$review_to_date' AND reviews.reviewVisible='1' ORDER BY reviewDate DESC";
                $result = mysqli_query($con, $query);
            }

            else {
                $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewDate BETWEEN '$review_from_date' 
                AND '$review_to_date' AND accounts.accID='$accID' AND reviews.reviewVisible='1' ORDER BY reviewDate DESC";
                $result = mysqli_query($con, $query);
            }
        }

        else if(empty($_GET['review_from_date']) && empty($_GET['review_to_date'])){
            if($filter_variations==1 ||$filter_variations==2){
                $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE accounts.accAccess='$filter_variations' AND reviews.reviewVisible='1' ORDER BY reviewDate DESC";
                $result = mysqli_query($con, $query);
            }
            else if($filter_variations==4){
                $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE reviews.reviewVisible='1' ORDER BY reviewDate DESC";
                $result = mysqli_query($con, $query);
            }

            else {
                $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID WHERE accounts.accID='$accID' AND reviews.reviewVisible='1' ORDER BY reviewDate DESC";
                $result = mysqli_query($con, $query);
            }
        }

        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='user_review'>";

                    echo "<div class = 'row1'>";
                        echo "<div class='review_user_name'>";
                            echo "<p>" . $row["accName"] . "</p>";
                        echo "</div>";

                        echo "<div class = 'action'>";
                            echo "<a onclick = 'return confirmDeleteReview()' class = 'delete_button' href = 'delete_review_process.php?rID=$row[reviewID]'><i class='fa-solid fa-trash'></i></a>";
                            echo "<a class = 'edit_button' href = 'edit_review.php?rID=$row[reviewID]&rRating=$row[reviewRating]&rComment=$row[reviewComment]'><i class='fa-regular fa-pen-to-square'></i></a>";
                        echo "</div>";
                    echo "</div>";

                    echo "<div class='review_comment'>";
                        echo "<p>" . $row["reviewComment"] . "</p>";
                    echo "</div>";

                    echo "<div class = 'review_rating'>";
                    
                        // for loop to loop through the star rating
                        for($i = 1; $i <= 5; $i++){
                            if($i < $row["reviewRating"]){
                                echo "<span class='fa fa-star' style = 'color: orange;'></span>";    
                            }
                            else{
                                echo "<span class='fa fa-star'></span>";
                            }
                        }

                    echo "</div>";

                    echo "<div class='review_date'>";
                    echo $row["reviewDate"];
                    echo "</div>";

                echo "</div>";
            }
        }

        else{
            echo "<div class='result'>";
            echo 'No Reviews Found';
            echo "</div>";
        }
    }

    else{
        $query= "SELECT * FROM reviews LEFT JOIN accounts on reviews.reviewAccID=accounts.accID ORDER BY reviewDate DESC";
        $result = mysqli_query($con, $query);
        
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='user_review'>";

                    echo "<div class = 'row1'>";
                        echo "<div class='review_user_name'>";
                            echo "<p>" . $row["accName"] . "</p>";
                        echo "</div>";

                        echo "<div class = 'action'>";
                            echo "<a onclick = 'return confirmDeleteReview()' class = 'delete_button' href = 'delete_review_process.php?rID=$row[reviewID]'><i class='fa-solid fa-trash'></i></a>";
                            echo "<a class = 'edit_button' href = 'edit_review.php?rID=$row[reviewID]&rRating=$row[reviewRating]&rComment=$row[reviewComment]'><i class='fa-regular fa-pen-to-square'></i></a>";
                        echo "</div>";
                    echo "</div>";

                    echo "<div class='review_comment'>";
                        echo "<p>" . $row["reviewComment"] . "</p>";
                    echo "</div>";

                    echo "<div class = 'review_rating'>";
                    
                        // for loop to loop through the star rating
                        for($i = 1; $i <= 5; $i++){
                            if($i > $row["reviewRating"]){
                                echo "<span class='fa fa-star'></span>";
                            }
                            else{
                                echo "<span class='fa fa-star checked'></span>";
                            }
                        }

                    echo "</div>";

                    echo "<div class='review_date'>";
                    echo $row["reviewDate"];
                    echo "</div>";

                echo "</div>";
            }
        }

        else{
            echo "<div class='result'>";
            echo 'No Reviews Found';
            echo "</div>";
        }
    }

?>