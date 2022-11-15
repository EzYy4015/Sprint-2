<?php

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


$comment = htmlspecialchars( $_POST["comments"] ); // prevent XSS refer from https://www.w3schools.com/php/func_string_htmlspecialchars.asp
$accID = $_SESSION["userid"];  
$commentid = +$_POST["commentid"];
date_default_timezone_set('Asia/Kuching');
$date = date('Y-m-d H:i:s');

DB::query("UPDATE discussions SET prodDisc=%s, discAddedDate=%s, discVisible=%i WHERE discID = %i and discAddedBy = %i", $comment, $date, 1, $commentid, $accID);


if (DB::affectedRows() == 1) {
    echo 'OK';  //response from the sercer side to client side
    http_response_code(200);
    die();
} else {
    echo 'FAIL';
    http_response_code(500); 
    die();
}
