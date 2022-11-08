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


function getDataAdmin($bookingTime, $booking_date, $bookingID)
{
	$notifID = DB::queryFirstField("SELECT notifID FROM notif_bookings WHERE bookingID = %i", $bookingID);
	
	$descr = DB:: queryFirstField("SELECT notifDesc FROM notification WHERE notifID = %i", $notifID);
	
	// seperate the message to get the booking time
	$originDescr = explode(" ", $descr);
	$originTime = $originDescr[5];
	
	
	// update original notification
	$descr = "You have a booking at $bookingTime";
	DB::query("UPDATE Notification SET notifDesc = %s WHERE notifID = %i", $descr, $notifID);
	
	// send notification about new time
	sendEmail($originTime, $bookingTime, $booking_date);
	
}

// save the email of the visitor who accepts receive the email notification
$emails = DB::query("SELECT accEmail FROM Accounts WHERE accNotifEnabled = %i", 1);


function sendEmail($originTime, $bookingTime, $booking_date)
{
	// checking the booking update is on booking time or other attributes
	if($originTime != $bookingTime)
	{
		$emails = DB::query("SELECT accID, accEmail FROM Accounts WHERE accNotifEnabled = %i", 1);
		foreach($emails as $email)
		{
			$to_email = $email['accEmail'];
			$subject = "Booking Slots Update";

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
					<h1> Booking Slots Update </h1>
						<p> The booking at ' .$originTime. ' has changed to ' .$booking_date. ' at ' .$bookingTime. '.</p>

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

			$notifTitle = "Booking Slots Update";
			$notifDescr = 'The booking at ' .$originTime. ' has changed to ' .$booking_date. ' at ' .$bookingTime ;
			DB::insert('Notification', ['notifTitle' => $notifTitle, 'notifDesc' => $notifDescr]);
			$notifID = DB::insertId();
			DB::insert('Acc_Notifications', ['accID' => $email['accID'], 'notifID' => $notifID,  'status' => 1]);


		}
		
	}
	else
	{
		echo "The booking time remains the same.";
	}
	

	
}

function bookingUpdateVisitor($accID,$bookingID)
{
	$notifID = DB::queryFirstField("SELECT notifID FROM notif_bookings WHERE bookingID = %i", $bookingID);
	
	$descr = DB:: queryFirstField("SELECT notifDesc FROM notification WHERE notifID = %i", $notifID);

	$email = DB::queryFirstField("SELECT accEmail FROM Accounts WHERE accNotifEnabled = %i AND accID = %i", 1, $accID);

	$subject = "Appointment Update";

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
					<h1>' .$subject. '</h1>
						<p>' .$descr. '.</p>

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


	mail($email, $subject, $body, $headers);

	//save the notification in the notification table (Visitor)
	$notifTitle = $subject;
	$notifDescr = $descr;
	DB::insert('Notification', ['notifTitle' => $notifTitle, 'notifDesc' => $notifDescr]);
	$notifID = DB::insertId();
	DB::insert('Acc_Notifications', ['accID' => $accID, 'notifID' => $notifID,  'status' => 1]);

	$admin_email = DB::query('SELECT accEmail, accID FROM Accounts WHERE accAccess = 2 AND accNotifEnabled = 1');
	foreach ($admin_email as $ae) {
		mail($ae['accEmail'], $subject, $body, $headers);

		//save the notification in the notification table (Admin)
		DB::insert('Acc_Notifications', ['accID' => $ae['accID'], 'notifID' => $notifID, 'status' => 1]);
	}
}

	

?>