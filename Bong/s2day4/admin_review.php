<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="style/review.css">
<title> Cacti Succulent - Bookings </title>

</head>
<body>
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

    <div class="review_container">
        <h2 class="review_title">Reviews</h2>
        <?php include("display_review.php");?>
    </div>

    <script src="review_action.js"></script>

</body>
</html>
