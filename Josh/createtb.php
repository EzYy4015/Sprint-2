<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="booking";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE TABLE account_detail (
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(20) NOT NULL,
contact_number VARCHAR(30),
date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
preferences VARCHAR(30),
purchasm VARCHAR(30)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table user created successfully\n";
} else {
    echo "Error creating table: " . $conn->error;
}
mysqli_close($conn);
?>
