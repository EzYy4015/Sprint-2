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

	<title>Cacti Succulents - Update Promotion</title>

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
        $promoID = $_POST['promoID'];
        $promoAddedBy = $_POST['promoAddedBy'];
        $promoTitle = $_POST['promoTitle'];
        $promoDesc = $_POST['promoDesc'];
        $promoDateCreated = $_POST['promoDateCreated'];
        $promoDuration = $_POST['promoDuration'];
        $promoImage = $_POST['promoImage'];
        $promoVisible = $_POST['promoVisible'];
    ?>

    <div class = "container">
        <!-- Update Booking -->
        <form id = "form" action = "update_promotions_process.php" method = "post">
            <fieldset id = "add-book">
                <legend>
                    <h1><i class="fa-solid fa-pen-to-square"></i>Update Promotion</h1>        
                </legend>

                <div class = "booking-input">
                <table>
                        <tr>
                            <th>Promotion ID</th>
                            <th>Added By</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "promoID" name = "promoID" value = "<?php echo $promoID; ?>" disabled></td>
                            <td><input type = "text" id = "promoAddedBy" name = "promoAddedBy" value = "<?php echo $promoAddedBy; ?>" disabled></td>
                        </tr>

                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "promoTitle" name = "promoTitle" value = "<?php echo $promoTitle; ?>" disabled></td>
                            <td><textarea rows="5" cols="50" type = "text" id = "promoDesc" name = "promoDesc" disabled><?php echo $promoDesc; ?></textarea></td>
                        </tr>

                        <tr>
                            <th>Date Created</th>
                            <th>Until</th>
                        </tr>

                        <tr>
                            <td><input type = "datetime-local" value = "<?php echo $promoDateCreated; ?>" disabled></td>
                            <td><input type = "text" value = "<?php echo $promoDuration; ?>" disabled></td>
                        </tr>

                        <tr>
                            <th>Image</th>
                            <th>Visibility</th>
                        </tr>

                        <tr>
                            <td><input type = "text" value = "<?php echo $promoImage; ?>" disabled></td>
                            <td>
                                <input type = "text" value = "<?php
                                    if($promoVisible == 0){
                                        echo "Hide";
                                    }
                                    else{
                                        echo "Show";
                                    }
                                ?>" disabled>
                            </td>
                            <div class="show-img"><img src="<?php echo $promoImage; ?>"></div>
                        </tr>
                    </table>

                    <hr>

                    <table>
                        <input type = "hidden" id = "promoID" name = "promoID" value = <?php echo $promoID; ?>>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "apromoTitle" name = "apromoTitle" value = "<?php echo $promoTitle; ?>" required = "required"></td>
                            <td><textarea rows="5" cols="50" type = "text" id = "apromoDesc" name = "apromoDesc" required = "required"><?php echo $promoDesc; ?></textarea></td>
                        </tr>

                        <tr>
                            <th>Until</th>
                            <th>Image <p class="red-notice">Ensure that the image has been added to the directory.</p></th>
                        </tr>

                        <tr>
                            <td><input type = "datetime-local" id = "aDateUntil" name = "aDateUntil" value = "<?php echo $promoDuration ?>" required = "required"></td>
                            <td><input type = "text" id = "aImage" name = "aImage" value = "<?php echo $promoImage; ?>" required = "required"></td>
                        </tr>

                        <tr>
                            <th>Visibility</th>
                        </tr>

                        <tr>
                        <td>
                                <select id = "visibility" name = "visibility" required = "required">
                                    <option value = "">- Select -</option>
                                    <option value = "0" <?php if($promoVisible == 0) { echo 'selected'; } ?>>Hide</option>
                                    <option value = "1" <?php if($promoVisible == 1) { echo 'selected'; } ?>>Show</option>
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