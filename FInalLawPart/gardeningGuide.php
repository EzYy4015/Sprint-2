
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent</title>
<link rel="stylesheet" type="text/css" href="style/style-index.css"/>
<link rel="stylesheet" type="text/css" href="style/style-proComment.css"/>
<link rel="stylesheet" type="text/css" href="style/style-gardeningGuide.css"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="script/script.js"></script>


<!--  Law Yuk Fung
 Laet edit: 14/11/2022 10:50am
-->


</head>
<body>

    <?php include("include/navigation.php");
    
     include ('include/connection.php'); 


     ?> 


    <div class="mainbody">
        <!-- Your contents go in here, create a new div yah. Better use div for each section -->
        <div class="search-box">
            <div class="search-container">
                <form action="">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="promo-container">
            <h1>  
                Gardening Guide

            </h1>

            <div class="guidebox">

                <div class="guide">
                    <p>Tetsing</p>
                </div>
            </div>
            <div class="guidebox">
                <div class="guide">
                    <p>Tetsing</p>
                </div>
            </div>
            <div class="guidebox">
                <div class="guide">
                    <p>Tetsing</p>
                </div>
            </div>
            <div class="guidebox">
                <div class="guide">
                    <p>Tetsing</p>
                </div>
            </div>
            <div class="guidebox">
                <div class="guide">
                    <p>Tetsing</p>
                </div>
            </div>
            <div class="guidebox">
                <div class="guide">
                    <p>Tetsing</p>
                </div>

            </div>
            
            

                
            
        </div>





        <?php include("include/footer.php"); ?>
    </div>


    
</body>
</html>