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
      
        check_userlogin();
    ?>

    <div class = "mainbody">

        <div class = "container">

            <div class="review_filter_container">
                <form action="" method="GET" onsubmit="return validateReviewFilter()">
                    <div class="range_filter">
                        <div class="review_filter">
                            <label for="people">Filter by:</label>
                            <select class="filter_variations" name="filter_variations" id="filter_variations">
                                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==4){ echo "selected='selected'"; } ?> value=4 >All</option>
                                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==1){ echo "selected='selected'"; } ?> value=1>Users</option>
                                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==2){ echo "selected='selected'"; } ?> value=2>Admins</option>
                                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==3){ echo "selected='selected'"; } ?> value=3>Myself</option>
                            </select>
                        </div>
                    </div>

                    <fieldset class="review_date_filter">
                        <legend>Optional</legend>
                        <div class="from_date">
                            <label>From Date:</label>
                            <input type="date" class="review_filter_date" name="review_from_date" id="review_from_date" value="<?php if(isset($_GET['review_from_date'])){ echo $_GET['review_from_date']; } ?>">
                        </div>
                    
                        <div class="to_date">
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

            <?php include("display_review.php")?>
            <script src = 'script/review.js'></script>

            <h1>Add Review</h1>
            <i class="fa-solid fa-message-plus"></i>
            <form class = "form" action = "add_review_process.php" method = "post">
                <!-- Rating -->
                <label for = "rating">Rating (1-5):</label>
                <input type = "number" id = "rating" name = "rating" min = "1" max = "5">
            
                <!-- Comment -->
                <label for = "comment">Comment</label>
                <textarea name = "comment" rows = "4" cols = "50" placeholder = "Write something..."></textarea>

                <input type = "submit" value = "Submit">
            </form>
        </div>

        <?php include("include/footer.php"); ?>
    </div>

</body>

</html>