<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="utf-8" />
        <title>Homepage</title>
        <link rel="stylesheet" href="booking.css">
    </head>

    <body>
        
    <div class=banner_container>
        <form action="add_banner.php" method="post" id="banner_form" name="AddBanner">
            <div class="banner_session">
                <textarea rows="2" cols="50" name="banner" form="banner_form" placeholder='Please input new banner content here'></textarea>
            </div>

            <div class="banner_session">
                <label for="valid_date">Valid Until:</label>
                <input type="datetime-local" name="valid_date">
            </div>

            <div class="banner_session select_visible">
                <label for="visibility">Visibility to visitor:</label>
                <select id="visibility" name="visibility">
                    <option value="1">Visible</option>
                    <option value="0">Not visible</option>
                </select>
            </div>

            <div class="banner_session">
                <input type="submit" value="Add Banner" class="add_banner_button">
            </div>
        </form>
    </div>


        
        <div id="testing1">
            <?php 
            include("test_connection.php");
            include("edit_banner.php");
            ?>
        </div>

       
    </body>
</html>

