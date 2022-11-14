<?php

    include("connection.php");

    if($_SESSION['loggedin'] == 1){
        $userid = $_SESSION['userid'];

        $query = "SELECT * FROM Accounts WHERE accID='$userid'";
        $fetchquery = mysqli_query($con, $query);
        $row = mysqli_fetch_array($fetchquery);
    }

?>