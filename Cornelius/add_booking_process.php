<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 1"/>
	<meta name="keywords" content="Admin Booking"/>
	<meta name="author" content="Cornelius Lee Jun Teng"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style.css">
	<!-- Font Awesome (Icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Admin Add Booking Process</title>

    <!-- Font Type -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class="fa-solid fa-seedling"></i>
                <div class="logo_name">Cacti-Succulent</div>
            </div>
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>
        <ul class="navlist">
            <li>
                <a href = "add_booking.php">
                    <i class="fa-solid fa-plus"></i>
                    <span class = "links_name">Add Booking</span>
                </a>
                <span class="tooltip">Add Booking</span>
            </li>
            <li>
                <a href = "delete_booking.php">
                    <i class="fa-solid fa-trash"></i>
                    <span class = "links_name">Delete Booking</span>
                </a>
                <span class="tooltip">Delete Booking</span>
            </li>
            <li>
                <a href = "update_booking.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span class = "links_name">Update Booking</span>
                </a>
                <span class="tooltip">Update Booking</span>
            </li>
        </ul>
    </div>

    <script src = "side_bar.js"></script>

    <div class = "container">
        <div class="inner_container">
            <h1>Result</h1>
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

            <a class = "return" href = "add_booking.php">Return to Booking Page</a>
        </div> 
    </div>

</body>

</html>