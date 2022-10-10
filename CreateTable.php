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
        $dbname = "cacti_succulent_kuching";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
            $sql = "CREATE TABLE accounts(
            accID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            accName VARCHAR(25) NOT NULL,
            accPassword VARCHAR(25) NOT NULL
            )";
        
        if (mysqli_query($conn, $sql)) {
            echo "Table accounts created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
        
        mysqli_close($conn);

?>
</body>
</HTML>