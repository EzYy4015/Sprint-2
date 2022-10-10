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
            <a href="Registration.php"><input type='submit' class='signup' value="Sign Up"></a>
        </div>
    </div>
    <div class="box">
        <div class="form">
            <form action='' method="POST" class="login" autocomplete="off">
                <h2>Visitor Sign In</h2>
                <a href="Registration.php"><input type='submit' class='switch' value=""></a>
                <div class="inputBox">
                    <input type="text" name="username" required="required">
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required="required">
                    <span>Password</span>
                    <i></i>
                </div>
            </form>
            <input type="submit" value="Login">
        </div>
    </div>
</body>
</HTML>
