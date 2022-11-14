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
	<!-- Font Awesome (Icon) -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Booking JS -->
    <script src = "script/booking.js"></script>

	<title>Cacti Succulents - Guides Management</title>

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

            <h1>Guides</h1>
            <?php    

            
                if (!isset ($_GET['page']) ) {  
                
                    $page_number = 1;  
                
                } else {  
                
                    $page_number = $_GET['page'];  
                
                }  

                // variable to store the number of rows per page       
                $limit = 5;  

                // get the initial page number
                $initial_page = ($page_number-1) * $limit; 

                // query to retrieve all rows from the table Countries 
                $sql = "SELECT g.*, ac.AccName FROM guides g JOIN accounts ac ON g.guideAddedBy = ac.accID ORDER BY guideDateCreated DESC";

                // get the result
                $result = mysqli_query($con, $sql);  

                $total_rows = mysqli_num_rows($result); 

                // get the required number of pages
                $total_pages = ceil ($total_rows / $limit);  

                // get data of selected rows per page    
                $getGuides = "SELECT g.*, ac.AccName FROM guides g JOIN accounts ac ON g.guideAddedBy = ac.accID ORDER BY guideDateCreated DESC LIMIT " . $initial_page . ',' . $limit; 

                $result2 = mysqli_query($con, $getGuides);  

                if (mysqli_num_rows($result2) > 0) {
                    echo "<table>";
                    echo 
                        "<tr class = 'table_heading'>
                            <th>Added By</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Visibility</th>
                            <th>Action</th>
                        </tr>";
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result2)) {
                        
                        echo "<td>" . $row["AccName"] . "</td>";
                        echo "<td>" . $row["guideTitle"] . "</td>";
                        echo "<td>" . substr($row["guideDesc"], 0, 50) . "...</td>";
                        echo "<td>" . $row["guideDateCreated"] . "</td>";
                        echo "<td>" . $row["guideVisible"] . "</td>";

                        // Create form to bring data to other page
                        echo "<td class = 'action1'>
                                <ul>
                                    <li>
                                        <form id = 'update_form' action = 'update_guides.php' method = 'post'>
                                            <input type = 'hidden' name  = 'guideID' value = '" . $row["guideID"] . "'> 
                                            <input type = 'hidden' name  = 'guideAddedBy' value = '" . $row["guideAddedBy"] . " - " . $row["AccName"] . "'> 
                                            <input type = 'hidden' name  = 'guideTitle' value = '" . $row["guideTitle"] . "'>
                                            <input type = 'hidden' name  = 'guideDesc' value = '" . $row['guideDesc'] . "'>
                                            <input type = 'hidden' name  = 'guideDateCreated' value = '" . $row["guideDateCreated"] . "'> 
                                            <input type = 'hidden' name  = 'guideVisible' value = '" . $row["guideVisible"] . "'>
                                            <input type = 'submit' id = 'btn_update1' name = 'btn_update' value = 'Update'>
                                        </form>
                                    </li>

                                    <li>
                                        <form id = 'delete_form' action = 'delete_guides_process.php' method = 'post' onsubmit = 'return confirmDelete()'>
                                            <input type = 'hidden' name  = 'guideID' value = '" . $row["guideID"] . "'> 
                                            <input type = 'submit' id = 'btn_delete1' name = 'btn_delete' value = 'Delete'>
                                        </form>
                                    </li>     
                                         
                                </ul>
                            </td></tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "<h2>No guides found.</h2>";
                }
                     
                // show page number with link   
        
                for($page_number = 1; $page_number<= $total_pages; $page_number++) {  
        
                    echo '<div class="pagination"><a href = "manage-guides.php?page=' . $page_number . '">' . $page_number . ' </a> </div>';  
        
                } 

            ?>
        </div>

        <!-- Add Booking -->
        <form id = "form" action = "add_guides_process.php" method = "post" onsubmit = "return validateBooking()">
            <fieldset id = "add-book">
                <legend>
                    <h1><i class="fa-solid fa-plus"></i>Add Guides</h1>        
                </legend>

                <div class = "booking-input">
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "aguideTitle" name = "aguideTitle" value = "<?php ?>" required = "required"></td>
                            <td><textarea rows="5" cols="50" type = "text" id = "aguideDesc" name = "aguideDesc" required = "required"> </textarea></td>
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