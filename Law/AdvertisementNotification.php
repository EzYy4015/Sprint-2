<?php

// Law Yuk Fung
// Laet edit: 17/10/2022 9:10pm
//include 'AdvertisementNotification.php';
// getData(advTitle, advDescription);

$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "swe30008";

require_once __DIR__.'/meekrodb-2.4/db.class.php';



DB::$user = $username;
DB::$password = $password1;
DB::$dbName = $dbname;
DB::$host = $servername;


function getData($advTitle, $advDesc)
{
	
	DB::insert('Notification', ['notifTitle' => $advTitle, 'notifDesc' => $advDesc]);
	
	$notifID = DB::query("SELECT notifID FROM Notification WHERE notifID = %i", SELECT IDENT_CURRENT('Notification'));
	
	$advID = DB::query("SELECT advID FROM Advertisements WHERE advID = %i", SELECT IDENT_CURRENT('Advertisements'));
	
	DB::insert('Notif_Adv', ['advID' => $advID, 'notifID' => $notifID, 'status' => 0]);
	
	sendEmail($notifID, $advID);
	
}


$emails = DB::query("SELECT accEmail FROM Accounts WHERE accNotifEnabled >= %i", 1);


function sendEmail($notifID, $advID)
{
	$notifTitle= DB::query("SELECT notifTitle FROM Notification WHERE notifID = %i", $notifID);
	
	$notifDesc = DB::query("SELECT notifDesc FROM Notification WHERE notifID = %i", $notifID);
	
	foreach ($$emails as $email)
	{
  
	  $to_email = $email['accEmail'];
	  $subject = $notifTitle;
	  $body = $notifDesc;
	  
	  mail($to_email, $subject, $body, $headers);
	  
	}
	
	DB::query("UPDATE Notif_Adv SET status = %i WHERE advID = %i AND notifID = %i", 1, $advID, $notifID);
	
}


	

?>