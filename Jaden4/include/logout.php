<?php

session_start();

if(isset($_SESSION['access']))
{
    unset($_SESSION['access']);
    unset($_SESSION['name']);
    unset($_SESSION['mybookdate']);
    unset($_SESSION['userid']);
    unset($_SESSION['chatid']);
    $_SESSION['loggedin'] = 0;
}

echo "<script>alert('You have successfully logged out!'); window.location.href='../index.php';</script>";
die;

?>