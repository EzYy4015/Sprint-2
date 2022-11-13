<?php
// Law Yuk Fung
// Laet edit: 9/11/2022 6:48pm


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

        //$output .= '<div class="list" style="padding: 5px 0;"><div id="commentbox_commentid_'.$user['commentID']. '" style="margin:10px;">';
        $output .= '<div class="list" ><div class ="commentbox_commentid_" id="commentbox_commentid_'.$user['commentID']. '">';
        $output .=  '' .$accName. '
        <div class="day">' .$user['commentAddedDate']. '</div>
        <div class="commentPosted" id="commentposted_commentid_'.$user['commentID']. '">' .$user['commentDisc']. '</div>';

        if($userID == $user['discAddedBy'] and ($numSession == 1 || $numSession == 2)){
            
            //$output .= '<p style="text-align: right;margin-top:0;margin-bottom:0;"><button id="editsubmit_commentid_'.$user['commentID']. '" type="submit" class="editsubmit" href="" onclick="editComment('.$user['commentID']. ')">Edit</button></p>';
            $output .= '<p class="commentbutton"><button id="editsubmit_commentid_'.$user['commentID']. '" type="submit" class="editsubmit" href="" onclick="editComment('.$user['commentID']. ')">Edit</button></p>';

        }else{
            $output .= '';
        }


        $output .= '</div></div>';
        // $output .= '<hr>';
    }

    
    

    return $output; 
}

?>