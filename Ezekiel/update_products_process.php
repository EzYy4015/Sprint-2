<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 2"/>
	<meta name="keywords" content="ProductnDiscussions"/>
	<meta name="author" content="Ezekiel Ling"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style/style_adminbooking.css">
	<!-- Font Awesome (Icon) -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Cacti Succulents - Update Product</title>

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
                $prodID = $_POST['prodID'];
                $prodTitle = $_POST['aprodTitle'];
                $prodDesc = $_POST['aprodDesc'];
                $prodImage = $_POST['aImage'];
                $prodVisible = $_POST['visibility'];

                $updateProd = "UPDATE products
                                SET prodTitle = '$prodTitle',
                                    prodDesc = '$prodDesc',
                                    prodImage = '$prodImage',
                                    prodVisible = '$prodVisible'
                                WHERE prodID = $prodID";
                
                echo "<p>Note that only the 5 products will be shown in the page if there are more than 5 products set to visible.</p>";
                mysqli_query($con, $updateProd);
                
            ?>

            <a class = "return" href = "manage-products_n_discussions.php">Return to Products_n_Discussions Page</a>
        </div> 
    </div>

</body>

</html>