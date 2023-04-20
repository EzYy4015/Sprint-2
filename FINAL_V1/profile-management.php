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
            $username = $_POST['username'];
            $email = $_POST['email'];
            $dob = $_POST['birthday'];
            if(isset($_POST['notif'])){
                $notif = 1;
            } else {
                $notif = 0;
            }

            $checkemail = "SELECT * FROM accounts WHERE accEmail = '$email' AND NOT accID = '$userid'";
            $checkname = "SELECT * FROM accounts WHERE accName = '$username' AND NOT accID = '$userid'";
            $querycheckemail = mysqli_query($con, $checkemail);
            $querycheckname = mysqli_query($con, $checkname);

            if(mysqli_num_rows($querycheckemail) == 0){
                if(mysqli_num_rows($querycheckname) == 0){
                    $update = "UPDATE accounts SET accName ='$username', accEmail = '$email', accAge = '$dob', accNotifEnabled = '$notif' WHERE accID = '$userid'";
                    mysqli_query($con, $update);
                    echo "<script>alert('Information updated successfully. Please allow up to 5 seconds to view the update.')</script>";
                    header( "refresh:2;url=profile-management.php");
                }
            }

            if(mysqli_num_rows($querycheckemail) > 0){
                echo "<script>alert('There's current another account using this email.')</script>";
            }

            if(mysqli_num_rows($querycheckname) > 0){
                "<script>alert('There's current another account using this username.')</script>";
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
            <div class="profile-container-right">
                <div class="profile-container-right-ileft">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="profile-container-right-iright">
                    <h1>Your Profile</h1>
                    <div class="profile-container-right-iright-contents">
                        <form id="form" method="POST">
                            <table class="profile-m">
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                </tr>

                                <tr>
                                    <td><input type = "text" id = "username" name = "username" value = "<?php echo $fetchresults['accName']; ?>" required = "required"></td>
                                    <td><input type = "text" id = "email" name = "email" value = "<?php echo $fetchresults['accEmail']; ?>" required = "required"></td>
                                </tr>   
                                <tr>
                                    <th class>Birthday</th>
                                    <th class>Date Created</th>
                                </tr>

                                <tr>
                                    <td><input type = "date" id = "birthday" name = "birthday" value = "<?php echo $fetchresults['accAge']; ?>" required = "required"></td>
                                    <td><input type = "text" id = "acc-created" name = "acc-created" value = "<?php echo $fetchresults['accDateRegistered']; ?>" required = "required" disabled></td>
                                </tr>  

                                <tr>
                                    <th class>Notifications Enabled</th>
                                </tr>

                                <tr class="profile-m-notif">
                                    <td><input type = "checkbox" id = "notif" name = "notif" <?php if($fetchresults['accNotifEnabled'] == '1'){ echo 'checked'; }?>><label for="notif">I would like to receive notifications.</label></td>
                                </tr>  
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