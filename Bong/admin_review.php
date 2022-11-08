<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent - Bookings </title>

</head>
<body>
    <div class="review_filter_container">
        <form action="" method="GET" onsubmit="">
            <div class="review_filter">
                <label>From Date</label>
                <input type="date" name="filter_from_date" id="filter_from_date" value="<?php if(isset($_GET['filter_from_date'])){ echo $_GET['filter_from_date']; } ?>">
            </div>
        
            <div class="review_filter">
                <label>To Date</label>
                <input type="date" name="filter_to_date" id="filter_to_date" value="<?php if(isset($_GET['filter_to_date'])){ echo $_GET['filter_to_date']; } ?>">
            </div>
        
            <div class="review_filter">
                <button type="submit" class="filter_slot" id="filter_button">Filter</button>
            </div>

            <label for="people">Choose a range:</label>
            <select name="filter_variations" name="filter_variations" id="filter_variations">
                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==4){ echo "selected='selected'"; } ?> value=4 >All</option>
                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==1){ echo "selected='selected'"; } ?> value=1>Users</option>
                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==2){ echo "selected='selected'"; } ?> value=2>Admins</option>
                <option <?php if(isset($_GET['filter_variations'])&&$_GET['filter_variations']==3){ echo "selected='selected'"; } ?> value=3>Myself</option>
            </select>
        </form>
    </div>
<?php include("display_review.php");?>


</body>
</html>
