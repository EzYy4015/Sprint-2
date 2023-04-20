<?php

$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "NotificationDB";

require_once __DIR__.'/meekrodb-2.4/db.class.php';



DB::$user = $username;
DB::$password = $password1;
DB::$dbName = $dbname;
DB::$host = $servername;

date_default_timezone_set("Asia/Kuala_Lumpur");

$Date = date("Y-m-d H:i:s");

	
	$headers = "From: cactisucculentkch@gmail.com";
	
	$results = DB::query("SELECT sendTo, subject, body, status, notificationID, dateTime FROM notofication WHERE dateTime >= %t", $Date);
	foreach ($results as $row) {
	  echo "sendTo: " . $row['sendTo'] . "\r\n";
	  echo "<br>";
	  echo "\n subject: " . $row['subject'] . "\n\n";
	  echo "<br>";
	  echo "\n body: " . $row['body'] . "\r";
	  echo "<br>";
	  
	  $to_email = $row['sendTo'];
	  $subject = $row['subject'];
	  $body = $row['body'];
	  
	  if($row['status'] == 0)
	  {
		if (mail($to_email, $subject, $body, $headers)) {
			echo "Email successfully sent to $to_email...";
			echo "<br>";
			DB::replace('notofication', ['notificationID' => $row['notificationID'], 'sendTo' => $row['sendTo'], 'subject' => $row['subject'], 'body' => $row['body'], 'dateTime' =>  $row['dateTime'], 'status' => 1]);
			echo "\n-------------\n";
			echo "<br>";
		} else {
			echo "Email sending failed...";
			echo "<br>";
			echo "\n-------------\n";
			echo "<br>";
		}
	  }else{
		  echo "Email has sent before";
		  echo "<br>";
		  echo "\n-------------\n";
		  echo "<br>";
	  };
		
	}
	
	
	
	
// $conn->close();
?>