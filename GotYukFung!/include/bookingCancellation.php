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
	$bookingTime = DB::queryFirstField("SELECT bookingTime FROM Bookings WHERE bookingID = %i", $bookingID);
	$remarks = DB::queryFirstField("SELECT remarks FROM Acc_Bookings WHERE  accID = %i AND bookingID = %i", $accID, $bookingID);
	
	//DB::insert('Acc_Notifications', ['accID' => $accID, 'notifID' => $notifID, 'status' => 0]);
	
	sendEmail($accID, $bookingTime,$remarks);
	$notifID = DB::queryFirstField("SELECT notifID FROM Notif_Bookings WHERE bookingID = %i", $bookingID);
	DB::query("DELETE FROM Acc_Notifications WHERE accID=%i AND notifID = %i", $accID, $notifID);
	
}





function sendEmail($accID, $bookingTime,$remarks)
{
	
	$email = DB::queryFirstField("SELECT accEmail FROM Accounts WHERE accID = %i AND accNotifEnabled = %i", $accID, 1);
	
	$to_email = $email;
	$subject = "Booking Cancellation";
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
					<h1> Booking Cancellation </h1>
						<p> You have cancelled your booking on' .$bookingTime. '</br> Remarks:  ' .$remarks. '</p>

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

	//save the notification in the notification table (Visitor)
	$notifTitle = "Booking Cancellation";
	$notifDescr = "You have cancelled your booking on " .$bookingTime. " </br> Remarks: " .$remarks;
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