<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>Cacti-Succulent Kuching</TITLE>
    <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="Login_CSS/styles.css"/>
</HEAD>
<body>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
        echo "Connected successfully";


    ?>
</body>
</HTML>