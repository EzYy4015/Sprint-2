<?php
session_start();

include ('include/navigation.php'); 
include ('include/connection.php');
include ('include/functions.php');
check_userlogin();

$sql = "SELECT * FROM accounts WHERE accName='".$_SESSION['name']."'";
$sql2 = "UPDATE accounts SET accLastVisit = Now() WHERE accName='".$_SESSION['name']."'";
$result2 = mysqli_query($con, $sql2);
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href ="style/style_profilem.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="script/script.js"></script>
  </head>
  <body>

    <script>
    function myfun(){
      var a = document.getElementById("pwd").value;
      var b = document.getElementById("cpwd").valie;
      if(a!=b){
        document.getElementById("message").innerHTML="** Password Not Same";
        return false;
      }
      elseif(a==b){
        return true;
      }
    }
    </script>

    <div class="mainbody">
        <section class="container">
            <div class="wrapper">
                <h1>Profile Management</h1>
                <form action="update.php" method="post" enctype="multipart/form-data" onsubmit="return myfun()">

                            <div class="inputBox">
                                <input type="text" id="accName" name="accName" placeholder="Full Name" value="<?php  echo $row["accName"]?>" required>
                            </div>
                            <div class="inputBox">
                                <input class="mdl-textfield__input" type="text" id="accPhoneNo" name="accPhoneNo" placeholder="Contact Number" value="<?php  echo $row["accPhoneNo"]?>" pattern="^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$" required>
                            </div>
                            <div class="inputBox">
                                <input type="password" id="pwd" name="pwd" placeholder="Password" value="" required><br>
                            </div>
                            <div class="inputBox">
                                <input type="password" id="cpwd" name="cpwd" placeholder="Confirm Password" value="" required><br>
                                <span id="message"></span>
                            </div>
                            <div class="inputBox">
                                <input style="background:white;" type="text" id="accLastVisit" name="accLastVisit" value="<?php  echo $row["accLastVisit"]?>" required disabled>
                            </div>
                            <div class="inputBox">
                                <input type="preferences" id="preferences" name="preferences" placeholder="Preferences" required>
                            </div>
                            <div class="inputBox">
                                <input type="purchasem" id="purchasem" name="purchasem" placeholder="Purchases Made" required>
                            </div>


                        <button type="submit" name="submit" class="btn" id="update" >Update Profile</button>


                </form>

                <a class="logout" href="include/logout.php">Logout</a>


            <?php include("include/footer.php"); ?>
            </div>
        </section>
    </div>

</html>