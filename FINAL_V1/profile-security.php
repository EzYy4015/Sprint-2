<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent - Profile Management </title>
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
    
        $searchquery = "SELECT * FROM accounts WHERE accID = '$userid'";
        $fetchquery = mysqli_query($con, $searchquery);
        $fetchresults = mysqli_fetch_array($fetchquery);

        if(isset($_POST['Save'])){
            $phone = $_POST['phone'];

            $update = "UPDATE accounts SET accPhoneNo = '$phone' WHERE accID = '$userid'";
            mysqli_query($con, $update);
            echo "<script>alert('Information updated successfully. Please allow up to 5 seconds to view the update.')</script>";
            header( "refresh:2;url=profile-security.php");

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
            <div class="profile-container-right">
                <div class="profile-container-right-ileft">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="profile-container-right-iright">
                    <h1>Security Details</h1>
                    <div class="profile-container-right-iright-contents">
                        <form id="form" method="POST">
                            <table class="profile-m">
                                <tr>
                                    <th class="profile-m-c1">Password <a href="profile-edit-password.php"><i class="fa fa-edit"></i></a></th>
                                    <th class="profile-m-c2">Phone Number</th>
                                </tr>

                                <tr>
                                    <td><input type = "password" id = "password" name = "password" value = "<?php echo $fetchresults['accPassword']; ?>" required = "required" disabled></td>
                                    <td><input type = "text" id = "phone" name = "phone" value = "<?php echo $fetchresults['accPhoneNo']; ?>" required = "required"></td>
                                </tr>   
                                <tr>
                            </table>
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