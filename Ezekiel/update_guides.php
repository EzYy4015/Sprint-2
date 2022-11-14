<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 2"/>
	<meta name="keywords" content="Guides"/>
	<meta name="author" content="Ezekiel Ling"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style/style_guides.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Booking JS -->
    <script src = "script/booking.js"></script>

	<title>Cacti Succulents - Update Guides</title>

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
        $guideID = $_POST['guideID'];
        $guideAddedBy = $_POST['guideAddedBy'];
        $guideTitle = $_POST['guideTitle'];
        $guideDesc = $_POST['guideDesc'];
        $guideDateCreated = $_POST['guideDateCreated'];
        $guideVisible = $_POST['guideVisible'];
    ?>

    <div class = "container">
        <!-- Update Booking -->
        <form id = "form" action = "update_guides_process.php" method = "post">
            <fieldset id = "add-book">
                <legend>
                    <h1><i class="fa-solid fa-pen-to-square"></i>Update Guides</h1>        
                </legend>

                <div class = "booking-input">
                <table>
                        <tr>
                            <th>Guide ID</th>
                            <th>Added By</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "guideID" name = "guideID" value = "<?php echo $guideID; ?>" disabled></td>
                            <td><input type = "text" id = "guideAddedBy" name = "guideAddedBy" value = "<?php echo $guideAddedBy; ?>" disabled></td>
                        </tr>

                        <tr>
                            <th>Guide Title</th>
                            <th>Description</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "guideTitle" name = "guideTitle" value = "<?php echo $guideTitle; ?>" disabled></td>
                            <td><textarea rows="5" cols="50" type = "text" id = "guideDesc" name = "guideDesc" disabled><?php echo $guideDesc; ?></textarea></td>
                        </tr>

                        <tr>
                            <th>Date Created</th>
                        </tr>

                        <tr>
                            <td><input type = "date-local" value = "<?php echo $guideDateCreated; ?>" disabled></td>
                        </tr>

                        <tr>
                            <th>Visibility</th>
                        </tr>

                        <tr>
                            <td>
                                <input type = "text" value = "<?php
                                    if($guideVisible == 0){
                                        echo "Hide";
                                    }
                                    else{
                                        echo "Show";
                                    }
                                ?>" disabled>
                            </td>
                        </tr>
                    </table>

                    <hr>

                    <table>
                        <input type = "hidden" id = "guideID" name = "guideID" value = <?php echo $guideID; ?>>
                        <tr>
                            <th>Guide Title</th>
                            <th>Description</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "aguideTitle" name = "aguideTitle" value = "<?php echo $guideTitle; ?>" required = "required"></td>
                            <td><textarea rows="5" cols="50" type = "text" id = "aguideDesc" name = "aguideDesc" required = "required"><?php echo $guideDesc; ?></textarea></td>
                        </tr>

                        <tr>
                            <th>Visibility</th>
                        </tr>

                        <tr>
                        <td>
                                <select id = "visibility" name = "visibility" required = "required">
                                    <option value = "">- Select -</option>
                                    <option value = "0" <?php if($guideVisible == 0) { echo 'selected'; } ?>>Hide</option>
                                    <option value = "1" <?php if($guideVisible == 1) { echo 'selected'; } ?>>Show</option>
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