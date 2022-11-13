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


function getData($bookingTime, $bookingDate, $bookingID)
{
	//to save the new bookings made by admin
	$descr = "You have a booking at $bookingTime";
	$bookingTitle = "Booking Notification";
	
	//insert booking notification into notification table
	DB::insert('Notification', ['notifTitle' => $bookingTitle, 'notifDesc' => $descr]);
	

	$notifID = DB::insertId(); //get the notif ID
	
	//save notifID and bookingID into notif_bookings table
	DB::insert('Notif_Bookings', ['bookingID' => $bookingID, 'notifID' => $notifID, 'status' => 0]);
	
}

function getDataVisitor($accID,$bookingID)
{
	//to save the bookings made by visitor
	$notifID = DB::queryFirstField("SELECT notifID FROM Notif_Bookings WHERE bookingID = %i", $bookingID);
	//var_dump($bookingID);

	//save notifID and accID into acc_notifications table
	DB::insert('Acc_Notifications', ['accID' => $accID, 'notifID' => $notifID, 'status' => 0]);
}




	

?>