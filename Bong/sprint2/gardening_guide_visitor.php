<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Cacti Succulent - Gardeining Guides</title>
</head>

<body>
    <div class="mainbody">
        <div class="search_guide">
            <form action="" method="GET" onsubmit="return validateSearchReview()">
                <input type="text" id="search_guide" name="search_guide" value="<?php if(isset($_GET['search_guide'])){ echo $_GET['search_guide']; } ?>" placeholder="search something...">
                <input type="submit" value="Search">
                <a class="reset_review" href="reset_review_filter.php">Reset</a>
            </form>
        </div>
    </div>
    <?php include("display_gardening_guide.php") ?>
    <script src="script/validate.js"></script>
</body>
</html>