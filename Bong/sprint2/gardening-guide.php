<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent</title>
<link rel="stylesheet" type="text/css" href="style/style-index.css"/>
<link rel="stylesheet" type="text/css" href="style/style-proComment.css"/>
<link rel="stylesheet" type="text/css" href="style/style-gardening-guide.css"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="script/script.js"></script>
<script src="script/validate.js"></script>

<!--  Law Yuk Fung
 Laet edit: 14/11/2022 10:50am
//include 'BookingCancellation.php';
// getData(accID, bookingID); -->


</head>
<body>

    <?php 
    include("include/navigation.php");
    include ('include/connection.php'); 
    //  include("include/functions.php");
    //  check_login();
     ?> 

    <div class="mainbody">
        <div class="search-box">
            <div class="search-container">
                <form action="" method="GET" onsubmit="return validateSearchReview()">
                    <input type="text" id="search_guide" name="search_guide" value="<?php if(isset($_GET['search_guide'])){ echo $_GET['search_guide']; } ?>" placeholder="search something...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <a class="reset_review" href="reset_gardening_search.php"><i class="fa-solid fa-arrows-rotate"></i></a>
                </form>
            </div>
        </div>

        <div class="gardening-guide-container">
            <h1> Gardening Guide </h1>
            <?php include("display_gardening_guide.php") ?>       
        </div>

        <script>expandableGuide()</script>

        <?php include("include/footer.php"); ?>
    </div>
</body>
</html>