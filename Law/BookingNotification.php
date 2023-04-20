<?php

// Law Yuk Fung
// Laet edit: 18/10/2022 9:30am
//include 'BookingNotification.php';
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


function getData($bookingTime, $bookingDate)
{
	$descr = "You have a booking at $bookingTime";
	$bookingTitle = "Booking Notification";
	
	DB::insert('Notification', ['notifTitle' => $bookingTitle, 'notifDesc' => $descr]);
	
	$notifID = DB::query("SELECT notifID FROM Notification WHERE notifID = %i", SELECT IDENT_CURRENT('Notification'));
	
	$bookingID = DB::query("SELECT bookingID FROM Bookings WHERE bookingID = %i", SELECT IDENT_CURRENT('Advertisements'));
	
	DB::insert('Notif_Bookings', ['bookingID' => $bookingID, 'notifID' => $notifID, 'status' => 0]);
	
}




	

?>