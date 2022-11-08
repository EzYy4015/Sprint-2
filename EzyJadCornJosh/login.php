<?php
session_start();

error_reporting(0);

include ('include/connection.php');

  if($_SERVER["REQUEST_METHOD"] == "POST"){

      $name = $_POST['name'];
      $password =$_POST['password'];
      $fetch = "SELECT * FROM accounts WHERE accName = '$name' AND accPassword = '$password' AND accAccess = 1";
      $runn = mysqli_query($con, $fetch);
      $UserData = mysqli_fetch_assoc($runn);

      htmlspecialchars($name);
      htmlspecialchars($password);

        if ($runn->num_rows > 0){
            echo "<script>alert('You have successfully logged in.'); window.location.href='index.php';</script>";
            $_SESSION['userid'] = $UserData['accID'];
            $_SESSION['access'] = 1;
            $_SESSION['loggedin'] = 1;
            $_SESSION['name'] = $UserData['accName'];
            exit();
        }
        else{
            echo "<script>alert('Invalid credentials or account does not exist.')</script>";
        }
    }
?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>Cacti Succulents - Login</TITLE>
    <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/951008aa0d.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style/style-logreg.css"/>
</HEAD>
<body>
    <div class = "split-screen">
    <div class="login-home-button">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>
        <div class = "left">
            <section class="copy">
                <div class="login-logo-container">
                        <img src="images/logo1.png">
                </div>
                <div class="signInIMG-box">
                    <img src="images/plants3.jpg">
                </div>
                <p>Want to become one of us? 
                <a href="registration.php">
                <strong>Sign Up</strong></a>
                now!</p>
            </section>
        </div>
        <div class="right2">
            <form action='' method="POST">
                <section class="copy2">
                    <div class="box">
                        <h2>Visitor Login</h2>
                        <i class="fa-solid fa-arrows-rotate fa-spin" style="--fa-animation-duration: 10s;" onclick="location.href='adminlogin.php'"></i>
                    </div>
                </section>
                <div class="input-container name">
                    <label for="name">Username</label>
                    <input id="name" name="name" type="text">
                </div>
                <div class="input-container password">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password">
                </div>
                <button class="signIn-btn" type="submit">Sign-In</button>
            </form>
        </div>
    </div>
</body>
</HTML>