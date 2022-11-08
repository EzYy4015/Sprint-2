<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 2"/>
	<meta name="keywords" content="ProductnDiscussions"/>
	<meta name="author" content="Ezekiel Ling"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style/style_adminbooking.css">
	<!-- Font Awesome (Icon) -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Booking JS -->
    <script src = "script/booking.js"></script>

	<title>Cacti Succulents - Products_n_Discussions Management</title>

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
            <h1>Products</h1>
            <?php    

                $sql = "SELECT p.*, ac.AccName FROM products p JOIN accounts ac ON p.prodAddedBy = ac.accID";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo 
                        "<tr class = 'table_heading'>
                            <th>Added By</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date Added</th>
                            <th>Image</th>
                            <th>Visibility</th>
                            <th>Action</th>
                        </tr>";
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<td>" . $row["AccName"] . "</td>";
                        echo "<td>" . $row["prodTitle"] . "</td>";
                        echo "<td>" . substr($row["prodDesc"], 0, 50) . "...</td>";
                        echo "<td>" . $row["prodAddedDate"] . "</td>";
                        echo "<td>" . $row["prodImage"] . "</td>";
                        echo "<td>" . $row["prodVisible"] . "</td>";

                        // Create form to bring data to other page
                        echo "<td class = 'action1'>
                                <ul>
                                    <li>
                                        <form id = 'update_form' action = 'update_products.php' method = 'post'>
                                            <input type = 'hidden' name  = 'prodID' value = '" . $row["prodID"] . "'> 
                                            <input type = 'hidden' name  = 'prodAddedBy' value = '" . $row["prodAddedBy"] . " - " . $row["AccName"] . "'> 
                                            <input type = 'hidden' name  = 'prodTitle' value = '" . $row["prodTitle"] . "'>
                                            <input type = 'hidden' name  = 'prodDesc' value = '" . $row['prodDesc'] . "'>
                                            <input type = 'hidden' name  = 'prodAddedDate' value = '" . $row["prodAddedDate"] . "'> 
                                            <input type = 'hidden' name  = 'prodImage' value = '" . $row["prodImage"] . "'> 
                                            <input type = 'hidden' name  = 'prodVisible' value = '" . $row["prodVisible"] . "'>
                                            <input type = 'submit' id = 'btn_update1' name = 'btn_update' value = 'Update'>
                                        </form>
                                    </li>

                                    <li>
                                        <form id = 'delete_form' action = 'delete_products_process.php' method = 'post' onsubmit = 'return confirmDelete()'>
                                            <input type = 'hidden' name  = 'prodID' value = '" . $row["prodID"] . "'> 
                                            <input type = 'submit' id = 'btn_delete1' name = 'btn_delete' value = 'Delete'>
                                        </form>
                                    </li>     
                                     
                                    <li>
                                    <form id = 'delete_form' action = 'manage-discussions.php' method = 'post'>
                                        <input type = 'hidden' name  = 'prodID' value = '" . $row["prodID"] . "'> 
                                        <input type = 'submit' id = 'btn_comments' name = 'btn_delete' value = 'Comments'>
                                    </form>
                                </li>        
                                </ul>
                            </td></tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "<h2>No products found.</h2>";
                }
            ?>
        </div>

        <!-- Add Booking -->
        <form id = "form" action = "add_products_process.php" method = "post" onsubmit = "return validateBooking()">
            <fieldset id = "add-book">
                <legend>
                    <h1><i class="fa-solid fa-plus"></i>Add Products</h1>        
                </legend>

                <div class = "booking-input">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "aprodTitle" name = "aprodTitle" value = "<?php ?>" required = "required"></td>
                            <td><textarea rows="5" cols="50" type = "text" id = "aprodDesc" name = "aprodDesc" required = "required"> </textarea></td>
                        </tr>

                        <tr>
                            <th>Image <p class="red-notice">Ensure that the image has been added to the directory.</p></th>
                        </tr>

                        <tr>
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