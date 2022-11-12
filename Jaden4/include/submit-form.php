<?php
    session_start();
    include("connection.php");
    date_default_timezone_set('Asia/Kuala_Lumpur');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $inquiry = $_POST['inquiry'];
    $userid = $_POST['userid'];

    $checkdate = getdate(date("U"));

    $insertform = "INSERT INTO supportform(formVisitorID, formName, formEmail, formPhoneNo, formMessage) VALUES ('$userid', '$name', '$email', '$phoneno', '$inquiry')";
    mysqli_query($con, $insertform);

    $resultformid = mysqli_insert_id($con);

    if($checkdate['hours'] >= 9 && $checkdate['hours'] <= 16) {
        // By default the admin is 1, Ezekiel. [The visitors are connected to Ezekiel]
        $createchat = "INSERT INTO livechat(chatVisitorID, chatFormID, chatAdminID) VALUES ('$userid', '$resultformid', '1')";
        mysqli_query($con, $createchat);
        $_SESSION['chatid'] = mysqli_insert_id($con);
    }

    mysqli_close($con);
?>