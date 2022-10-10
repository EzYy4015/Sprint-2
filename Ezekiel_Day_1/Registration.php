<?php
error_reporting(0);

include  "Configuration.php";

  if(isset($_POST['submit'])){
    //!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['cpassword'])

      $name = $_POST['name'];
      $password =$_POST['password'];
      $cpassword = $_POST['cpassword'];

    if($password == $cpassword){
      $sqll = "SELECT * FROM accounts WHERE accName = '$name'";
      $run = mysqli_query($conn, $sqll);
        if (!$run->num_rows > 0){
          $sqll = "INSERT INTO accounts (accName,accPassword)
              VALUES ('$name', '$password')";

          $run = mysqli_query($conn,$sqll);

            if($run){
              echo  "<script>alert('Account created Successfully!')</script>";
            }
            else{
              echo "<script>alert('Something went wrong...')</script>";
            }
        }
        else{
        echo "<script>alert('Username already exists')</script>";
        }
    }
    else{
      echo "<script>alert('Password Does Not Matched!')</script>";
    }
  }

?>
 
<!DOCTYPE HTML>
<HTML>
<HEAD>
  <TITLE>Gardening Sign Up</TITLE>
  <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="Login_CSS/styles.css"/>
  <script src="PasswordValidation.js"></script>
</HEAD>
<body>
    <div class ="box2">
        <div class="form2">
            <form action='' method="POST" class="signUp" autocomplete="off">
                <h2>Sign Up</h2>
                <div class="inputBox">
                    <input type="text" name="name"  required>
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required>
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="cpassword" required>
                    <span>Confirm Password</span>
                    <i></i>
                </div>
                <a href="Login.php"><input type="submit" name="submit" value="Create!" onclick="CheckPassword(document.form2.password)"></a>
                <a href="Login.php"><input type="button" class="button" value="Have an account?"></a>
            </form>
        </div>
    </div>
</body>
</HTML>
