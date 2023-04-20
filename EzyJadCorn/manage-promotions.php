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
	<!-- Font Awesome (Icon) -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Booking JS -->
    <script src = "script/booking.js"></script>

	<title>Cacti Succulents - Promotions Management</title>

    <!-- Font Type -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Poppins Font -->
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

    <div class = "container">
        <!-- Booking Detail -->
        <div class="booking_detail">
            <h1>Promotions</h1>
            <?php    

                $sql = "SELECT p.*, ac.AccName FROM promotions p JOIN accounts ac ON p.promoAddedBy = ac.accID";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo 
                        "<tr class = 'table_heading'>
                            <th>Added By</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Until</th>
                            <th>Image</th>
                            <th>Visibility</th>
                            <th>Action</th>
                        </tr>";
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<td>" . $row["AccName"] . "</td>";
                        echo "<td>" . $row["promoTitle"] . "</td>";
                        echo "<td>" . substr($row["promoDesc"], 0, 50) . "...</td>";
                        echo "<td>" . $row["promoDateCreated"] . "</td>";
                        echo "<td>" . $row["promoDuration"] . "</td>";
                        echo "<td>" . $row["promoImage"] . "</td>";
                        echo "<td>" . $row["promoVisible"] . "</td>";

                        // Create form to bring data to other page
                        echo "<td class = 'action'>
                                <ul>
                                    <li>
                                        <form id = 'update_form' action = 'update_promotions.php' method = 'post'>
                                            <input type = 'hidden' name  = 'promoID' value = '" . $row["promoID"] . "'> 
                                            <input type = 'hidden' name  = 'promoAddedBy' value = '" . $row["promoAddedBy"] . " - " . $row["AccName"] . "'> 
                                            <input type = 'hidden' name  = 'promoTitle' value = '" . $row["promoTitle"] . "'>
                                            <input type = 'hidden' name  = 'promoDesc' value = '" . $row['promoDesc'] . "'>
                                            <input type = 'hidden' name  = 'promoDateCreated' value = '" . $row["promoDateCreated"] . "'> 
                                            <input type = 'hidden' name  = 'promoDuration' value = '" . $row["promoDuration"] . "'> 
                                            <input type = 'hidden' name  = 'promoImage' value = '" . $row["promoImage"] . "'> 
                                            <input type = 'hidden' name  = 'promoVisible' value = '" . $row["promoVisible"] . "'>
                                            <input type = 'submit' id = 'btn_update' name = 'btn_update' value = 'Update'>
                                        </form>
                                    </li>

                                    <li>
                                        <form id = 'delete_form' action = 'delete_promotions_process.php' method = 'post' onsubmit = 'return confirmDelete()'>
                                            <input type = 'hidden' name  = 'promoID' value = '" . $row["promoID"] . "'> 
                                            <input type = 'submit' id = 'btn_delete' name = 'btn_delete' value = 'Delete'>
                                        </form>
                                    </li>             
                                </ul>
                            </td></tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "<h2>No promotions found.</h2>";
                }
            ?>
        </div>

        <!-- Add Booking -->
        <form id = "form" action = "add_promotions_process.php" method = "post" onsubmit = "return validateBooking()">
            <fieldset id = "add-book">
                <legend>
                    <h1><i class="fa-solid fa-plus"></i>Add Promotion</h1>        
                </legend>

                <div class = "booking-input">
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "apromoTitle" name = "apromoTitle" value = "<?php ?>" required = "required"></td>
                            <td><textarea rows="5" cols="50" type = "text" id = "apromoDesc" name = "apromoDesc" required = "required"> </textarea></td>
                        </tr>

                        <tr>
                            <th>Until</th>
                            <th>Image <p class="red-notice">Ensure that the image has been added to the directory.</p></th>
                        </tr>

                        <tr>
                            <td><input type = "datetime-local" id = "aDateUntil" name = "aDateUntil" value = "<?php  ?>" required = "required"></td>
                            <td><input type = "text" id = "aImage" name = "aImage" value = "<?php  ?>" required = "required"></td>
                        </tr>

                        <tr>
                            <th>Visibility</th>
                        </tr>

                        <tr>
                        <td>
                                <select id = "visibility" name = "visibility" required = "required">
                                    <option value = "">- Select -</option>
                                    <option value = "0">Hide</option>
                                    <option value = "1">Show</option>
                                </select>
                            </td>
                        </tr>
                    </table>              
                </div>

                <button id = "book-button">ADD</button>
            </fieldset>
        </form>
    </div>

    
</body>

</html>