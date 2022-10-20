<?php

// Law Yuk Fung
// Laet edit: 20/10/2022 7:30pm
//include 'BookingUpdate.php';
// getData(bookingTime, bookingID);

$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "swe30008";

require_once __DIR__.'/meekrodb-2.4/db.class.php';



DB::$user = $username;
DB::$password = $password1;
DB::$dbName = $dbname;
DB::$host = $servername;


function getData($bookingTime, $bookingID)
{
	$notifID = DB::query("SELECT notifID FROM notif_bookings WHERE bookingID = %i", $bookingID);
	
	$descr = DB::query("SELECT notifDesc FROM notification WHERE notifID = %i", $notifID);
	
	$originDescr = explode(" ", $descr);
	
	$originTime = $originDescr[5];
	//DB::insert('Acc_Notifications', ['accID' => $accID, 'notifID' => $notifID, 'status' => 0]);
	
	sendEmail($originTime, $bookingTime);
	
}


$emails = DB::query("SELECT accEmail FROM Accounts WHERE accNotifEnabled = %i", 1);


function sendEmail($originTime, $bookingTime)
{
	if($originTime != $bookingTime)
	{
		$emails = DB::query("SELECT accEmail FROM Accounts WHERE accNotifEnabled = %i", 1);
		foreach($emails as $email)
		{
			$to_email = $email;
			$subject = "Booking Update";
			$body = "The booking time at $originTime has changed to $bookingTime."; 
			
			mail($to_email, $subject, $body, $headers);
		}
		
	}
	else
	{
		echo "The booking time remains the same.";
	}
	

	
}


	

?>