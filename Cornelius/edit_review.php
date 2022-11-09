<?php
    $reviewID = $_GET['rID'];
    $reviewRating = $_GET['rRating'];
    $reviewComment = $_GET['rComment'];
?>

<form class = "form">
    <!-- Rating -->
    <label for = "rating">Rating (1-5):</label>
    <input type = "number" id = "rating" name = "rating" min = "1" max = "5" value = "<?php echo $reviewRating?>" disabled>

    <!-- Comment -->
    <label for = "comment">Comment</label>
    <textarea name = "comment" rows = "4" cols = "50" disabled><?php echo $reviewComment ?></textarea>
</form>

<h1>Edit Review</h1>
<form class = "form" action = "edit_review_process.php" method = "post">
    <input type = "hidden" id = "rID" name = "rID" value = "<?php echo $reviewID ?>">
    <!-- Rating -->
    <label for = "rating">Rating (1-5):</label>
    <input type = "number" id = "rating" name = "rating" min = "0" max = "5" value = "0">

    <!-- Comment -->
    <label for = "comment">Comment</label>
    <textarea name = "comment" rows = "4" cols = "50" placeholder = "Write something..."></textarea>

    <input type = "submit" value = "Submit">
</form>

