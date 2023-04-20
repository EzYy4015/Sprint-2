<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 1"/>
	<meta name="keywords" content="Admin Booking"/>
	<meta name="author" content="Cornelius Lee Jun Teng"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style/style_adminbooking.css">
	<!-- Font Awesome (Icon) -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Cacti Succulents - Add Banner</title>

    <!-- Font Type -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <?php 
        include ("include/navbar-management.php"); 
        include ('include/connection.php');  
        include("include/functions.php");
        check_login();
    ?>

    <script src = "script/side_bar.js"></script>

    <div class = "container">
        <div class="inner_container">
            <h1>Result</h1>
            <?php
                $bannerDuration = $_POST['date-until'];
                $bannerImage = $_POST['banner-image'];
                $bannerVisible = $_POST['visibility'];
                $bannerAddedBy = $_SESSION['userid'];

                $check = mysqli_query($con, "SELECT * FROM banners WHERE bannerVisible = 1");
                $check_rows = mysqli_num_rows($check);

                $updateBanner = "INSERT INTO banners(bannerDuration, bannerImage, bannerVisible, bannerAddedBy)
                                VALUES ('$bannerDuration', '$bannerImage','$bannerVisible', '$bannerAddedBy')";
                
                // Update booking slot from booking table
                if($check_rows > 0 && $bannerVisible == 1){
                    echo "<p>There is currently another banner that is visible. Overriding the current banner with the updated banner... </p>";
                    $changeBannerVisibility = "UPDATE banners SET bannerVisible = '0' WHERE bannerVisible = '1'";
                    mysqli_query($con, $changeBannerVisibility);
                    mysqli_query($con, $updateBanner);
                    
                } else{
                    echo "<p class = 'success'>Banner has been added successfully!</p>";
                    mysqli_query($con, $updateBanner);
                }
                mysqli_close($con)
            ?>

            <a class = "return" href = "manage-banners.php">Return to Banner Page</a>
        </div> 
    </div>

</body>

</html>