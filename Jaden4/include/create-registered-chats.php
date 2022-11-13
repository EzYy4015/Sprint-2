<?php

    session_start();
    include("connection.php");

    $userid = $_POST['accid'];

    $insertregistered = "INSERT INTO livechat(chatVisitorID, chatFormID) VALUES ('$userid', '0')";
    mysqli_query($con, $insertregistered);
    $_SESSION['chatid'] = mysqli_insert_id($con);

?>