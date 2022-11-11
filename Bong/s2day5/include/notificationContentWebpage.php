<?php

$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "swe30008";

require_once __DIR__.'/meekrodb-2.4/db.class.php';



DB::$user = $username;
DB::$password = $password1;
DB::$dbName = $dbname;
DB::$host = $servername;



function getData($accID)
{
    $output = "";
    
    $notifID = DB::queryFirstColumn("SELECT notifID FROM Acc_Notifications WHERE accID = %i", $accID);
    foreach($notifID as $nID)
    {
        $results = DB::query("SELECT notifTitle, notifDesc FROM Notification WHERE notifID = %i", $nID);
        foreach($results as $result){
            $output .= '<div class="notif-individual" id="notif-individual"><p><b>' .$result['notifTitle']. '</b> </br>'
				.$result['notifDesc'].
			'</p></div>';
	
	
	        
        }
        
    }

    return $output;
}


