<?php
    echo "
    <div id='chat-callout' class='callout'>
        <span class='closebtn' onclick='this.parentElement.style.display='none';'>×</span>
        <div class='callout-container'>
            <p>Do you require further support? Chat with us today!</p>
        </div>
    </div>



    <div id='chat-box' class='chat-box'>
        <div class='chat-box-close-button'>
            <div class='chat-box-close-button-left'>
                <p> Live Chat Support </p>
            </div>
            <div class='chat-box-close-button-right'>
                <span onclick='closeChat()'><i class='fa fa-window-close' aria-hidden='true'></i></span>
            </div>
        </div>

        <p id='success-text'><i>You have successfully connected to an agent... Say hello!</i></p>


        <!-- Main Content of Messaging -->
        <div id='admin-icon' class='chat-box-adm-icon'>
            <i class='fas fa-headset'></i>
        </div>
        <div id='faq-intro' class='chat-container-admin-intro'>
            <div class='chat-message-admin'>
                <p>Hello! How may we help you? Below are the most frequently asked questions (FAQs), </p>
            </div>
            <div class='chat-message-admin'>
                <a href='#' onclick='openFAQ1()'><p>1. How do I check my bookings?</p></a>
                <a href='#' onclick='openFAQ2()'><p>2. I want to stop receiving notifications!</p></a>" ?>
                <?php 
                if($_SESSION['loggedin'] == 0) {
                    echo "<a href='#' onclick='connectAgent("?> <?php echo $_SESSION['loggedin']; ?> <?php echo ")'><p>I want to talk to a live agent.</p></a>";
                }

                
                else if($_SESSION['loggedin'] == 1){
                    echo "<a href='#' onclick='connectAgent("?> <?php echo $_SESSION['loggedin']; ?> <?php echo ")'>
                        <form method='POST' action='' id='create-registered' name='create-registered'>
                            <input hidden type='text' id='accid' name='accid' value='"?> <?php echo $_SESSION['userid']; ?> <?php echo "'>
                            <p><input id='submit-button-registered' type='submit' value='I want to talk to a live agent.'></p>
                        </form>
                        </a>
                        <script>createRegisteredForm()</script>
                    ";
                }
                ?>
                <?php echo "
            </div>
        </div>


        <div id='faq-faq1' class='chat-container-admin-intro'>
            <span onclick='mainFAQ()'><i class='fa fa-arrow-left' aria-hidden='true'> Back</i></span>
            <div class='chat-message-admin'>
                <p>To check your bookings, you may check it <a href='#'> here </a> </p>
            </div>
            <div class='chat-message-admin'>
                <p>Doesn't help? Try contacting one of our live agents!</p>
            </div>
        </div>



        <div id='faq-faq2' class='chat-container-admin-intro'>
            <span onclick='mainFAQ()'><i class='fa fa-arrow-left' aria-hidden='true'> Back</i></span>
            <div class='chat-message-admin'>
                <p>To stop receiving notifications, disable it from your profile settings. </p>
            </div>
            <div class='chat-message-admin'>
                <p>Doesn't help? Try contacting one of our live agents!</p>
            </div>
        </div>





        <div id='connect-chat' class='chat-container-admin-intro'>
            <div class='chat-message-admin'>
                <p>Attempting to connect you to an agent...</p>
            </div>
        </div>
        


        <p id='form-fill-text'><i>Since you are not logged in, complete this form to chat with an agent.</i></p>
        <p id='outside-working-hours'><i>The chat is currently outside its working hours. Alternatively, you may submit this form or wait for our working hours. <br/>(9AM - 5PM)</i></p>
        <div id='show-form' class='form-live-chat'>
            <form name='submit-inquiry' id='submit-inquiry' method='POST' action=''>
                <table>
                    <tr>
                        <th><label for='name'>Name: </label></th>
                    </tr>   

                    <tr>
                        <td><input name='name' id='name' type='text' value='"?><?php if($_SESSION['loggedin'] == 1){ echo $row['accName'];} ?><?php echo "'></td>
                    </tr>
                    <tr>
                        <th><label for='email'>Email: </label></th>
                    </tr>   

                    <tr>
                        <td><input name='email' id='email' type='email' value='"?><?php if($_SESSION['loggedin'] == 1){ echo $row['accEmail'];}?><?php echo "'></td>
                    </tr>

                    <tr>
                        <th><label for='phone-no'>Phone Number: </label></th>
                    </tr>   

                    <tr>
                        <td><input name='phoneno' id='phoneno' type='text' value='"?><?php if($_SESSION['loggedin'] == 1){ echo $row['accPhoneNo'];}?><?php echo "'></td>
                        <td><input hidden name='userid' id='userid' type='text' value='"?><?php echo $_SESSION['userid']; ?><?php echo "'></td>
                    </tr>

                    <tr>
                        <th><label for='inquiry'>Your Inquiry: </label></th>
                    </tr>   

                    <tr>
                        <td><textarea id='inquiry' name='inquiry' rows='5' cols='40' type = 'text'></textarea></td>
                    </tr>
                </table>
                <input type='submit' name='submit' id='live-chat-form-submit-button'>
            </form>
        </div>

        <script>checkingForm()</script>
        

        <div id='form-submit-success' class='form-submit-success'>
            <i class='fas fa-check-circle'></i>
            <p>Your request has been received. We shall revert to you within 48 hours.</p>
        </div>"?>

        <!-- Main Live Chat Area -->
        <?php
            if($_SESSION['chatid'] != 0){
                echo '<script>continueLiveChat()</script>';
            }
            
        ?>
        <?php echo "
        <div id='main-chat-body'>
            
        </div>
        <script> refreshPage() </script>

        

        <div "?> <?php if($_SESSION['chatid'] == 0){ echo 'id="send-message-box"'; } ?> <?php echo "class='chat-box-message-bottom'>
            <div class='stop-chat-button'>
                <span onclick='confirmEndChat()'><i class='fa-solid fa-right-from-bracket'></i></span>
            </div>
            <form id='send-message-chat' name='send-message-chat' class='send-message-chat' method='POST' action=''>
                <input type='text' id='message' name='message' placeholder='Hello!'>
                <input hidden type='text' id='chatid' name='chatid' value='"?> <?php echo $_SESSION['chatid']; ?> <?php echo "'>
                <input hidden type='text' id='userid' name='userid' value='"?> <?php echo $_SESSION['userid']; ?> <?php echo "'>
                <input type='submit' name='submit-message' id='submit-message' value='>'>
            </form>
        </div>

        <script>sendingChatMessages()</script>
    
        
    </div>

    <div id='chat-box-minimized' class='chat-box-minimized'>
        <div class='chat-box-minimized-box'>
            <span onclick='openChat()'><i class='fas fa-comment'></i></span>
        </div>
    </div>
    "


?>