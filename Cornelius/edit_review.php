<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Cacti Succulent - Reviews </title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script/script.js"></script>
    <link rel="stylesheet" href="style/style_visreview.css">
</head>

<body>

    <?php 
        include("include/navigation.php"); 
        include("include/functions.php");
    ?>

    <?php
        $reviewID = $_GET['rID'];
        $reviewRating = $_GET['rRating'];
        $reviewComment = $_GET['rComment'];
    ?>

    <div class = "mainbody">

        <div class="add_rating">
            <div class="rating_container">
                <form class = "form" action = "edit_review_process.php" method = "post" onsubmit = "return validateReview()">
                    <input type = "hidden" id = "rID" name = "rID" value = "<?php echo $reviewID ?>">
                    
                    <!-- Rating -->
                    <div class="star_widget">
                        <input type = "radio" name = "star" id = "star5" value = "5" <?php if($reviewRating == 5){ echo "checked = 'checked'";} ?>><label for = "star5" class = "fas fa-star"></label>
                        <input type = "radio" name = "star" id = "star4" value = "4" <?php if($reviewRating == 4){ echo "checked = 'checked'";} ?>><label for = "star4" class = "fas fa-star"></label>
                        <input type = "radio" name = "star" id = "star2" value = "3" <?php if($reviewRating == 3){ echo "checked = 'checked'";} ?>><label for = "star2" class = "fas fa-star"></label>
                        <input type = "radio" name = "star" id = "star3" value = "2" <?php if($reviewRating == 2){ echo "checked = 'checked'";} ?>><label for = "star3" class = "fas fa-star"></label>
                        <input type = "radio" name = "star" id = "star1" value = "1" <?php if($reviewRating == 1){ echo "checked = 'checked'";} ?>><label for = "star1" class = "fas fa-star"></label>
                    </div>

                    <!-- Review -->
                    <div class="textarea">
                        <textarea id = "comment" name = "comment" placeholder = "Describe your experience..."><?php echo $reviewComment; ?></textarea>
                    </div>
                    
                    <div class="post_btn">
                        <input type = "submit" value = "Post">
                    </div>
                    
                </form>
            </div>
        </div>

        <script src = 'script/review.js'></script>   

        <?php include("include/footer.php"); ?>
    </div>

</body>

