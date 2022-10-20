<?php
    $server = 'localhost';
    $user = 'root';
    $pass='';
    $db='swebong';
//create connection
    $conn = mysqli_connect($server, $user, $pass, $db);

//check connection
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
?>