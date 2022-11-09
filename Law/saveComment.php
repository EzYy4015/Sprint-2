<?php

$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "swe30008";

require_once __DIR__.'/include/meekrodb-2.4/db.class.php';



DB::$user = $username;
DB::$password = $password1;
DB::$dbName = $dbname;
DB::$host = $servername;


function getCommentInfo($productid, $comment, $accID)
{
    $date = date('Y-m-d H:i:s');
    DB::insert('pro_comments', ['commentDisc' => $comment, 'commentAddedDate' => $date, 'discAddedBy' => $accID, 'discProduct' => $productid]);
	

   
}

?>