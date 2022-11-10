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


function getUser($prodID,$userID,$numSession)
{
	$users= DB::query("SELECT * FROM pro_comments WHERE discProduct = %i", $prodID);

    $output = "";

    foreach($users as $user)
    {
        $accName = DB::queryFirstField("SELECT accName  FROM accounts WHERE accID = %i", $user['discAddedBy']);

        $output .=  '' .$accName. '
        <div class="day">' .$user['commentAddedDate']. '</div>
        <div class="commentPosted">' .$user['commentDisc']. '</div>';

        if($userID == $user['discAddedBy'] and ($numSession == 1 || $numSession == 2)){
            
            echo'<div><button type="submit" class="editsubmit" onclick="">Edit</button></div>';
        }else{
            echo'';
        }

    }

    
    

    return $output;
}

?>