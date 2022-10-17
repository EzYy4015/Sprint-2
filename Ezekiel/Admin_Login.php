<?php
//session_start();

error_reporting(0);

include  "Configuration.php";

  if(isset($_POST['submit'])){
    //!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['cpassword'])

      $name = $_POST['name'];
      $password =$_POST['password'];
      $fetch = "SELECT * FROM accounts WHERE accName = '$name' AND accPassword = '$password'";
      $runn = mysqli_query($conn, $fetch);

      htmlspecialchars($name);
      htmlspecialchars($password);

        if ($runn->num_rows > 0){
            echo "<script>alert('Login Successfully')</script>";
            //$_SESSION['name'] = $row['accName'];
            //header("Location: Registration.php");
            //exit();
        }
        else{
            echo "<script>alert('Account Does no Exist')</script>";
        }

    }

?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>Gardening Admin</TITLE>
    <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="Login_CSS/styles.css"/>
</HEAD>
<body>
    <div class="box6">
        <div class="form3">
            <form action='' method="POST" class="login" autocomplete="off">
                <div class="box5">
                    <h2>Admin Sign In</h2>
                    <a href="Login.php"><input type='button' class='button' value="Return"></a>
                </div>
                <div class="inputBox">
                    <input type="text" name="name" required>
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required>
                    <span>Password</span>
                    <i></i>
                </div>
                <input type="submit" name="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</HTML>