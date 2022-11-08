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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Booking JS -->
    <script src = "script/booking.js"></script>

	<title>Cacti Succulents - Update Products</title>

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
        $prodID = $_POST['prodID'];
        $prodAddedBy = $_POST['prodAddedBy'];
        $prodTitle = $_POST['prodTitle'];
        $prodDesc = $_POST['prodDesc'];
        $prodAddedDate = $_POST['prodAddedDate'];
        $prodImage = $_POST['prodImage'];
        $prodVisible = $_POST['prodVisible'];
    ?>

    <div class = "container">
        <!-- Update Booking -->
        <form id = "form" action = "update_products_process.php" method = "post">
            <fieldset id = "add-book">
                <legend>
                    <h1><i class="fa-solid fa-pen-to-square"></i>Update Product</h1>        
                </legend>

                <div class = "booking-input">
                <table>
                        <tr>
                            <th>Product ID</th>
                            <th>Added By</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "prodID" name = "prodID" value = "<?php echo $prodID; ?>" disabled></td>
                            <td><input type = "text" id = "prodAddedBy" name = "prodAddedBy" value = "<?php echo $prodAddedBy; ?>" disabled></td>
                        </tr>

                        <tr>
                            <th>Product Name</th>
                            <th>Description</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "prodTitle" name = "prodTitle" value = "<?php echo $prodTitle; ?>" disabled></td>
                            <td><textarea rows="5" cols="50" type = "text" id = "prodDesc" name = "prodDesc" disabled><?php echo $prodDesc; ?></textarea></td>
                        </tr>

                        <tr>
                            <th>Date Added</th>
                        </tr>

                        <tr>
                            <td><input type = "date-local" value = "<?php echo $prodAddedDate; ?>" disabled></td>
                        </tr>

                        <tr>
                            <th>Image</th>
                            <th>Visibility</th>
                        </tr>

                        <tr>
                            <td><input type = "text" value = "<?php echo $prodImage; ?>" disabled></td>
                            <td>
                                <input type = "text" value = "<?php
                                    if($prodVisible == 0){
                                        echo "Hide";
                                    }
                                    else{
                                        echo "Show";
                                    }
                                ?>" disabled>
                            </td>
                            <div class="show-img"><img src="<?php echo $prodImage; ?>"></div>
                        </tr>
                    </table>

                    <hr>

                    <table>
                        <input type = "hidden" id = "prodID" name = "prodID" value = <?php echo $prodID; ?>>
                        <tr>
                            <th>Product Name</th>
                            <th>Description</th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "aprodTitle" name = "aprodTitle" value = "<?php echo $prodTitle; ?>" required = "required"></td>
                            <td><textarea rows="5" cols="50" type = "text" id = "aprodDesc" name = "aprodDesc" required = "required"><?php echo $prodDesc; ?></textarea></td>
                        </tr>

                        <tr>
                            
                            <th>Image <p class="red-notice">Ensure that the image has been added to the directory.</p></th>
                        </tr>

                        <tr>
                            <td><input type = "text" id = "aImage" name = "aImage" value = "<?php echo $prodImage; ?>" required = "required"></td>
                        </tr>

                        <tr>
                            <th>Visibility</th>
                        </tr>

                        <tr>
                        <td>
                                <select id = "visibility" name = "visibility" required = "required">
                                    <option value = "">- Select -</option>
                                    <option value = "0" <?php if($prodVisible == 0) { echo 'selected'; } ?>>Hide</option>
                                    <option value = "1" <?php if($prodVisible == 1) { echo 'selected'; } ?>>Show</option>
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