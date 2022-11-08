<?php
session_start();

error_reporting(0);

include  "Configuration.php";

  if($_SERVER["REQUEST_METHOD"] == "POST"){

      $name = $_POST['name'];
      $password =$_POST['password'];
      $fetch = "SELECT * FROM accounts WHERE accName = '$name' AND accPassword = '$password' AND accAccess = 1 ";
      $runn = mysqli_query($conn, $fetch);
      $UserData = mysqli_fetch_assoc($runn);

      htmlspecialchars($name);
      htmlspecialchars($password);

        if ($runn->num_rows > 0){
            echo "<script>alert('Login Successfully')</script>";
            $_SESSION['access'] = 1;
            header("Location: Index.php");
            exit();
        }
        else{
            echo "<script>alert('Account Does no Exist')</script>";
        }
    }
?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>Gardening Login In</TITLE>
    <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <script src="https://kit.fontawesome.com/951008aa0d.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="Login_CSS/styles(2).css"/>
</HEAD>
<body>
    <div class = "split-screen">
        <div class = "left">
            <section class="copy">
                <h1>CACTI SUCCULENTS</h1>
                <p>Want to Become one of Us? Sign up Now!</p>
                <button class="signUp-btn1" type="button" onclick="location.href='Registration.php'">Sign-Up</button>
            </section>
        </div>
        <div class="right2">
            <form action='' method="POST">
                <section class="copy2">
                    <div class="box">
                        <h2>Visitor Log In</h2>
                        <i class="fa-solid fa-arrows-rotate fa-spin" style="--fa-animation-duration: 10s;" onclick="location.href='AdminLogin.php'"></i>
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