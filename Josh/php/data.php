<?php
    while($row = mysqli_fetch_assoc($query)){
      $userid = $_SESSION['userid'];
        $sql2 = "SELECT * FROM livechat lc JOIN livechatmessages lm ON lc.chatID = lm.chatID WHERE chatVisitorID = '$userid'" ;
        $query2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if($row2['chatAdminID'] == 0){
          $result = $row3['formMessage'];
        }
        else{
          $result = $row2['chatMessage'];
        }
        if(strlen($result) > 28){
          $msg =  substr($result, 0, 28) . '...';
        }
        else{
          $msg = $result;
        }
        if(isset($row2['chatmessageID'])){
            ($outgoing_id == $row2['chatmessageID']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }


        $output .= '<a href="realChat.php?userid='. $row['formVisitorID'] .'">
                    <div class="content">

                    <div class="details">
                        <span>'. $row['formName'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>
