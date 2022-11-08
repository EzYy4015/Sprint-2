<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="swe30008";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $fullname = $_POST['accName'];
    $contact_number = $_POST['accPhoneNo'];
    $last_visit = $_POST['accLastVisit'];
    $pwd = $_POST['pwd'];
    $preferences = $_POST['preferences'];
    $purchasem = $_POST['purchasem'];


		$sql = $sql = "UPDATE accounts SET accName='$fullname',  accPhoneNo='$contact_number', accPassword='$pwd' WHERE accName='".$_SESSION['name']."'";
			if (mysqli_query($conn, $sql)) {
				echo"<script> alert('update success'); window.location.assign('../Ezekiel/Login.php') </script>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		mysqli_close($conn);



?>
