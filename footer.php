<?php
include("DBTicketBooking.php");

//Get the user type via session
if (isset($_SESSION['user_type'])) {
  $user_type = $_SESSION['user_type'];
} else {
  $user_type = "";
}
?>

<!--navigation-------------->
<div class="box4">
  <div class="column">
    <br />
    <select style="background-color: grey;" name="lang" id="lang">
      <option value="En">English</option>
    </select>
  </div>
  <div class="column">
    <h3>NAVIGATION</h3>
    <p>Home</p>
    <p>FAQ</p>
    <p>Investor Relations</p>
    <p>Jobs</p>
    <p>About Us</p>
    <p>Help Centre</p>
  </div>
  <div class="column">
    <h3>LEGAL</h3>
    <p>Privacy Policy</p>
    <p>Terms of Service</p>
    <p>Cookie Preferences</p>
    <p>Corporate Information</p>
  </div>
  <div class="column">
    <h3>TALK TO US</h3>
    <p>jannath99@gmail.com</p>
    <p>+65 9376 8735 </p>
  </div>
  <div class="column">
    <h3>Follow us</h3>
    <i class="fa fa-instagram"></i>
    <i class="fa fa-facebook"></i>
    <i class="fa fa-twitter"></i>
    <pre style="font-size: 10px;">
          <i class="fa fa-copyright"></i>2023 oatmilk. All Rights Reserved
                  </pre>
  </div>
</div>