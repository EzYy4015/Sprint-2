<?php
    session_start();
    include("../include/connection.php");

    $outgoing_id = $_SESSION['userid'];
    $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);
    $sql = "SELECT * FROM supportform WHERE NOT formVisitorID = {$outgoing_id} AND (formName LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($con, $sql);
    $row3 = mysqli_fetch_assoc($query);
    if(mysqli_fetch_array($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>
