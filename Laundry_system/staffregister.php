<?php 	require_once('connect.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CV_PROJECT</title>
    <link rel="stylesheet" type="text/css" href="stylesbackup1.css">
    <style>
    .navactive {
        color: white;
        background-color: #bcb562;
    }
    </style>
  </head>
  <div class="header">
    <div class="logoWrapper">
      <img class="logo" src="CV.png" border="0" />
      <div class="topnav">
        <a href="staffsignin.php">Log in</a>
        <a href="staffregister.php">Sign up</a>
        <a href="management.php">Home</a>
      </div>
    </div>

  </div>
  <body>

    <div class="registerContent">
      <div class="registerDiv">
        <h1>Sign Up (STAFF,ADMIN)</h1>
        <hr>
        <br>
        <form action="finishregister.php" method="post">
          <label for="status">Status</label>
          <select class="statusSelect" name="status">
            <option value="ADMIN">Admin</option>
            <option value="STAFF">Staff</option>
          </select>

          <label for="fname">First Name</label>
          <input type="text" id="fname" name="firstName" placeholder="Your name..">

          <label for="lname">Last Name</label>
          <input type="text" id="lname" name="lastName" placeholder="Your last name..">

          <label for="status">Gender</label>
          <select class="statusSelect" name="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
          </select>
          
          <label for="citizenNo">Citizen Number</label>
          <input type="text" id="citizenNo" name="citizenNumber" placeholder="Ex. 114220014xx">

          <label for="dob">Date of birth</label>
          <input type="date" id="dob" name="dateOfBirth" placeholder=""><br>

          <label for="mobileNo">Mobile Number</label>
          <input type="text" name="mobileNumber" placeholder="Enter Mobile No." required onkeypress="return /[0-9]/i.test(event.key)" maxlength="10" pattern="([0-9]){10,}" title="Enter a valid phone number">

          <label for="address">Address</label>
          <input type="address" id="address" name="address" placeholder="Phahonyothin Rd, Tambon Khlong Nung, Amphoe Khlong Luang, Chang Wat Pathum Thani 12120">

          <label for="mail">Email</label>
          <input type="text" id="mail" name="email" placeholder="Your Email" pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})" title="Enter a valid email id">

          <label for="userid">ID for this website</label>
          <input type="text" id="userid" name="userId" placeholder="Your ID">

          <label for="password">Password</label>
          <input type="password"  name="password" class="fields" placeholder="Your password" value="" maxlength="15" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="password must contain at least one number and one uppper case and one lowercase letter and 8 characters" required>
          <label for="rePassword">Retype Password</label>
          <input type="password" id="rePassword" name="rePassword" placeholder="Your password">


          <input type="submit" name="staffRegisterSubmit"value="Submit">
        </form>
      </div>
    </div>
      <div class="regisImageWrapper">
        <img src="regis.jpg" alt="">
      </div>

  <footer>
    <div class="footerContent">
      <div class="leftFooter">
        <h1 id="followUs">Follow us . . </h1>
        <div class="iconWrapper">
          <a href="https://www.facebook.com/">
            <img class="socialIcon" src="facebook.png" border="0" />
          </a>
          <a href="https://www.instagram.com/">
            <img class="socialIcon" src="ig.png" border="0" />
          </a>
          <a href="https://twitter.com/">
            <img class="socialIcon" src="twitter.png" border="0" />
          </a>
        </div>
      </div>
      <div class="rightFooter">
        <div class="memberCredit">
          <h1>Created by</h1>
        </div>
        <div class="nameList">
          <ul id="name">
            <li>Chethan.C.Gowda</li>
            <li>Vishnu Das</li>
          </ul>

        </div>
      </div>
    </div>
  </footer>

  </body>

</html>
