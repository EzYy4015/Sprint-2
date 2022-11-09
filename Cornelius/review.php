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

            <?php include("display_review.php")?>

            <h1>Add Review</h1>
            <!-- <i class="fa-solid fa-message-plus" aria-hidden="true"></i> -->
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