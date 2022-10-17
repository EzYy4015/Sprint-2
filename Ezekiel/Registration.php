<?php
error_reporting(0);

include  "Configuration.php";


  if(isset($_POST['submit'])){
    //!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['cpassword'])

      //Variable which reads values from the form in HTML with has the method="post"
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phoneNum = $_POST['phoneNumber'];
      $country = $_POST['country'];
      $password =$_POST['password'];
      $cpassword = $_POST['cpassword'];

      //Variables which check password strength
      $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@', $password);
      $number    = preg_match('@[0-9]@', $password);
      $digits    = preg_match('/^[0-9]{11,14}+$/', $phoneNum);
      //$mail      = preg_match('^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$', $email);
      htmlspecialchars($name);
      htmlspecialchars($password);
      htmlspecialchars($cpassword);
      
    if($password == $cpassword){
      //This function here checks on Password Strength
      if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        echo "<script>alert('Password should be at least:\\n1. 8 Characters in length\\n2. 1 Upper case letter\\n3. 1 Number')</script>";
      }
      else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          echo "<script>alert('Email Invalid.')</script>";
        }
        else{
          if($digits){
              $sqll = "SELECT * FROM accounts WHERE accName = '$name'";
              $run = mysqli_query($conn, $sqll);
              //This function checks whether the username exist in the table, if more than 0, then it will not let the user create tehe account
              if (!$run->num_rows > 0){
                //The variable sqll inserts the username and password entered by the user into the table located inside the database
                $sqll = "INSERT INTO accounts (accName,accPassword)
                    VALUES ('$name', '$password')";
                $run = mysqli_query($conn,$sqll);
                  //If the username and password are inserted into the table located inside the database successfully, it wil output message associated to it.
                  if($run){
                    header("Location: Login.php");
                  }
                  else{
                    echo "<script>alert('Something went wrong...')</script>";
                  }
              }
              else{
                echo "<script>alert('Username already exists')</script>";
              }
          }
          else{
            echo  "<script>alert('Phone Number Incorrect.')</script>";
          }
        }
      }
    }  
    else{
      echo "<script>alert('Password Does Not Matched!')</script>";
    }
  }

?>
 
<!DOCTYPE HTML>
<HTML>
<HEAD>
  <TITLE>Gardening Sign Up</TITLE>
  <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="Login_CSS/styles.css"/>
  <script src="PasswordValidation.js"></script>
</HEAD>
<body>
    <div class ="box2">
        <div class="form2">
            <form action='' method="POST" class="signUp" autocomplete="off">
                <div class="box5">
                  <h2>Sign Up</h2>
                  <a href="Login.php"><input type="button" class="button" value="Return"></a>
                </div>
                <div class="inputBox">
                    <input type="text" name="name" value="<?php echo $name; ?>" required>
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" value="<?php echo $email; ?>" required>
                    <span>Email</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="tel" name="phoneNumber" value="<?php echo $phoneNum; ?>" required>
                    <span>Phone Number</span>
                    <i></i>
                </div>
                <div class="inputBox1">
                <span>Country</span>
                <input list="countries" name="country" id="country" autocomplete="off" placeholder="Select your country" required>
                  <datalist id="countries">
                      <option value="Afghanistan"></option>
                      <option value="Aland Islands"></option>
                      <option value="Albania"></option>
                      <option value="Algeria"></option>
                      <option value="American Samoa"></option>
                      <option value="Andorra"></option>
                      <option value="Angola"></option>
                      <option value="Anguilla"></option>
                      <option value="Antarctica"></option>
                      <option value="Antigua and Barbuda"></option>
                      <option value="Argentina"></option>
                      <option value="Armenia"></option>
                      <option value="Aruba"></option>
                      <option value="Australia"></option>
                      <option value="Austria"></option>
                      <option value="Azerbaijan"></option>
                      <option value="Bahamas"></option>
                      <option value="Bahrain"></option>
                      <option value="Bangladesh"></option>
                      <option value="Barbados"></option>
                      <option value="Belarus"></option>
                      <option value="Belgium"></option>
                      <option value="Belize"></option>
                      <option value="Benin"></option>
                      <option value="Bermuda"></option>
                      <option value="Bhutan"></option>
                      <option value="Bolivia"></option>
                      <option value="Bonaire, Sint Eustatius and Saba"></option>
                      <option value="Bosnia and Herzegovina"></option>
                      <option value="Botswana"></option>
                      <option value="Bouvet Island"></option>
                      <option value="Brazil"></option>
                      <option value="British Indian Ocean Territory"></option>
                      <option value="Brunei Darussalam"></option>
                      <option value="Bulgaria"></option>
                      <option value="Burkina Faso"></option>
                      <option value="Burundi"></option>
                      <option value="Cambodia"></option>
                      <option value="Cameroon"></option>
                      <option value="Canada"></option>
                      <option value="Cape Verde"></option>
                      <option value="Cayman Islands"></option>
                      <option value="Central African Republic"></option>
                      <option value="Chad"></option>
                      <option value="Chile"></option>
                      <option value="China"></option>
                      <option value="Christmas Island"></option>
                      <option value="Cocos (Keeling) Islands"></option>
                      <option value="Colombia"></option>
                      <option value="Comoros"></option>
                      <option value="Congo"></option>
                      <option value="Congo, Democratic Republic of the Congo"></option>
                      <option value="Cook Islands"></option>
                      <option value="Costa Rica"></option>
                      <option value="Cote D'Ivoire"></option>
                      <option value="Croatia"></option>
                      <option value="Cuba"></option>
                      <option value="Curacao"></option>
                      <option value="Cyprus"></option>
                      <option value="Czech Republic"></option>
                      <option value="Denmark"></option>
                      <option value="Djibouti"></option>
                      <option value="Dominica"></option>
                      <option value="Dominican Republic"></option>
                      <option value="Ecuador"></option>
                      <option value="Egypt"></option>
                      <option value="El Salvador"></option>
                      <option value="Equatorial Guinea"></option>
                      <option value="Eritrea"></option>
                      <option value="Estonia"></option>
                      <option value="Ethiopia"></option>
                      <option value="Falkland Islands (Malvinas)"></option>
                      <option value="Faroe Islands"></option>
                      <option value="Fiji"></option>
                      <option value="Finland"></option>
                      <option value="France"></option>
                      <option value="French Guiana"></option>
                      <option value="French Polynesia"></option>
                      <option value="French Southern Territories"></option>
                      <option value="Gabon"></option>
                      <option value="Gambia"></option>
                      <option value="Georgia"></option>
                      <option value="Germany"></option>
                      <option value="Ghana"></option>
                      <option value="Gibraltar"></option>
                      <option value="Greece"></option>
                      <option value="Greenland"></option>
                      <option value="Grenada"></option>
                      <option value="Guadeloupe"></option>
                      <option value="Guam"></option>
                      <option value="Guatemala"></option>
                      <option value="Guernsey"></option>
                      <option value="Guinea"></option>
                      <option value="Guinea-Bissau"></option>
                      <option value="Guyana"></option>
                      <option value="Haiti"></option>
                      <option value="Heard Island and Mcdonald Islands"></option>
                      <option value="Holy See (Vatican City State)"></option>
                      <option value="Honduras"></option>
                      <option value="Hong Kong"></option>
                      <option value="Hungary"></option>
                      <option value="Iceland"></option>
                      <option value="India"></option>
                      <option value="Indonesia"></option>
                      <option value="Iran, Islamic Republic of"></option>
                      <option value="Iraq"></option>
                      <option value="Ireland"></option>
                      <option value="Isle of Man"></option>
                      <option value="Israel"></option>
                      <option value="Italy"></option>
                      <option value="Jamaica"></option>
                      <option value="Japan"></option>
                      <option value="Jersey"></option>
                      <option value="Jordan"></option>
                      <option value="Kazakhstan"></option>
                      <option value="Kenya"></option>
                      <option value="Kiribati"></option>
                      <option value="Korea, Democratic People's Republic of"></option>
                      <option value="Korea, Republic of"></option>
                      <option value="Kosovo"></option>
                      <option value="Kuwait"></option>
                      <option value="Kyrgyzstan"></option>
                      <option value="Lao People's Democratic Republic"></option>
                      <option value="Latvia"></option>
                      <option value="Lebanon"></option>
                      <option value="Lesotho"></option>
                      <option value="Liberia"></option>
                      <option value="Libyan Arab Jamahiriya"></option>
                      <option value="Liechtenstein"></option>
                      <option value="Lithuania"></option>
                      <option value="Luxembourg"></option>
                      <option value="Macao"></option>
                      <option value="Macedonia, the Former Yugoslav Republic of"></option>
                      <option value="Madagascar"></option>
                      <option value="Malawi"></option>
                      <option value="Malaysia"></option>
                      <option value="Maldives"></option>
                      <option value="Mali"></option>
                      <option value="Malta"></option>
                      <option value="Marshall Islands"></option>
                      <option value="Martinique"></option>
                      <option value="Mauritania"></option>
                      <option value="Mauritius"></option>
                      <option value="Mayotte"></option>
                      <option value="Mexico"></option>
                      <option value="Micronesia, Federated States of"></option>
                      <option value="Moldova, Republic of"></option>
                      <option value="Monaco"></option>
                      <option value="Mongolia"></option>
                      <option value="Montenegro"></option>
                      <option value="Montserrat"></option>
                      <option value="Morocco"></option>
                      <option value="Mozambique"></option>
                      <option value="Myanmar"></option>
                      <option value="Namibia"></option>
                      <option value="Nauru"></option>
                      <option value="Nepal"></option>
                      <option value="Netherlands"></option>
                      <option value="Netherlands Antilles"></option>
                      <option value="New Caledonia"></option>
                      <option value="New Zealand"></option>
                      <option value="Nicaragua"></option>
                      <option value="Niger"></option>
                      <option value="Nigeria"></option>
                      <option value="Niue"></option>
                      <option value="Norfolk Island"></option>
                      <option value="Northern Mariana Islands"></option>
                      <option value="Norway"></option>
                      <option value="Oman"></option>
                      <option value="Pakistan"></option>
                      <option value="Palau"></option>
                      <option value="Palestinian Territory, Occupied"></option>
                      <option value="Panama"></option>
                      <option value="Papua New Guinea"></option>
                      <option value="Paraguay"></option>
                      <option value="Peru"></option>
                      <option value="Philippines"></option>
                      <option value="Pitcairn"></option>
                      <option value="Poland"></option>
                      <option value="Portugal"></option>
                      <option value="Puerto Rico"></option>
                      <option value="Qatar"></option>
                      <option value="Reunion"></option>
                      <option value="Romania"></option>
                      <option value="Russian Federation"></option>
                      <option value="Rwanda"></option>
                      <option value="Saint Barthelemy"></option>
                      <option value="Saint Helena"></option>
                      <option value="Saint Kitts and Nevis"></option>
                      <option value="Saint Lucia"></option>
                      <option value="Saint Martin"></option>
                      <option value="Saint Pierre and Miquelon"></option>
                      <option value="Saint Vincent and the Grenadines"></option>
                      <option value="Samoa"></option>
                      <option value="San Marino"></option>
                      <option value="Sao Tome and Principe"></option>
                      <option value="Saudi Arabia"></option>
                      <option value="Senegal"></option>
                      <option value="Serbia"></option>
                      <option value="Serbia and Montenegro"></option>
                      <option value="Seychelles"></option>
                      <option value="Sierra Leone"></option>
                      <option value="Singapore"></option>
                      <option value="Sint Maarten"></option>
                      <option value="Slovakia"></option>
                      <option value="Slovenia"></option>
                      <option value="Solomon Islands"></option>
                      <option value="Somalia"></option>
                      <option value="South Africa"></option>
                      <option value="South Georgia and the South Sandwich Islands"></option>
                      <option value="South Sudan"></option>
                      <option value="Spain"></option>
                      <option value="Sri Lanka"></option>
                      <option value="Sudan"></option>
                      <option value="Suriname"></option>
                      <option value="Svalbard and Jan Mayen"></option>
                      <option value="Swaziland"></option>
                      <option value="Sweden"></option>
                      <option value="Switzerland"></option>
                      <option value="Syrian Arab Republic"></option>
                      <option value="Taiwan, Province of China"></option>
                      <option value="Tajikistan"></option>
                      <option value="Tanzania, United Republic of"></option>
                      <option value="Thailand"></option>
                      <option value="Timor-Leste"></option>
                      <option value="Togo"></option>
                      <option value="Tokelau"></option>
                      <option value="Tonga"></option>
                      <option value="Trinidad and Tobago"></option>
                      <option value="Tunisia"></option>
                      <option value="Turkey"></option>
                      <option value="Turkmenistan"></option>
                      <option value="Turks and Caicos Islands"></option>
                      <option value="Tuvalu"></option>
                      <option value="Uganda"></option>
                      <option value="Ukraine"></option>
                      <option value="United Arab Emirates"></option>
                      <option value="United Kingdom"></option>
                      <option value="United States"></option>
                      <option value="United States Minor Outlying Islands"></option>
                      <option value="Uruguay"></option>
                      <option value="Uzbekistan"></option>
                      <option value="Vanuatu"></option>
                      <option value="Venezuela"></option>
                      <option value="Viet Nam"></option>
                      <option value="Virgin Islands, British"></option>
                      <option value="Virgin Islands, U.s."></option>
                      <option value="Wallis and Futuna"></option>
                      <option value="Western Sahara"></option>
                      <option value="Yemen"></option>
                      <option value="Zambia"></option>
                      <option value="Zimbabwe"></option>
                    </datalist>
                </div>
                <div class="inputBox">
                    <input type="" id="password" name="password" value="<?php echo $password; ?>" required>
                    <span>Age</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="cpassword" value="<?php echo $cpassword; ?>" required>
                    <span>Confirm Password</span>
                    <i></i>
                </div>
                <a href="Login.php"><input type="submit" id="submitButton" name="submit" value="Create!"></a>
            </form>
        </div>
    </div>
</body>
</HTML>
