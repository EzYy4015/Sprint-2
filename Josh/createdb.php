<?php
$servername = "localhost";
$username = "root";
$password = "";
$sql = "CREATE DATABASE booking";
$conn = mysqli_connect($servername, $username, $password);
if (mysqli_query($conn, $sql)) {
    echo "database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

mysqli_close($conn);
?>
