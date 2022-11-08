<?php

// Law Yuk Fung
// Laet edit: 17/10/2022 8:50pm
$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "swe30008";

require_once __DIR__.'/meekrodb-2.4/db.class.php';



DB::$user = $username;
DB::$password = $password1;
DB::$dbName = $dbname;
DB::$host = $servername;


function getData($notifTitle, $notifDesc)
{
	
	DB::insert('Notification', ['notifTitle' => $notifTitle, 'notifDesc' => $notifDesc]);
	
	$notifID = DB::query("SELECT notifID FROM Notification WHERE notifID = %i", SELECT IDENT_CURRENT('Notification'));
	
	$promoID = DB::query("SELECT promoID FROM Promotions WHERE promoID = %i", SELECT IDENT_CURRENT('Promotions'));
	
	DB::insert('Notif_Promo', ['promoID' => $promoID, 'notifID' => $notifID, 'status' => 0]);
	
	sendEmail($notifID, $promoID);
	
}


$emails = DB::query("SELECT accEmail FROM Accounts WHERE accNotifEnabled >= %i", 1);


function sendEmail($notifID, $promoID)
{
	$notifTitle= DB::query("SELECT notifTitle FROM Notification WHERE notifID = %i", $notifID);
	
	$notifDesc = DB::query("SELECT notifDesc FROM Notification WHERE notifID = %i", $notifID);
	
	foreach ($$emails as $email)
	{
  
	  $to_email = $email['accEmail'];
	  $subject = $notifTitle;
	  $body = $notifDesc;
	  
	  mail($to_email, $subject, $body, $headers));
	  
	}
	
	DB::query("UPDATE Notif_Promo SET status = %i WHERE promoID = %i AND notifID = %i", 1, $promoID, $notifID);
	
}


	

?>