<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="utf-8" />
        <title>Homepage</title>
        <link rel="stylesheet" href="index.css">
        <?php
        $bannerID = $_GET['bannerID'];
        $bannerImage = $_GET['bannerImage'];
        $bannerDateCreated = $_GET['bannerDateCreated'];
        $bannerDuration= $_GET['bannerDuration'];
        $bannerVisible = $_GET['bannerVisible'];
        ?>
    </head>

    <body>
        <form action="update_banner_process.php" method="grt" id="banner_update_form" name="bannerUpdate">
            <label for="fname">Banner ID: </label>
            <input type="text" name="update_bannerID" value="<?php echo "$bannerID"?>" readonly><br><br>

            <textarea rows="4" cols="50" name="update_banner" form="banner_update_form"><?php echo "$bannerImage"?></textarea><br><br>

            <div class='banner_added_date'>Banner Date Created: <?php echo "$bannerDateCreated"?></div>

            <label for="valid_date">Valid Until:</label>
            <input type="datetime-local" name="update_valid_date" value="<?php echo "$bannerDuration"?>"><br><br>

            <label for="visibility">Visibility to visitor:</label>
            <select id="visibility" name="update_visibility">
                    <option value="1" selected="selected">Visible</option>
                    <option value="0">Not visible</option>
            </select><br><br>

            <input type="submit" value="Update Banner">
        </form>
    </body>
</html>

