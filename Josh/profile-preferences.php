<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent - Preferences </title>
<link rel="stylesheet" type="text/css" href="style/style-profile2.css"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<script src="script/script.js"></script>

</head>
<body>

    <?php

        include("include/navigation.php");
        include("include/connection.php");
        include("include/functions.php");

        check_userlogin();

        $userid = $_SESSION['userid'];

        $searchpreferences = "SELECT p.prodTitle, p.prodDesc FROM acc_preference ap JOIN products p ON p.prodID = ap.prodID WHERE ap.accID = '$userid'";
        $fetchresults = mysqli_query($con, $searchpreferences);

        if(isset($_POST['Save'])){

            while($storepreferences = mysqli_fetch_array($fetchresults)){
              $title = $_POST['title'];
              $desc = $_POST['desc'];
              $update = "UPDATE acc_preference ap JOIN products p ON p.prodID = ap.prodID SET p.prodTitle = '$title', p.prodDesc = '$desc' WHERE ap.accID = '$userid'";
              mysqli_query($con, $update);
              echo "<script>alert('Successfully Updated'); window.location.assign('profile-preferences.php')</script>";
            }

        }

    ?>


    <div class="mainbody">
        <!-- Your contents go in here, create a new div yah. Better use div for each section -->
        <div class="top-home-button">
            <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
        <div class="profile-main-container">
            <div class="profile-container-left">
                <?php include("include/profile-nav.php"); ?>
            </div>
            <div class="profile-container-right-type2">
                <div class="profile-container-right-iright-type2">
                    <h1>Your Favourited Products</h1>
                    <div class="profile-container-right-iright-contents-type2">
                      <form id="form" method="POST">
                            <?php
                            if (mysqli_num_rows($fetchresults) > 0){
                                echo '
                                <table class="profile-preferences">
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Product Description</th>
                                    </tr>
                                ';
                                while($storepreferences = mysqli_fetch_array($fetchresults)){
                                    echo "<tr><td><input type='text' id='title' name='title' value='" . $storepreferences['prodTitle'] . "'></td>";
                                    echo "<td><textarea id='desc' name='desc' row='10' cols='50'>" . substr($storepreferences['prodDesc'], 0, 150) . "...</textarea></td></tr>";
                                };
                                echo "</table>";
                            } else {
                                echo "You have no favorites.";
                            }
                            ?>
                            <input class="save-button" type="submit" name="Save" value="Save">
                          </form>
                    </div>
                </div>
            </div>
        </div>




        <?php include("include/footer.php"); ?>
    </div>

</body>
</html>
