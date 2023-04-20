<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href ="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
  </head>
  <body class="profile-page">
      <div class="wrapper">
          <h1>insert Management</h1>
          <form action="insert.php" method="POST" enctype="multipart/form-data">

                      <div class="inputBox">
                          <input type="text" id="full_name" name="full_name" placeholder="Full Name" value="full_name">
                      </div>
                      <div class="inputBox">
                          <input type="text" id="contact_number" name="contact_number" placeholder="Contact Number" value="contact_number">
                      </div>
                      <div class="inputBox">
                          <input type="date" id="last_visit" name="last_visit" placeholder="Last Visit Date" value="last_visit">
                      </div>
                      <div class="inputBox">
                          <input type="preferences" id="preferences" name="preferences" placeholder="Preferences" value="preferences">
                      </div>
                      <div class="inputBox">
                          <input type="purchasem" id="purchasem" name="purchasem" placeholder="Purchases Made" value="purchasem">
                      </div>


                  <button type="submit" name="submit" class="btn" id="update" >Update Profile</button>

          </form>
      </div>
  </body>
</html>
