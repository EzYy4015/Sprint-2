<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 1"/>
	<meta name="keywords" content="Admin Booking"/>
	<meta name="author" content="Cornelius Lee Jun Teng"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style/style_adminbooking.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Booking JS -->
    <script src = "script/booking.js"></script>

	<title>Cacti Succulents - Update Banner</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <?php 
        include ("include/navbar-management.php"); 
        include ('include/connection.php');  
        include("include/functions.php");
        check_login();
    ?>

    <script src = "script/side_bar.js"></script>

    
    <?php
        $bannerID = $_POST['bannerID'];
        $bannerAddedBy = $_POST['bannerAddedBy'];
        $bannerDateCreated = $_POST['bannerDateCreated'];
        $bannerDuration = $_POST['bannerDuration'];
        $bannerImage = $_POST['bannerImage'];
        $bannerVisible = $_POST['bannerVisible'];
    ?>

    <div class = "container">
        <!-- Update Booking -->
        <form id = "form" action = "update_banner_process.php" method = "post">
            <fieldset id = "add-book">
                <legend>
                    <h1><i class="fa-solid fa-pen-to-square"></i>Update Banner</h1>        
                </legend>

                <div class = "booking-input">
                <table>
                        <tr>
                            <th>Banner ID</th>
                            <th>Added By</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "bannerID" name = "bookingID" value = "<?php echo $bannerID; ?>" disabled></td>
                            <td><input type = "text" id = "bannerAddedBy" name = "bannerAddedBy" value = "<?php echo $bannerAddedBy; ?>" disabled></td>
                        </tr>

                        <tr>
                            <th>Date Created</th>
                            <th>Until</th>
                        </tr>

                        <tr>
                            <td><input type = "text" value = "<?php echo $bannerDateCreated; ?>" disabled></td>
                            <td><input type = "text" value = "<?php echo $bannerDuration; ?>" disabled></td>
                        </tr>

                        <tr>
                            <th>Image</th>
                            <th>Visibility</th>
                        </tr>

                        <tr>
                            <td><input type = "text" value = "<?php echo $bannerImage; ?>" disabled></td>
                            <td>
                                <input type = "text" value = "<?php
                                    if($bannerVisible == 0){
                                        echo "Hide";
                                    }
                                    else{
                                        echo "Show";
                                    }
                                ?>" disabled>
                            </td>
                            <div class="show-img"><img src="<?php echo $bannerImage; ?>"></div>
                        </tr>
                    </table>

                    <hr>

                    <table>
                        <input type = "hidden" id = "bannerID" name = "bannerID" value = <?php echo $bannerID; ?>>
                        <tr>
                            <th>Until</th>
                            <th>Image <p class="red-notice">Ensure that the image has been added to the directory and is 1980 x 1080 in size.</p></th>
                        </tr>

                        <tr>
                            <td><input type = "datetime-local" id = "date-until" name = "date-until" value = "<?php echo $bannerDuration; ?>" required = "required"></td>
                            <td><input type = "text" id = "banner-image" name = "banner-image" value = "<?php echo $bannerImage; ?>" required = "required"></td>
                        </tr>

                        <tr>
                            <th>Visibility <p class="red-notice">Note that there can only be one banner visible at once.</p></th>
                        </tr>

                        <tr>
                        <td>
                                <select id = "visibility" name = "visibility" required = "required">
                                    <option value = "">- Select -</option>
                                    <option value = "0" <?php if($bannerVisible == 0) { echo 'selected'; } ?>>Hide</option>
                                    <option value = "1" <?php if($bannerVisible == 1) { echo 'selected'; } ?>>Show</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    
                    
                </div>

                <button id = "book-button">UPDATE</button>
            </fieldset>
        </form>
    </div>
</body>

</html>