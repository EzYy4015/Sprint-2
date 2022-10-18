<?php

// Law Yuk Fung
// Laet edit: 18/10/2022 10:40am
//include 'BookingCancellation.php';
// getData(accID, bookingID);

$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "swe30008";

require_once __DIR__.'/meekrodb-2.4/db.class.php';



DB::$user = $username;
DB::$password = $password1;
DB::$dbName = $dbname;
DB::$host = $servername;


function getData($accID, $bookingID)
{
	$bookingTime = DB::query("SELECT bookingTime FROM Bookings WHERE bookingID = %i", $bookingID);
	
	//DB::insert('Acc_Notifications', ['accID' => $accID, 'notifID' => $notifID, 'status' => 0]);
	
	sendEmail($accID, $bookingTime);
	
}


$emails = DB::query("SELECT accEmail FROM Accounts WHERE accNotifEnabled >= %i", 1);


function sendEmail($accID, $bookingTime)
{
	
	$email = DB::query("SELECT accEmail FROM Accounts WHERE accID = %i", $accID);
	
	$to_email = $email;
	$subject = "Booking Cancellation";
	$body = "You hava cancelled your booking on $bookingTime. \n Remarks: "; // reason why cancel booking
  
	mail($to_email, $subject, $body, $headers);

	
}


	

?>