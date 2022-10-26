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

$date = date("Y-m-d", $schedule);
$time = date("H:i:s", $schedule);

$datetime = date("Y-m-d H:i:s", $schedule);



// $booking = DB::queryFirstField("SELECT bookingID FROM Bookings WHERE bookingTime >= %t AND bookingDate = %t" , $time, $date);

$bookings = DB::queryFirstColumn("SELECT bookingID FROM Bookings WHERE CONCAT(bookingDate, ' ', bookingTime) >= %t;" , $datetime);

foreach ($bookings as $booking) {


	$notifId = DB::queryFirstField("SELECT notifID FROM Notif_Bookings WHERE bookingID = %i AND status = %i", $booking, 0);

	$details = DB::queryFirstRow("SELECT notifTitle, notifDesc FROM Notification WHERE notifID = %i", $notifId);

	$accounts = DB::queryFirstColumn("SELECT accID FROM Acc_Notifications WHERE notifID = %i AND status = %i", $notifId, 0);

	foreach ($accounts as $account)
	{
		echo 'c' . PHP_EOL;
		$email = DB::queryFirstField("SELECT accEmail FROM Accounts WHERE accID = %i AND accNotifEnabled = %i", $account, 1);
		
		$to_email = $email;
		$subject = $details['notifTitle'];
		$body = '<!DOCTYPE html>
				<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
				<head>
					<meta charset="UTF-8">
					<meta name="viewport" content="width=device-width,initial-scale=1">
					<meta name="x-apple-disable-message-reformatting">
					<title></title>
					<!--[if mso]>
					<noscript>
						<xml>
							<o:OfficeDocumentSettings>
								<o:PixelsPerInch>96</o:PixelsPerInch>
							</o:OfficeDocumentSettings>
						</xml>
					</noscript>
					<![endif]-->
					<style>
						table, td, div, h1, p {font-family: Arial, sans-serif;}
						
					</style>
				</head>
					<body style="margin:0;padding:0;">
						<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
							<tr>
								<td align="center" style="padding:0;">
									<table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
										<tr>
											<td style="padding:0;">
												<table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
													<tr>
														<td align="center" style="padding:40px 0 30px 0;background:#009E60;">
															<img class="logoImage" width="142px" height="48px" title="companyLogo" src="https://i.imgur.com/Cyciu9S.png" alt="CompanyLogo" >
														</td>
													</tr>
													<tr>
														<td style="padding:36px 30px 42px 30px;">
															<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
					<tr>
						<td style="padding:0;">
						<h1>' .$details['notifTitle']. '</h1>
							<p>' .$details['notifDesc']. '</p>

						</td>
					</tr>
				
				</table>
														</td>
													</tr>
													<tr>
									<td style="padding:30px;background:#009E60;">
									<table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
					<tr>
						<td style="padding:0;width:50%;" align="left">
						<p>&reg; Assignment Project, Cacti Succulents 2022<br/><a href="#">Our website</a></p>
						</td>
						
					</tr>
				</table>
									</td>
								</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</body>
				</html>';

		

		
		// create a HTML type email
		$headers = "MIME-Version: 1.0" . "\r\n"; 
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
		$headers .= "From: cactisucculentkch@gmail.com";
		
		mail($to_email, $subject, $body, $headers);
		

		
		$admin_accs = DB::query('SELECT accID, accEmail FROM Accounts WHERE accAccess = 2 AND accNotifEnabled = 1');
		foreach ($admin_accs as $admin) {
			mail($admin['accEmail'], $subject, $body, $headers);

			DB::insert('Notification', ['notifTitle' => $details['notifTitle'], 'notifDesc' => $details['notifDesc']]);
			$notifID = DB::insertId();
			DB::insert('Acc_Notifications', ['accID' => $admin['accID'], 'notifID' => $notifID,  'status' => 1]);

			
		}

		DB::query("UPDATE Acc_Notifications SET status = %i WHERE accID = %i AND notifID = %i", 1, $account, $notifId);
		
	}

	DB::query("UPDATE Notif_Bookings SET status = %i WHERE bookingID = %i AND notifID = %i", 1, $booking, $notifId);
	
	
}







	

?>