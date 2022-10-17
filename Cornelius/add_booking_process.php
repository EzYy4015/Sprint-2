<?php
    $book_date = $_POST['book-date'];
    $book_time = $_POST['book-time'];
    $total_slot = $_POST['total_slot'];
    $booking_visibility = $_POST['visibility'];

    // Create connection
    $servername = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($servername, $username, $password);
    
    // Create Database
    $database = "CREATE DATABASE swe30008";

    if (mysqli_query($con, $database)) { //Check whether database is created successfully or not
        echo "<p>Database Created Successfully!</p>";
    }

    // Create connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "swe30008";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create table in sql
    $table = "CREATE TABLE Bookings(
        bookingID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        bookingDate DATE NOT NULL,
        bookingTime TIME NOT NULL,
        bookingVisible INT(1) NOT NULL,
        bookingTotalSlots INT(5) NOT NULL,
        bookingAvailSlots INT(5) NOT NULL
    )";

    if (mysqli_query($conn, $table)) { //Check whether table is created successfully or not
        echo "<p>Table Created Successfully!</p>";
    }

    $check = "SELECT * FROM Bookings WHERE bookingDate = $book_date AND bookingTime = $book_time";

    $sql = "INSERT INTO Bookings(bookingDate, bookingTime, bookingVisible, bookingTotalSlots, bookingAvailSlots)
            VALUES ('$book_date', '$book_time', '$booking_visibility', '$total_slot', '$total_slot')";     
    
    // Check if there is any booking slot with same date and time exists
    if(mysqli_query($conn, $check)) {
        echo "<p>The selected booking slot is full.</p>";
    }
    else{
        if (mysqli_query($conn, $sql)) {
            echo "<p>Booking slots has been added successfully!</p>";
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn)

?>