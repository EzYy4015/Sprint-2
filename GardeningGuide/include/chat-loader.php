<?php 
    session_start();
    include("connection.php");

    if($_SESSION['chatid'] != 0){
        $userid = $_SESSION['userid'];
        $chatid = $_SESSION['chatid'];

        // Fetch all the messages.
        $searchmessagesvisitor = "SELECT * FROM livechatmessages WHERE chatID = '$chatid' ORDER BY chatDateSent ASC";
        $fetchmessagevisitor = mysqli_query($con, $searchmessagesvisitor);


        // Then display if FROM is the visitor, then display on visitor side. If TO is the admin, then display the other side. 
        // Messages are already sorted. 

        while($messagesresult = mysqli_fetch_assoc($fetchmessagevisitor)){
            if($messagesresult['chatFrom'] == $userid){
                echo '
                <div class="chat-box-vis-icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="chat-container-visitor">
                    <div class="chat-message-visitor">
                        <p>'?> <?php echo $messagesresult['chatMessage']; ?> <?php echo '</p>
                    </div>
                </div>
                ';
            } else if($messagesresult['chatTo'] == $userid){
                echo '
                <div class="chat-box-adm-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="chat-container-admin-intro">
                    <div class="chat-message-admin">
                        <p>'?> <?php echo $messagesresult['chatMessage']; ?> <?php echo '</p>
                    </div>
                </div>
                ';
            }
        }
    }
?>