<!DOCTYPE HTML>
<HTML>
<HEAD>
    <TITLE>EZY ART ACADEMY</TITLE>
    <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<script src="https://kit.fontawesome.com/16da0c611e.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/Newstyles.css"/>
	<script src="Enquiry.js"></script>
</HEAD>
<BODY>
<!--Logos Branding-->
    <?php include("header.php"); ?>
<!--Navigation Bar-->
		<?php include("navigation.php"); ?>
<!--Enquiry Form-->
<div class="form">
  <form id = 'detail' action = 'enquiry_process.php' method = 'post' novalidate = 'novalidate'>

  <div class="roww">
    <div class="c1">
      <label for="Fname">First Name</label>
    </div>
    <div class="c2">
      <input type="text" id="fname" name="ffname" placeholder="Your name.." maxlength="25" size="10" required="required" />
    </div>
  </div>

  <div class="roww">
    <div class="c1">
      <label for="Lname">Last Name</label>
    </div>
    <div class="c2">
      <input type="text" id="lname" name="llname" placeholder="Your last name.." maxlength="25" size="10" required="required" />
    </div>
  </div>

  <div class="roww">
    <div class="c1">
      <label for="Email address">Email address</label>
    </div>
    <div class="c2">
      <input type="text" id="femail" name="ffemail" placeholder="Your email.." maxlength="50" size="10" required="required"/>
    </div>
  </div>

	<fieldset>
	<legend>Address</legend>
	<div class="roww">
		<div class="c1">
		<label for="Street address">Street address</label>
		</div>
		<div class="c2">
		<input type="text" id="address" name="aaddress" placeholder="Your address.." maxlength="40" size="20" required="required" />
		</div>
	</div>
	<div class="roww">
		<div class="c1">
		<label for="City/town">City/town</label>
		</div>
		<div class="c2">
		<input type="text" id="city" name="ccity" placeholder="Your City/Town.." maxlength="30" size="20" required="required" />
		</div>
	</div>

	<div class="c1"><label for="subject0" id="subjectLabel">State/federal terriories in Malaysia</label></div>
    <div class="c2"><input type="text" name="ssubject0" id="subject0" maxlength="20" size="20" required="required"></div>
    <div class="c1"> <label for="state">Choose State/federal terriories in Malaysia</label></div>
	<div class="c2">
		<select id="state" name="state" onchange="change()">
			<optgroup label="States and federal terriories in Malaysia">
				<script>statelist()</script>
			</optgroup>
		</select>
	</div>


	<div class="roww">
		<div class="c1">
		<label for="Postcode">Postcode</label>
		</div>
		<div class="c2">
		<input type="text" id="postcode" name="ppost" placeholder="Your Postcode.." maxlength="5" size="10" required="required" />
		</div>
	</div>
	</fieldset>

	<div class="roww">
    <div class="c1">
      <label for="Phone number">Phone number</label>
    </div>
    <div class="c2">
      <input type="text"  id="phone" name="pphone" placeholder="xxx-xxx xxxx" maxlength="20" size="10" required="required" />
    </div>
	</div>

	<div class="c1"><label for="subject" id="subjectLabel1">Enquiry on</label></div>
  <div class="c2"><input type="text" name="ssubject" id="subject" maxlength="40" size="20" required="required" value=""></div>

	<div class="c1"> <label for="time">Class and Time</label></div>
	<div class="c2">
		<select id="time" name="time" onchange="change1()">
			<optgroup label="Class and Time">
				<script>timelist()</script>
			</optgroup>
		</select>
	</div>

  <div class="roww">
    <div class="1">
      <label for="Comment">Comment</label>
    </div>
    <div class="c2">
      <textarea rows="10" cols="50" id="comment" name="ccomment"  type="text" placeholder="Write something.." maxlength="200" size="50" ></textarea>
    </div>
  </div>
  <div class="roww">
    <button type="Submit" value="Submit">Register</button>
    <button type="Reset" value="Reset">Reset</button>
  </div>
  </form>
</div>


<!--Next Button-->
<a href="About me.php"><i class="fa fa-hand-o-right"></i></a>
<div class="next">
<a href="Service4.php"><i class="fa fa-hand-o-left"></i></a>
</div>


<!--footer-->

	<?php include("footer.php"); ?>



</BODY>

</HTML>
