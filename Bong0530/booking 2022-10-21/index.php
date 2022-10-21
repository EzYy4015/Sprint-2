<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="utf-8" />
        <title>Homepage</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body>
        
            
                <form action="add_banner.php" method="post" id="banner_form" name="AddBanner">
                    <textarea rows="4" cols="50" name="banner" form="banner_form" placeholder='Please input new banner content here'></textarea>
                    <label for="valid_date">Valid Until:</label>
                    <input type="datetime-local" name="valid_date">
                    <label for="visibility">Visibility to visitor:</label>
                    <select id="visibility" name="visibility">
                        <option value="1">Visible</option>
                        <option value="0">Not visible</option>
                    </select>
                    <input type="submit" value="Add Banner">
                </form>
                
                <div id="testing1">
                  <?php 
                  include("test_connection.php");
                  include("display_banner.php");
                  ?>
                </div>

       
    </body>
</html>

