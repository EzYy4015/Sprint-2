<?php
    session_start();
    include ('include/connection.php');
    
    $reviewID=$_GET['rID'];

    $query ="DELETE FROM reviews WHERE reviewID= '$reviewID'";
    $result = mysqli_query($con, $query);

    if($result){
        echo"<div class='result'>Delete review successfully <br> Page will be redirected after 2 seconds</div>";
    }
    else{
        echo"<div class='result'>Delete review failed <br> Page will be redirected after 2 seconds</div>";
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
?>