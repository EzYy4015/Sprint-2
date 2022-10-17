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
      $UserData = mysqli_fetch_assoc($runn);

      htmlspecialchars($name);
      htmlspecialchars($password);

        if ($runn->num_rows > 0){
            echo "<script>alert('Login Successfully')</script>";
            //$_SESSION['access'] = $UserData['accAccess'];
            //header("Location: .php");
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
    <TITLE>Gardening Login In</TITLE>
    <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="Login_CSS/styles.css"/>
</HEAD>
<body>
    <div class ="box1">
        <div class ="form1">
            <h2>Are you new?</h2>
            <div class="inputBox1">
                <p>Hello there, Become one of us now!</p>
            </div>
            <input type='button' class='button' onclick="location.href='Registration.php'" value="Sign Up"></a>
        </div>
    </div>
    <div class="box">
        <div class="form">
            <form action='' method="POST" class="login" autocomplete="off">
                <div class="box4">  
                    <h2>Visitor Sign In</h2>
                    <a href="Admin_Login.php"><input type='button' class='button' value="Admin"></a>
                </div>
                <div class="inputBox">
                    <input type="text" name="name" value="<?php echo $name; ?>" required>
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required>
                    <span>Password</span>
                    <i></i>
                </div>
                <input type="submit" name="submit" value="Login">
                
                <a href="" class="forgotPass">Forgot Password?</a>
                
            </form>
        </div>
    </div>
</body>
</HTML>
