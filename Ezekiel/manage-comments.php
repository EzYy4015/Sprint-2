<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Sprint 2"/>
	<meta name="keywords" content="Comments"/>
	<meta name="author" content="Ezekiel Ling"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "style/style_products.css">
	<!-- Font Awesome (Icon) -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Booking JS -->
    <script src = "script/booking.js"></script>

	<title>Cacti Succulents - Comments Management</title>

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
            <h1>Comments</h1>
            <?php    

                $prodID = $_POST['prodID'];
                $sql = "SELECT * FROM discussions WHERE discProduct = $prodID";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo 
                        "<tr class = 'table_heading'>
                            <th>Added By</th>
                            <th>Comments</th>
                            <th>Date Added</th>
                            <th>Visibility</th>
                            <th>Action</th>
                        </tr>";
                    // output data of each row
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<td>"  . $row["discAddedBy"] . "</td>";                     
                        echo "<td>" . substr($row["prodDisc"], 0, 50) . "...</td>";
                        echo "<td>" . $row["discAddedDate"] . "</td>";     
                        echo "<td>" . $row["discVisible"] . "</td>";

                        // Create form to bring data to other page
                        echo "<td class = 'action2'>
                                <ul>
                                    <li>
                                        <form id = 'delete_form2' action = 'update_comments_process.php' method = 'post' onsubmit = 'return confirmUpdate()'>
                                            <input type = 'hidden' name  = 'discID' value = '" . $row["discID"] . "'> 
                                            <input type = 'hidden' name  = 'discVisible' value = '" . $row['discVisible'] . "'>
                                            <input type = 'submit' id = 'btn_update' name = 'btn_update' value = 'Update'>
                                        </form>
                                    </li>

                                    <li>
                                        <form id = 'delete_form2' action = 'delete_comments_process.php' method = 'post' onsubmit = 'return confirmDelete()'>
                                            <input type = 'hidden' name  = 'discID' value = '" . $row["discID"] . "'> 
                                            <input type = 'submit' id = 'btn_delete' name = 'btn_delete' value = 'Delete'>
                                        </form>
                                    </li>     
                                </li>        
                                </ul>
                            </td></tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "<h2>No Comments found.</h2>";
                }
            ?>
        </div>

        <!-- Add Comment -->
        <form id = "form" action = "add_comments_process.php" method = "post" onsubmit = "return validateBooking()">
            <fieldset id = "add-book">
                <legend>
                    <h1><i class="fa-solid fa-plus"></i>Add Comments</h1>        
                </legend>

                <div class = "booking-input">
                    <table>
                        <tr>
                            <th>Product ID</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "prodID" name = "prodID" value = "<?php echo $prodID; ?>" readonly="true"></td>
                        </tr>

                        <tr>
                            <th>Comments</th>
                        </tr>

                        <tr>
                            <td><textarea rows="5" cols="50" type = "text" id = "acomment" name = "acomment" required = "required"> </textarea></td>
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