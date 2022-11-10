<?php
    session_start();
    include("connection.php");
    
    $reviewID=$_GET['rID'];

    $query ="UPDATE reviews SET reviewVisible=(CASE reviewVisible WHEN 1 THEN 0 ELSE 1 END) WHERE  reviewID= '$reviewID'";
    $result = mysqli_query($con, $query);

    if($result){
        echo"<div class='result'>Hide/Show review successfully <br> Page will be redirected after 2 seconds</div>";
    }
    else{
        echo"<div class='result'>Hide/Show review failed <br> Page will be redirected after 2 seconds</div>";
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
?>