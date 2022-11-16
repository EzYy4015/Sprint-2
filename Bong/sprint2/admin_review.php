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
    <link rel="stylesheet" href="style/admin_review.css">
</head>

<body>

    <?php
        include("include/navigation.php"); 
        include("include/functions.php");
        check_userlogin();
    ?>
    <div class="mainbody">
        <div class = "container">
            <div class="review_filter_container">
                <form action="" method="GET" onsubmit="return validateReviewFilter()">
                    <div class="range_filter">
                        <div class="review_filter">
                            <label for="people">Choose a range:</label>
                            <select class="filter_variations" name="filter_variations" id="filter_variations">
                                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==4){ echo "selected='selected'"; } ?> value=4 >All</option>
                                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==1){ echo "selected='selected'"; } ?> value=1>Users</option>
                                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==2){ echo "selected='selected'"; } ?> value=2>Admins</option>
                                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==3){ echo "selected='selected'"; } ?> value=3>Myself</option>
                            </select>
                        </div>

                        <div class="review_filter">
                            <label for="visibility">Visibility:</label>
                            <select class="filter_visibility" name="filter_visibility" id="filter_visibility">
                                <option <?php if(isset($_GET['filter_visibility'])&&$_GET['filter_visibility']==2){ echo "selected='selected'"; } ?> value=2 >All</option>
                                <option <?php if(isset($_GET['filter_visibility'])&&$_GET['filter_visibility']==1){ echo "selected='selected'"; } ?> value=1>Showing</option>
                                <option <?php if(isset($_GET['filter_visibility'])&&$_GET['filter_visibility']==0){ echo "selected='selected'"; } ?> value=0>Hiden</option>
                            </select>
                        </div>
                    </div>

                    <fieldset class="review_date_filter">
                        <legend>Optional</legend>
                        <div class="review_filter">
                            <label>From Date:</label>
                            <input type="date" class="review_filter_date" name="review_from_date" id="review_from_date" value="<?php if(isset($_GET['review_from_date'])){ echo $_GET['review_from_date']; } ?>">
                        </div>
                    
                        <div class="review_filter">
                            <label>To Date:</label>
                            <input type="date" class="review_filter_date" name="review_to_date" id="review_to_date" value="<?php if(isset($_GET['review_to_date'])){ echo $_GET['review_to_date']; } ?>">
                        </div>
                    </fieldset>

                    <div class="review_form_buttons">
                        <div class="review_filter">
                            <button type="submit" class="filter_review" id="filter_review_button">Filter</button>
                            <a class="reset_review" href="reset_review_filter.php">Reset</a>
                            
                        </div>
                    </div>
                </form>
            </div>

            <div class="add_container">
                <a href = "#" id = "add_btn" class = "add_btn"><i class="fa-solid fa-pen"></i>&nbsp; Write a review</a>
            </div>  
        
            <div class="bg-modal">
                <div class="add_rating">
                    <div class="rating_container">
                        <div class="close">+</div>
                        <form class = "form" action = "add_review_process.php" method = "post" onsubmit = "return validateReview()">
                            <!-- Rating -->
                            <div class="star_widget">
                                <input type = "radio" name = "star" id = "star5" value = "5"><label for = "star5" class = "fas fa-star"></label>
                                <input type = "radio" name = "star" id = "star4" value = "4"><label for = "star4" class = "fas fa-star"></label>
                                <input type = "radio" name = "star" id = "star2" value = "3"><label for = "star2" class = "fas fa-star"></label>
                                <input type = "radio" name = "star" id = "star3" value = "2"><label for = "star3" class = "fas fa-star"></label>
                                <input type = "radio" name = "star" id = "star1" value = "1"><label for = "star1" class = "fas fa-star"></label>
                            </div>

                            <!-- Review -->
                            <div class="textarea">
                                <textarea id = "comment" name = "comment" placeholder = "Describe your experience..."></textarea>
                            </div>
                            
                            <div class="post_btn">
                                <input type = "submit" value = "Post">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            
            <?php include("include/display_review.php");?>
            <script src="script/admin_review.js"></script>

        </div>

        <?php include("include/footer.php");?>
    </div>
</body>
</html>
