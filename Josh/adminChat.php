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
      <section class="users">
        <header>
          <div class="content">
            <div class="details">
              <span><?php echo $row['accName']?></span>
              <p><?php echo $row['accEmail']; ?></p>
            </div>
          </div>
        </header>
        <div class="search">
          <span class="text">Select an user to start chat</span>
          <input type="text" placeholder="Enter name to search...">
          <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">

        </div>
      </section>
    </div>
  </div>
  <script src="script/adminChat.js"></script>
  <?php include("include/footer.php"); ?>
</body>
</html>
