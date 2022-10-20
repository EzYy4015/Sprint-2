<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="utf-8" />
        <title>Homepage</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body>
        <header>
            <div class="logo">
                <div id="cacti">Cacti-Succulent </div>
            </div>
            <div id="banner">
                <form action="add_banner.php" method="post" id="banner_form">
                    <textarea rows="4" cols="50" name="banner" form="banner_form">
                        Enter text here...</textarea>
                    <label>Valid Until</label>
                    <input type="datetime-local" name="valid_date">
                    <label for="visibility">Visibility to visitor:</label>
                    <select id="visibility" name="visibility">
                        <option value="1">Visible</option>
                        <option value="0">Not visible</option>
                    </select>
                    <button type="submit">Add</button>
                </form>
                <div id="testing1">
                  <?php 
                  include("test_connection.php");
                  include("display_banner.php");
                  ?>
                </div>
            </div>
        </header>

        <section class="container">
            <div class="login_section">
                <a href="#">
                    <div class="login">
                    Login
                    </div>
                </a>
            </div>
        
            <div class="promotion_advertisement">
                <div class="promotion">
                    <h2>Promotion</h2>
                    <p>This is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotionThis is promotion</p>
                </div>

                <hr>
                <hr>

                <div class="advertisement">
                    <h2>Advertisement</h2>
                    <p>This is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisementThis is advertisement</p>
                </div>
            </div>
        </section>
        
        <section class="link_to_pages" >
            <a href="#">
                <div class="link_to">
                Page
                </div>
            </a>

            <a href="#">
                <div class="link_to">
                Page
                </div>
            </a>

            <a href="#">
                <div class="link_to">
                Page
                </div>
            </a>

            <a href="#">
                <div class="link_to">
                Page
                </div>
            </a>

            <a href="#">
                <div class="link_to">
                Page
                </div>
            </a>

            <a href="#">
                <div class="link_to">
                Page
                </div>
            </a>

            <a href="#">
                <div class="link_to">
                Page
                </div>
            </a>

            <a href="#">
                <div class="link_to">
                Page
                </div>
            </a>
        </section>
        
        <footer>
            <div class="footer-container">
              <div class="footer">
                <div class="footer-heading footer1">
                  <h2>Team Members</h2>
                  <a href="#">Ezekiel</a>
                  <a href="#">Yuk Fung</a>
                  <a href="#">Jing Hong</a>
                  <a href="#">Josh</a>
                  <a href="#">Cornelius</a>
                  <a href="#">Jaden</a>
                </div>
                <div class="footer-heading footer2">
                  <h2>Team Members</h2>
                  <a href="#">Ezekiel</a>
                  <a href="#">Yuk Fung</a>
                  <a href="#">Jing Hong</a>
                  <a href="#">Josh</a>
                  <a href="#">Cornelius</a>
                  <a href="#">Jaden</a>
                </div>
                <div class="footer-heading footer3">
                  <h2>Social Media</h2>
                  <a href="#">Facebook</a>
                  <a href="#">Instagram</a>
                  <a href="#">Twitter</a>
                </div>
              </div>
            </div>
            <div class="footer-bottom">
              <p>&copy; 2022 - All rights reserved.</p>
            </div>
          </footer>

          <script src="index.js"></script>

    </body>
</html>

