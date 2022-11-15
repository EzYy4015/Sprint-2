<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent - Preferences </title>
<link rel="stylesheet" type="text/css" href="style/style-profile2.css"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<script src="script/script.js"></script>

</head>
<body>
  <?php

      include("include/navigation.php");
      include("include/connection.php");
      include("include/functions.php");

      check_userlogin();

      $userid = $_SESSION['userid'];
      $searchpreferences = "SELECT * FROM accounts WHERE accID = $userid";
      $fetchresults = mysqli_query($con, $searchpreferences);
      $row = mysqli_fetch_array($fetchresults)


  ?>
  <div class = "adminChatBox">
    <div class="wrapper">
      <section class="chat-area">
        <header>
          <a href="adminChat.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <div class="details">
            <span><?php echo $row['accName']?></span>
            <p><?php echo $row['accEmail']; ?></p>
          </div>
        </header>
        <div class="chat-box">

        </div>
        <form action="#" class="typing-area">
          <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $userid; ?>" hidden>
          <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
          <button><i class="fab fa-telegram-plane"></i></button>
        </form>
      </section>
    </div>
  </div>
  <script src="script/realchat.js"></script>
  <?php include("include/footer.php"); ?>
</body>
</html>
