<?php

// Law Yuk Fung
// Laet edit: 18/10/2022 10:15am
//include 'BookingNotification(Visitor).php';
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

date_default_timezone_set("Asia/Kuala_Lumpur");
$schedule = strtotime("-2 hours");

$date = date("Y-m-d");
$time = date("H:i:s", $schedule);




function getData($accID, $bookingID)
{
	$notifID = DB::query("SELECT notifID FROM Notif_Bookings WHERE bookingID = %i", $bookingID);
	
	DB::insert('Acc_Notifications', ['accID' => $accID, 'notifID' => $notifID, 'status' => 0]);
	
	sendEmail();
	
}


$emails = DB::query("SELECT accEmail FROM Accounts WHERE accNotifEnabled >= %i", 1);


function sendEmail()
{
	
	$booking = DB::query("SELECT bookingID FROM Bookings WHERE bookingTime = %t AND bookingDate = %t" , $time, $date);
	
	$notifId = DB::query("SELECT notifID FROM Notif_Bookings WHERE bookingID = %i AND status = %i", $booking, 0);
	
	$details = DB::query("SELECT notifTitle, notifDesc FROM Notification WHERE notifID = %i", $notifId);
	
	$accounts = DB::query("SELECT accID FROM Acc_Notifications WHERE notifID = %i AND status = %i", $notifId, 0);
	
	foreach ($$accounts as $account)
	{
		$email = DB::query("SELECT accEmail FROM Accounts WHERE accID = %i", $account);
		
		$to_email = $email;
		$subject = $details['notifTitle'];
		$body = $details['notifDesc'];
	  
		mail($to_email, $subject, $body, $headers);
		
		DB::query("UPDATE Acc_Notifications SET status = %i WHERE accID = %i AND notifID = %i", 1, $account, $notifId);
	  
	}
	
	DB::query("UPDATE Notif_Bookings SET status = %i WHERE bookingID = %i AND notifID = %i", 1, $booking, $notifId);
	
}


	

?>