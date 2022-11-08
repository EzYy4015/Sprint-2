<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="swe30008";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = $sql = "SELECT * FROM accounts WHERE accName='".$_SESSION['name']."'";
$sql2 = "UPDATE accounts SET accLastVisit = Now() WHERE accName='".$_SESSION['name']."'";
$result2 = mysqli_query($conn, $sql2);
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href ="style.css">
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
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!-- <img src="images/logo4.png"> -->
        <div class="sidenav-box">
            <a href="#">Home</a>
            <a href="#">Bookings</a>
            <a href="#">Products</a>
            <a href="#">Forum</a>
            <a href="#">Guide</a>
        </div>
        <div class="sidenav-contact">
            <p>Our Socials</p>
            <div class="sidenav-contact-logos">
                <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

    <!-- Use any element to open the sidenav -->
    <span class="opennav" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
    <div id="mySideMsg" class="sidemsg">
        <img src="images/sidelogo.png">
    </div>
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

          <a class="logout" href="Logout.php">Logout</a>


      <footer>
          <div class="footer-grass">
          <img src="images/grass-footer1.png">
          </div>
          <div class="footer-container">
              <div class="footer">
                  <div class="footer-heading footer1">
                      <h2>Navigation</h2>
                      <a href="#">Home</a>
                      <a href="#">Products</a>
                      <a href="#">Bookings</a>
                      <a href="#">Guide</a>
                      <a href="#">Contact Us</a>
                  </div>
                  <div class="footer-heading footer2">
                  <h2>Developers</h2>
                      <a href="#">Ezekiel</a>
                      <a href="#">Yuk Fung</a>
                      <a href="#">Jing Hong</a>
                      <a href="#">Josh</a>
                      <a href="#">Cornelius</a>
                      <a href="#">Jaden</a>
                  </div>
                  <div class="footer-heading footer3">
                      <h2>Social Media</h2>
                      <a href="#">Facebook</a>
                      <a href="#">Instagram</a>
                      <a href="#">Twitter</a>
                  </div>
              </div>
          </div>
          <div class="footer-bottom">
          <p>&copy; 2022 - All rights reserved.</p>
          </div>
      </footer>
    </div>
  </section>

</html>
