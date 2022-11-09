<?php

// Law Yuk Fung
// Laet edit: 23/10/2022 7:00pm
//include 'BookingUpdate(Promotion).php';
// getData(promoID);

$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "swe30008";

require_once __DIR__.'/meekrodb-2.4/db.class.php';



DB::$user = $username;
DB::$password = $password1;
DB::$dbName = $dbname;
DB::$host = $servername;

// get data from other page
function getData($promoID, $promoNewTitle,  $promoNewDesc)
{
	$notifID = DB::queryFirstField("SELECT notifID FROM Notif_Promo WHERE promoID = %i", $promoID);
	
	$descr = DB::queryFirstRow("SELECT notifTitle, notifDesc FROM notification WHERE notifID = %i", $notifID);
	
	sendEmail($descr,$promoNewTitle,  $promoNewDesc);
	
}




function sendEmail($descr,$promoNewTitle,  $promoNewDesc)
{
	// checking the booking update is on booking time or other attributes
	if($descr['notifTitle'] != $promoNewTitle OR $descr['notifDesc'] != $promoNewDesc)
	{
        // save the email of the visitor who accepts receive the email notification
		$emails = DB::query("SELECT accID, accEmail FROM Accounts WHERE accNotifEnabled = %i AND accAccess = %i", 1, 1);

		foreach($emails as $email)
		{
			$to_email = $email['accEmail'];
			$subject = "Update for PROMO";
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
					<h1>' .$promoNewTitle. '</h1>
						<p>'  .$promoNewDesc.  '</p>

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

			$notifTitle = $promoNewTitle;
			$notifDescr = $promoNewDesc;
			DB::insert('Notification', ['notifTitle' => $notifTitle, 'notifDesc' => $notifDescr]);
			$notifID = DB::insertId();
			DB::insert('Acc_Notifications', ['accID' => $email['accID'], 'notifID' => $notifID,  'status' => 1]);
		}
		
	}
	else
	{
		echo "The promotion remains the same.";
	}

}
	

?>