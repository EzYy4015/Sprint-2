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
	$users= DB::query("SELECT * FROM discussions WHERE discProduct = %i", $prodID);

    $output = "";

    foreach($users as $user)
    {
        $accName = DB::queryFirstField("SELECT accName  FROM accounts WHERE accID = %i", $user['discAddedBy']);

        
        $output .= '<div class="list" ><div class ="commentbox_commentid_" id="commentbox_commentid_'.$user['discID']. '">';
        $output .=  '' .$accName. '
        <div class="day">' .$user['discAddedDate']. '</div>
        <div class="commentPosted" id="commentposted_commentid_'.$user['discID']. '">' .$user['prodDisc']. '</div>';

        if($userID == $user['discAddedBy'] and ($numSession == 1 || $numSession == 2)){
            
            $output .= '<p class="commentbutton"><button id="editsubmit_commentid_'.$user['discID']. '" type="submit" class="editsubmit" href="" onclick="editComment('.$user['discID']. ')">Edit</button></p>';

        }else{
            $output .= '';
        }


        $output .= '</div></div>';
     
    }

    
    

    return $output; 
}

?>