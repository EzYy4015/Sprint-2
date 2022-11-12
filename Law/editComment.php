<?php

session_start(); 

if (!@$_SESSION['userid']) {
    // not logged in, cannot save comment!!!
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

// $comment = $_POST["comments"]; 
$comment = htmlspecialchars( $_POST["comments"] );
// $accID = $_POST["userID"]; 
$accID = $_SESSION["userid"];  
$commentid = +$_POST["commentid"];
date_default_timezone_set('Asia/Kuching');
$date = date('Y-m-d H:i:s');

DB::query("UPDATE pro_comments SET commentDisc=%s, commentAddedDate=%s, commentVisible=%i WHERE commentID = %i and discAddedBy = %i", $comment, $date, 1, $commentid, $accID);
//DB::insert('pro_comments', ['commentDisc' => $comment, 'commentAddedDate' => $date, 'discAddedBy' => $accID, 'discProduct' => $productid, 'commentVisible' => 1]);

if (DB::affectedRows() == 1) {
    echo 'OK';
    http_response_code(200);
    die();
} else {
    echo 'FAIL';
    http_response_code(500);
    die();
}
