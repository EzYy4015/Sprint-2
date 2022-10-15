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


		$sql = $sql = "UPDATE account_detail SET fname='$fullname',  contact_number='$contact_number', date='$last_visit', preferences='$preferences', purchasm='$purchasem' WHERE ID='2'";
			if (mysqli_query($conn, $sql)) {
				echo"<script> alert('update success'); window.location.assign('ProfileManagement.html') </script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		mysqli_close($conn);



?>
