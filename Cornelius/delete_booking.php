<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 1"/>
	<meta name="keywords" content="Admin Booking"/>
	<meta name="author" content="Cornelius Lee Jun Teng"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Admin Delete Booking</title>

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

    <script src = "booking.js"></script>
    <div class = "container">
        <form id = "form" action = "insert_booking.php" method = "post">
            <fieldset id = "add-book">
                <legend>
                    <span><i class="fa-solid fa-trash"></i>Delete Slot</span>        
                </legend>

                <div class = "booking-input">
                    <span><input type = "date" id = "book-date" name = "book-date" value = "<?php echo date('Y-m-d'); ?>"></span>
                    <span><input type = "time" id = "book-time" name = "book-time" step = 3600></span>
                </div>

                <button id = "book-button" onclick = "AddBooking()">BOOK</button>
            </fieldset>
        </form>
    </div>
</body>

</html>