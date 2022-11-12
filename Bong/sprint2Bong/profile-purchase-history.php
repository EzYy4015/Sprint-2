<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent - Purchase History </title>
<link rel="stylesheet" type="text/css" href="style/style-profile2.css"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="script/script.js"></script>

</head>
<body>

    <?php 
    
        include("include/navigation.php"); 
        include("include/connection.php");
        include("include/functions.php");
      
        check_userlogin();

        $userid = $_SESSION['userid'];
    
        $searchquery = "SELECT p.prodTitle, ap.prodPurchaseDate FROM products p JOIN acc_purchasehistory ap ON p.prodID = ap.prodID WHERE accID = '$userid' ORDER BY ap.prodPurchaseDate DESC";
        $fetchquery = mysqli_query($con, $searchquery);
    
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
                    <h1>Your Purchase History</h1>
                    <div class="profile-container-right-iright-contents-type2">
                            <?php 
                            if (mysqli_num_rows($fetchquery) > 0){
                                echo '
                                <table class="profile-phistory">
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Purchase Date</th>
                                    </tr>
                                ';
                                while($fetchresults = mysqli_fetch_array($fetchquery)){
                                    echo "<tr><td>" . $fetchresults['prodTitle'] . "</td>";
                                    echo "<td>" . $fetchresults['prodPurchaseDate'] . "</td></tr>";
                                };
                                echo "</table>";
                            } else {
                                echo "You have not bought anything.";
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>




        <?php include("include/footer.php"); ?>
    </div>


    
</body>
</html>