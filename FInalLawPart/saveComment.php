<?php
// Law Yuk Fung
// Laet edit: 10/11/2022 7:40pm

session_start(); 

if (!@$_SESSION['userid']) {
    // not logged in, cannot save comment
    http_response_code(401);
    die();
}

$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "swe30008";

require_once __DIR__.'/include/meekrodb-2.4/db.class.php';



DB::$user = $username;
DB::$password = $password1;
DB::$dbName = $dbname;
DB::$host = $servername;


$comment = htmlspecialchars( $_POST["comments"] ); //prevent XSS attack
$accID = $_SESSION["userid"];  
$productid = $_POST["productid"];
date_default_timezone_set('Asia/Kuching');
$date = date('Y-m-d H:i:s');

if(empty($comment)){
    die();
}else{
    DB::insert('discussions', ['prodDisc' => $comment, 'discAddedDate' => $date, 'discAddedBy' => $accID, 'discProduct' => $productid, 'discVisible' => 1]);
}


header("Location: http://localhost/GotYukFung/productAndDiscussion.php");


?>