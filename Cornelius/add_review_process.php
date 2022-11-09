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
        include ('include/connection.php');  
      
        check_userlogin();
    ?>

    <div class = "mainbody">

        <?php
            date_default_timezone_set("Asia/Kuala_Lumpur"); // Set timezone to Malaysia

            $userid = $_SESSION['userid'];
            $rating = $_POST['rating'];
            $comment = $_POST['comment'];
            $date = date("Y-m-d H:i:s");

            $insert = "INSERT INTO reviews(reviewRating, reviewComment, reviewDate, reviewVisible, reviewAccID)
                        VALUES ('$rating', '$comment', '$date', 1, $userid)";

            if (mysqli_query($con, $insert)) {
                echo "<p class = 'success'>Review has been added successfully!</p>";
            }
            else{
                echo "Error: " . $insert . "<br>" . mysqli_error($con);
            }
        ?>

        <a class = "return" href = "review.php">Return to Review Page</a>
        
        <?php include("include/footer.php"); ?>
    </div>

</body>

</html>