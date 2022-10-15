<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="booking";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $fullname = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];
    $last_visit = $_POST['last_visit'];
    $preferences = $_POST['preferences'];
    $purchasem = $_POST['purchasem'];


		$sql = "INSERT INTO account_detail (fname,contact_number,date,preferences,purchasm) VALUE ('$fullname', '$contact_number','$last_visit','$preferences','$purchasem')";
			if (mysqli_query($conn, $sql)) {
				echo"<script> alert('Record success'); window.location.assign('enter.html') </script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		mysqli_close($conn);



?>
