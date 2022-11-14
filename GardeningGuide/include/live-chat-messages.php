<?php

    include("connection.php");

    $message = $_POST['message'];
    $userid = $_POST['userid'];
    $chatid = $_POST['chatid'];

    $searchadmin = "SELECT * FROM livechat WHERE chatID = '$chatID'";
    $querysearchadmin = mysqli_query($con, $searchadmin);
    $searchadminresult = mysqli_fetch_array($querysearchadmin);

    $adminid = $searchadminresult[0]['chatAdminID'];

    $insertmessage = "INSERT INTO livechatmessages(chatID, chatFrom, chatTo, chatMessage) VALUES ('$chatid', '$userid', '$adminid', '$message')";
    mysqli_query($con, $insertmessage);
?>